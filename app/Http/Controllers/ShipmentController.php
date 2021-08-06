<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Shipment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ShipmentController extends Controller
{
    public function index()
    {
        $shipments=Shipment::orderby('date_paid','asc')->paginate();
return view('shipment.index',compact('shipments'));
    }
    public function status_index($status)
    {

        $shipments=Shipment::
        when($status == "Shipped",function($q) use($status){

        return $q->where('status','Shipped');
        })

        ->when($status == "not_shipped",function($q) use($status){

        return $q->where('status','Not shipped');
        })

        ->when($status == "arrived",function($q) use($status){

        return $q->where('status','arrived');
        })
        ->when($status == "done",function($q) use($status){

            return $q->where('status','done');
            })
            ->when($status == "all",function($q) use($status){

                return $q->where('product_id','!=',null);
                })
        ->orderby('date_paid','asc')->paginate();
        return view('shipment.index',compact('shipments'));
    }

    public function add_shipment(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'product_id'=>'required',
            'quantity' => 'required|numeric',
            'unit_price'=> 'required',
            'shipping'=> 'required',
            'total'=> 'required|numeric',
            'paid'=> 'required',
            'payment_method'=> 'required',
            'supplier'=> 'required',
            'date_paid'=> 'required',
            'ship_date'=> 'required',
            'status'=> 'required',
            'carrier'=> 'required',
            'tracking_number'=> 'required',
            'arrived_final'=> 'required|numeric',
            'docs'=> 'required',
            'current_stock'=> 'required|numeric',


        ]);

        if ($validate->fails()) {
            return Redirect()->back()->withErrors($validate)->withInput();
        }
        else
        {

            $previous_record = Shipment::where('product_id', $request->product_id)->first();
            $shipment=new Shipment;
            $shipment->product_id=$request->product_id;
            $shipment->quantity=$request->quantity;
            $shipment->unit_price=$request->unit_price;
            $shipment->shipping=$request->shipping;
            $shipment->total=$request->total;
            $shipment->paid=$request->paid;
            $shipment->payment_method=$request->payment_method;
            $shipment->supplier=$request->supplier;
            $shipment->date_paid=$request->date_paid;
            $shipment->ship_date=$request->ship_date;
            $shipment->status=$request->status;
            $shipment->carrier=$request->carrier;
            $shipment->tracking_number=$request->tracking_number;
            $shipment->arrived_final=$request->arrived_final;
            $shipment->docs=$request->docs;
            $shipment->current_stock=$request->current_stock;

            $shipment->per_unit=$request->total/$request->quantity;
            $shipment->current_price=$request->total/$request->arrived_final;


            $shipment->save();

        }
        return Redirect('shipment/index')->with('success', 'Shipment added');
    }
    public function check(Request $request ,$id)
    {
        $shipment  = Shipment::where('product_id',$id)->first();
        if($shipment)
        {
            return response()->json($success = false);
        }
        else
        {
            return response()->json($success = true);
        }
    }
    public function index_create(Request $request)
    {
        $products=Product::all();
        return view('shipment.create',compact('products'));
    }

    public function show($id)
    {
        $shipment=Shipment::where('id',$id)->first();
        return view('shipment.show',compact('shipment'));
    }

    public function edit($id)
    {
        $shipment=Shipment::where('id',$id)->first();
        return view('shipment.edit',compact('shipment'));
    }

    public function edit_shipment($id, Request $request)
    {
        $shipment=Shipment::where('id',$id)->first();
        // dd('sss');

        $shipment->product_id=$request->product_id?$request->product_id:$shipment->product_id;
        $shipment->quantity=$request->quantity?$request->quantity: $shipment->quantity;
        $shipment->unit_price=$request->unit_price?$request->unit_price:$shipment->unit_price;
        $shipment->shipping=$request->shipping?$request->shipping: $shipment->shipping;
        $shipment->total=$request->total?$request->total:$shipment->total;
        $shipment->paid=$request->paid?$request->paid: $shipment->paid;
        $shipment->payment_method=$request->payment_method?$request->payment_method:$shipment->payment_method;
        $shipment->supplier=$request->supplier?$request->supplier:$shipment->supplier;
        $shipment->date_paid=$request->date_paid?$request->date_paid:  $shipment->date_paid;
        $shipment->ship_date=$request->ship_date?$request->ship_date:$shipment->ship_date;
        $shipment->status=$request->status?$request->status:  $shipment->status;
        $shipment->carrier=$request->carrier?$request->carrier:$shipment->carrier;
        $shipment->tracking_number=$request->tracking_number?$request->tracking_number: $shipment->tracking_number;
        $shipment->arrived_final=$request->arrived_final?$request->arrived_final:$shipment->arrived_final;
        $shipment->docs=$request->docs?$request->docs:$shipment->docs;
        $shipment->current_stock=$request->current_stock?$request->current_stock:$shipment->current_stock;

        // $shipment->per_unit=($request->total/$request->quantity)?($request->total/$request->quantity): $shipment->per_unit;
        $shipment->per_unit=($request->total?$request->total:$shipment->total)/
        ($request->quantity?$request->quantity:$shipment->quantity);
        // $shipment->current_price=($request->total/$request->arrived_final)? ($request->total/$request->arrived_final):$shipment->current_price;
        $shipment->current_price=($request->total?$request->total:$shipment->total)/
        ($request->arrived_final?$request->arrived_final:$shipment->arrived_final);

        $shipment->save();



        return redirect('/shipment/index');

    }

    public function destroy($id)
    {

     $shipment = Shipment::find($id);

     $shipment->delete();
     return redirect('/shipment/index');
    }
}
