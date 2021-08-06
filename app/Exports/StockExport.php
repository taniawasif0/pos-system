<?php

namespace App\Exports;

use App\Shipment;
use App\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class StockExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $stocks=Sale::all();
        $arr=[
            ['sku','date','quantity',]
        ];
        foreach($stocks as $stock)
        {
            array_push($arr,[$stock->product->sku,$stock->date,$stock->quantity]);
        }
        return new Collection($arr);
    }
}
