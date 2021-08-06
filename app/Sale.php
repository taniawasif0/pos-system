<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'product_id', 'quantity','date',
    ];
    public function product()
    {
        return $this->belongsTo(product::class);
    }

}
