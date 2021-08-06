<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Product;
 use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function add_product(Request $request)
    {
        // dd('here');
        // dd($request->all());
        $validate = Validator::make($request->all(), [

            'sku' => 'required',
            'image' => 'required',

        ]);

        if ($validate->fails()) {
            return Redirect()->back()->withErrors($validate)->withInput();
        }
            else
        {
        $product= new Product;
        $destinationPath = public_path('/images/product');
        $filename =time() . '.' . $request->image->getClientOriginalName();
        $request->image->move($destinationPath, $filename);
        $product->image=$filename;
        $product->sku=$request->sku;
        $product->save();
        }
        return redirect('products/index');
    }

    public function index()
    {
        $products=Product::paginate(10);
        return view('product.index',compact('products'));
    }

    public function edit($id)
    {
        $product=Product::where('id',$id)->first();
        return view('product.edit',compact('product'));
    }
    public function edit_product(Request $request,$id)
    {
        //  dd($request->all());
        $product=Product::where('id',$id)->first();
        $product->sku=$request->sku?$request->sku:$product->sku;
        if($request->image)
        {
        $destinationPath = public_path('/images/product');
        $filename =time() . '.' . $request->image->getClientOriginalName();
        $request->image->move($destinationPath, $filename);
        $product->image=$filename;
        }
            $product->save();
        return redirect('/products/index');

        // return view('product.edit',compact('product'));
    }

    public function show($id)
    {
        $product=Product::where('id',$id)->first();
        return view('product.show',compact('product'));

    }

    public function destroy($id)
    {

     $product = Product::find($id);
     $imagePath = Product::select('image')->where('id', $id)->first();

     $filePath = $imagePath->image;

               if (file_exists('images/product/'.$filePath)) {

               unlink('images/product/'.$filePath);

               }
     $product->delete();
     return redirect('/products/index');
    }

}
