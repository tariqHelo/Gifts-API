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
       // dd($request->all()); 
      $dataJson = json_encode($request->data);
     /// dd($dataJson);
        $product =Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'description' => $request->desc,
            'details' => $dataJson,
        ]);         
         \Session::flash("msg", "s:تم إضافة المنتج ($product->name) بنجاح");
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
    public function edit($id)
    {
      $product = Product::find($id);
      $items = json_decode(($product->details),true);
     // dd($items);
      $categories = Category::pluck('name' , 'id');

     // dd($items);
        return view('admin.products.edit',[
        'product' => $product,
        'categories' => $categories,
        'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
      $product = Product::find($id);
       $dataJson = json_encode($request->data);
       // dd($dataJson);
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'description' => $request->desc,
            'details' => $dataJson,
        ]);
        \Session::flash("msg", "s:تم تعديل المنتج ($product->name) بنجاح");
      return redirect()->route('products.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product = Product::find($id);
       $product->delete();
      \Session::flash("msg", "w:تم حذف المنتج ($product->name) بنجاح");
      return redirect()->route('products.index');
    }
}
