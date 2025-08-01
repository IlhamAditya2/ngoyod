<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'phone', 'address', 'payment_method', 'total_price'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
