<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Timestamp;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
