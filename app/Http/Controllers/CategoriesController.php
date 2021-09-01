<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categoreis = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->select([
                'categories.*',
                'parents.name as parent_name'
            ])->get();
       // $categoreis = Category::all();
        return view('admin.categories.index',[
            'categoreis' => $categoreis,
            //'entries' => $entries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::all();
        $category = new Category();
        return view('admin.categories.create', compact('category', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object
            $image_path = $file->store('/', [
                'public' => 'uploads',
            ]);
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $category = Category::create($request->all());
        \Session::flash("msg", "s:تم إضافة التصنيف ($category->name) بنجاح");
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categrory  $categrory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categrory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categrory  $categrory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        if (!$category) {
            abort(404);
        }
        $parents = Category::where('id', '<>', $category->id)->get();

        return view('admin.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categrory  $categrory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
       // dd($request->all());
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // UplodedFile Object
            $image_path = $file->store('/', [
                'public' => 'uploads',
            ]);
            $request->merge([
                'image_path' => $image_path,
            ]);
        }

        $category->update($request->all());
        \Session::flash("msg", "s:تم تعديل التصنيف ($category->name) بنجاح");
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categrory  $categrory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        // \Storage::disk('uploads')->delete($category->file);
        \Session::flash("msg", "w:تم حذف التصنيف ($category->name) بنجاح");
        return redirect()->route('categories.index');//
    }
}
