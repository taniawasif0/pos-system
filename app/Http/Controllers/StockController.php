<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Shipment;
use App\Product;
use App\Sale;
use Illuminate\Http\Request;
use App\Exports\StockExport;
use App\Imports\StockImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class StockController extends Controller
{
    public function index()
    {
        // $shipments = DB::table('shipments')
        //         ->select("*", DB::raw('SUM(current_price) as current_price'))->groupBy("id")->get();
        // dd($shipments);
        $shipment =Shipment::with('product')->select('*')->selectRaw('min(created_at) as date')
        ->groupBy('product_id')->get();
        $current_stock=Shipment::with('product')->select('*')->selectRaw('sum(current_stock) as current_stock')
        ->groupBy('product_id')->get();
        $month=Sale::with('product')->select('*')->selectRaw('sum(quantity) as quantity')
        ->whereDate('created_at', '>', Carbon::now()->subDays(30))
        ->groupBy('product_id')->get();

        $week=Sale::with('product')->select('*')->selectRaw('sum(quantity) as quantity')
        ->whereDate('created_at', '>', Carbon::now()->subDays(7))
        ->groupBy('product_id')->get();
        $otw=Shipment::with('product')->select('*')->selectRaw('sum(quantity) as quantity')
        ->where('status','Shipped')->orWhere('status','Not shipped')
        ->orWhere('status','arrived')
        ->groupBy('product_id')->get();

        $money_s=Shipment::with('product')->select('*')->selectRaw('sum(total) as total')
        ->where('status','!=','finish stock')
        ->groupBy('product_id')->get();

        // $money_on_st=

        //   dd($month);

        return view('stock.index',compact('shipment','current_stock','month','week','otw','money_s'));
    }


    public function export()
    {
        return Excel::download(new StockExport, time() . '.' .'stocks.xlsx');
    }
    public function import(Request $request)
    {
        // dd($request->all());
        $path1 = $request->file('file')->store('temp');
        $path=storage_path('app').'/'.$path1;
        $data = \Excel::import(new StockImport,$path);
        return redirect('/stock/index');
    }

}
