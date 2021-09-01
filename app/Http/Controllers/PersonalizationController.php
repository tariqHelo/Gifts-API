<?php

namespace App\Http\Controllers;

use App\Models\Personalization;
use Illuminate\Http\Request;

class PersonalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalizations = Personalization::all();
        return view('admin.personalizations.index',[
        'personalizations' => $personalizations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.personalizations.create',[
        'personalization' => new personalization()
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
        $personalization = Personalization::create($request->all());
        \Session::flash("msg", "s:تم إضافة التخصيص ($personalization->name) بنجاح");
        return redirect()->route('personalizations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personalization  $personalization
     * @return \Illuminate\Http\Response
     */
    public function show(Personalization $personalization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personalization  $personalization
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $personalization = Personalization::findOrFail($id);
        return view('admin.personalizations.edit',[
         'personalization' => $personalization,
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personalization  $personalization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personalization = Personalization::findOrFail($id);
        $personalization->update($request->all());
        \Session::flash("msg", "s:تم تعديل ماركة ($personalization->name) بنجاح");
        return redirect()->route('personalizations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personalization  $personalization
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $personalization = Personalization::findOrFail($id);
         $personalization->delete();
         // \Storage::disk('uploads')->delete($category->file);
         \Session::flash("msg", "w:تم حذف الماركة ($personalization->name) بنجاح");
         return redirect()->route('personalizations.index');//
    }
}
