<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $appends = ['image_path'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn () => url('/storage/icons/' . str_replace('public/icons/', '', $this->icon)),
        );
    }
}
