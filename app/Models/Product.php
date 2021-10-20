<?php

namespace App\Models;

use App\Service\Discount\DiscountCalculator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

    public function hasStock(int $quantity)
    {
        return $this->stock >= $quantity;
    }
    
    public function showPrice(){
        return number_format($this->price, 2);
    }

    public function totalPrice(int $quantity){
        return number_format($this->price * $quantity, 2);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function decrementStock(int $count)
    {
        return $this->decrement('stock', $count);
    }

    public function getPriceAttribute($price)
    {
        $coupons = $this->category->validCoupons();
        if ($coupons->isNotEmpty()) {
            $discountCalculator = resolve(DiscountCalculator::class);
            
            return $discountCalculator->discountedPrice($coupons->first(), $price);
        }

        return $price;
    }
}
