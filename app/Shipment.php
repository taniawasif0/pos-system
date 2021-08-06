<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'quantity' ,'unit_price'
        ,'shipping',
        'total',
        'per_unit',
        'paid',
        'payment_method',
        'supplier',
        'date_paid',
        'ship_date',
        'status',
        'carrier',
        'tracking_number',
        'arrived_final',
        'docs',
        'current_stock',
        'current_price',
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }

}
