<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function getBusinessesByCategory($categorySlug)
    {
        // $sortMethod = request()->query('sort', 'sortaz'); //recommended
        $sortMethod = request()->input('sort', 'sortaz');
        $subcategoryIds = request()->input('subcategoryIds', []); // Array of subcategory IDs from the request

        $categoryWithSubcategories = Category::with(['subcategories' => function ($query) use ($subcategoryIds) {
            // Filter the subcategories if subcategory IDs are provided
            if (!empty($subcategoryIds)) {
                $query->whereIn('id', $subcategoryIds);
            }
        }, 'subcategories.businesses.addresses', 'subcategories.businesses.reviews'])
            ->where('slug', $categorySlug)
            ->first();

        if (!$categoryWithSubcategories) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $businesses = $categoryWithSubcategories->subcategories
            ->pluck('businesses')
            ->collapse()
            ->unique('id');

        $businesses = $businesses->map(function ($business) {
            // Calculate average grade
            $business->average_grade = $business->reviews->avg('grade');
            $business->review_count = $business->reviews->count();

            return $business;
        });

        switch ($sortMethod) {
            case 'sortaz':
                $businesses = $businesses->sortBy('name');
                break;
            case 'sortza':
                $businesses = $businesses->sortByDesc('name');
                break;
            case 'recent':
                $businesses = $businesses->sortByDesc('created_at');
                break;
            case 'popular':
                $businesses = $businesses->sortBy('name'); // Ovo se menja
                // Assuming 'popularity' is a field in your Business model
                // $businesses = $businesses->sortByDesc('popularity');
                break;
            default:
                $businesses = $businesses->sortBy('name'); // Ovo se menja
                break;
        }

        $response = [
            'category' => $categoryWithSubcategories->only(['id', 'name', 'description']), // include fields you need
            'subcategories' => $categoryWithSubcategories->subcategories->makeHidden('businesses'),
            'businesses' => $businesses->values()
        ];

        return response()->json($response);
    }
}
