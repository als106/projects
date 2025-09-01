<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'name',
        'genre',
        'price',
        'img',
    ];

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    public function shoppingcart() {
        return $this->belongsToMany(Shoppingcart::class);
    }

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function stock() {
        return $this->hasOne(Stock::class);
    }

    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'product_wishlist', 'product_id', 'wishlist_id');
    }
    

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
