<?php

namespace App\Models;

use App\Service\Discount\Coupon\Traits\Couponable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use TCG\Voyager\Models\Category as ModelsCategory;

class Category extends ModelsCategory
{
    use HasFactory, Couponable;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
