<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'details',
        'price',
        'description',
        'image',
        'images',
        'category_id',
    ];

    public function showPrice(){
        return number_format($this->price, 2);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
