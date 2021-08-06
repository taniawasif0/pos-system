<?php

namespace App\Imports;
use Illuminate\Support\Facades\DB;
use App\Stock;
use App\Sale;
use App\Product;
use App\Shipment;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class StockImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

   /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection[2][0]);
        $arr=[];
        foreach($collection as $key=> $collect)
        {

            if($key > 0 ){
                $temp = $collect->toArray();
                $product = Product::where('sku',$temp[0])->first();

            //   $temp[1] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($temp[1])->format('Y-m-d');
            //   dd($product->id);
              // dd($temp[1]);
                // $shipment=Shipment::where('product_id',$product->id)->oldest()->first();
                // $current_stock=Shipment::where('product_id',$product->id)->groupBy('product_id')
                // ->sum('current_stock');
                // dd($current_stock);
                // dd($shipment);
                // dd($product);
                if(isset($product->id))
                {
             Sale::create([
                    'product_id' => $product->id,
                    'date'=> $temp[1],
                    'quantity'=>$temp[2],
                    ]);

                }

             $ship=Shipment::where('product_id',$product->id)->where('current_stock','>',$temp[2])->oldest()->first();

                if($ship)
                {
                $ship->current_stock=($ship->current_stock)-$temp[2];
                $ship->save();
                }

            }

            }
        // dd($arr);


        //  dd($product);

    }

    // public function model(array $row)
    // {

    //     dd($row);
    //     // $product = Product::where('sku',$row[0])->first();
    //     // dd($product);
    //     // if($product)
    //     return new Stock([
    //     'product_id' => $product->id,
    //     'qty' => isset($row[2]) && $row[2] > 0 ? $row[2] : 0,
    //     'rate' => isset($row[2]) && $row[2] > 0 ? round($row[3] / $row[2],2) : 0,
    //     'cost' => $row[3]
    //     ]);

    // }
}
