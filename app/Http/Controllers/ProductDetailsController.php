<?php

namespace App\Http\Controllers;
use App\Models\ProductDetails;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\Imports\ProductDetailsImport;
use Illuminate\Support\Facades\DB;

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
       return view('admin.product_details.create',[
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
       try {
            Excel::import(new ProductDetailsImport, request()->file('file'));
           \Session::flash("msg","s: تم إضافة الملف بنجاح ");
       } catch (\Throwable $th) {
           \Session::flash("msg","w: حدث خطأ اثناء عملية الادخال يرجى التأكد من صحة الملف");
       }
      return redirect()->route('product_details.index');
    }

    public function image(Request $request)
    {

     $imgs = $request->filenames;
    // dd($imgs['0']->getClientOriginalName());
        if($request->hasFile('filenames')){
            foreach($imgs as $key => $value){
                $img = $value->getClientOriginalName();
                $pure = strtolower(str_replace(".png", "",$img));
                $products =  ProductDetails::where('name', '=', $pure)->first();
                if($products){
                    $image_path = $value->store('/', [
                    'public' => 'uploads',
                    ]);
                    $products->update([
                        'image'=>$image_path
                    ]);
                }
           } 
        }
      \Session::flash("msg", "s:تم إضافة صور المنتجات  بنجاح");
      return redirect()->back();
      $input=$request->all();
    }
    
    public function barcode(Request $request)
    { 
       if ($request->has("val")) :
            $barcods = DB::table("product_details")->where("barcode", $request->val)->get();
        else :
            $barcods = [];
        endif;

     return response()->json(['barcods' => $barcods]);
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
     $details = ProductDetails::find($id);

     return view('admin.product_details.edit',[
        'details' => $details
     ]);
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
