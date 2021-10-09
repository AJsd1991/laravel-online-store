<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use TCG\Voyager\Models\Category as ModelsCategory;

class Category extends ModelsCategory
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
