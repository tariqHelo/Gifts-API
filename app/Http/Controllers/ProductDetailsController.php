<?php

namespace App\Http\Controllers;
use App\Models\ProductDetails;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\Imports\ProductDetailsImport;

class ProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
      $products = ProductDetails::all();
       return view('admin.product_details.index',[
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     

       
         try {
            Excel::import(new ProductDetailsImport, request()->file('file'));
           \Session::flash("msg","s: تم إضافة الملف بنجاح ");
       } catch (\Throwable $th) {
           \Session::flash("msg","w: حدث خطأ اثناء عملية الادخال يرجى التأكد من صحة الملف");
       }
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
