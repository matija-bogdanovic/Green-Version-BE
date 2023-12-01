<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // ograničite veličinu i tip fajla
        ]);

        $user = auth()->user();
        $path = $request->file('image')->store('images', 'public');

        $user->profile_photo = $path;
        $user->save();

        return response()->json(['message' => 'Slika uspešno uploadovana', 'path' => $path]);
    }

    public function getUserImage($id)
    {
        $user = User::findOrFail($id);
        $path = $user->profile_photo;

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $file = Storage::disk('public')->get($path);
        $type = Storage::disk('public')->mimeType($path);

        return response($file, 200)->header("Content-Type", $type);
    }
}
