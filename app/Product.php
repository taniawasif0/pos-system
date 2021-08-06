<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku', 'image',
    ];
    // public function shipment()
    // {
    //     return $this->hasMany(Shipment::class);
    // }


}
