<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use Timestamp;

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function sum(){

        $sum = 0;

        foreach(auth()->user()->carts as $cart){
            $sum += $cart->product->price * $cart->quantity;
        }

        return $sum;
    }
}
