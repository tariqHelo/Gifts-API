<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductDetails;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products  = Product::all();
       return view('admin.products.index',[
           'products' => $products
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
       $categories = Category::pluck('name' , 'id');
       //dd($categories);
       return view('admin.products.create',[
          'product' => new product(),
           'categories' => $categories
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   //  dd($purchases = []);
      
   
      
      //  dd($product);
        foreach( $request->data as $i => $obj) {
           // $i++;
            $data = collect([
                'name' => $obj['name'][$i],
                'number' => $obj['number'][$i],
                'type' => $obj['type'][$i],
                'barcode' => $obj['barcode'][$i],
                'qty' => $obj['qty'][$i],
                'price' => $obj['price'][$i],
                'type' => $obj['type'][$i],
                'purchasing_price' => $obj['purchasing_price'][$i],
                'purchasing_price2' => $obj['purchasing_price2'][$i],
                'personalization' => $obj['personalization'][$i],
                'brand' => $obj['brand'][$i],
                'barcode' => $obj['barcode'][$i],
            ]);
            $purchases[]  = $data->toArray();
        }
         //dd($purchases[]);
         $product = ([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'description' => $request->desc,
            //'details_id' => ProductDetails::insert($purchases),
        ]);
        ProductDetails::insert($purchases);
        Product::insert($product);
        // $category = Category::create($request->all());
        // \Session::flash("msg", "s:تم إضافة التصنيف ($category->name) بنجاح");
         return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
