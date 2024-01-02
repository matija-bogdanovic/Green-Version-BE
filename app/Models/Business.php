<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    public function addresses()
    {
        return $this->hasMany(BusinessAdress::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
