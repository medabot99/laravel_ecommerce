<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use Timestamp;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
