<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'avg_week', 'avg_month','oos','on_the_way','money_on_stock','total_money_on_stock','current_stock',
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
