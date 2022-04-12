<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Timestamp;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function getStatusTextAttribute(){

        switch ($this->status) {
            case 1:
                return 'Completed';
                break;
            case 2:
                return 'Pending Payment';
                break;
            case 3:
                return 'Payment Completed';
                break;
            default:
                return 'Created';
                break;
        }

    }
}
