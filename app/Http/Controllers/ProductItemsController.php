<?php

namespace App\Http\Controllers;
use App\Models\ProductItems;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\Imports\ProductItemsImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class ProductItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(20);  
      $products = ProductItems::all();
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
        $request = request()->file('file');

        Excel::import(new ProductItemsImport,$request);
    //    try {
    //         Excel::import(new ProductItemsImport,$request);
    //        \Session::flash("msg","s: تم إضافة الملف بنجاح ");
    //    } catch (\Throwable $th) {
    //        \Session::flash("msg","w: حدث خطأ اثناء عملية الادخال يرجى التأكد من صحة الملف");
    //    }
         \Session::flash("msg","s: تم إضافة الملف بنجاح ");

      return redirect()->route('product_details.index');
    }

   
    // - اكسل: اضافة قطعة جديدة = قطعة جديدة + منتج جديد (اسمه باسم القطعة) + مربوط بالقطعة
    // - اكسل: باركود قطعة موجودة قبل = UPDATE لداتا القطعة وبس
    // - ربط القطع = تغيير ال PRODUCT ID بكل القطع حسب ال PRODUCT ID المختار لاول قطعة تختار في الربط
    // خلال الربط: حذف المنتجات اليي فضيت لكن لو في منتج في قطع ثانية.. ما يحذفها
    public function storejson(Request $request)
    {  
       $id = $request->obj[0]['product_id'];
       $dataJson = $request->obj;
       //dd($dataJson);
       foreach ($dataJson as $valueCheck) {
            $trashSent = ProductItems::where('product_id', '=', $valueCheck)->update([
            'product_id' => $id,
            ]);
        }

    //    foreach($dataJson as $data){
    //         $product =ProductItems::update([
    //         'name' => $name,
    //         'details' => $dataJson,
    //         ]);
    //    }
        
       return \Response::json(array('success'=>true));
      //  \Session::flash("msg", "s:تم إضافة المنتج ($product->name) بنجاح");
      //  return redirect()->route('products.index');
    }


    public function image(Request $request)
    {

     $imgs = $request->filenames;
    // dd($imgs['0']->getClientOriginalName());
        if($request->hasFile('filenames')){
            foreach($imgs as $key => $value){
                $img = $value->getClientOriginalName();
                $pure = strtolower(str_replace(".png", "",$img));
                $products = ProductItems::where('name', '=', $pure)->first();
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
      \Session::flash("msg", "s:تم إضافة الصور المنتجات  بنجاح");
      return redirect()->back();
      $input=$request->all();
    }
    
    public function barcode(Request $request)
    { 

        if ($request->has("val")):
            $barcods = DB::table("product_items")->where("barcode", $request->val)->first();
        endif;

        if($barcods){
              return response()->json($barcods);
        }

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
     $details = ProductItems::find($id);

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
