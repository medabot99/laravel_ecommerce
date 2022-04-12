<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Timestamp;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function getStatusTextAttribute(){

        switch ($this->status) {
            case 1:
                return 'Sold Out';
                break;
            default:
                return 'Selling';
                break;
        }

    }
}
