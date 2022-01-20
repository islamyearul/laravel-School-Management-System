<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeesCategory;

class FeesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FeesCatdatas = FeesCategory::all();
        return view('backend/setup/feescategory/index', compact('FeesCatdatas'));
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
        $request->validate([
            'fees_cat_name' => 'required|string|max:100|unique:fees_categories, fees_cat_name',           
        ]);

        $info = array(
            'message' => "Fees Category Class Added successfull",
            'alert-type' => 'success'
        );

        $Shift = new FeesCategory;
        $Shift->fees_cat_name = $request->fees_cat_name; 
        $Shift->save();
        return redirect('admin/feescategory')->with('success', 'Fees Category created successfully.');
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
        $EditFeesCattData = FeesCategory::findOrFail($id);
        return view('backend/setup/feescategory/edit-feescategory', compact('EditFeesCattData'));
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
        $request->validate([
            'fees_cat_name' => 'required|string|max:100|unique:fees_categories, fees_cat_name',           
        ]);

        $info = array(
            'message' => "Fees Category Class Added successfull",
            'alert-type' => 'success'
        );

        $UpdateFeesCattData = FeesCategory::find($id);
        $UpdateFeesCattData->fees_cat_name = $request->fees_cat_name;
        $UpdateFeesCattData->update();
        return redirect('admin/feescategory')->with('success', 'feescategory Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletefeescategoryData = FeesCategory::find($id);
        $deletefeescategoryData->delete();
        return redirect('admin/feescategory')->with('success', 'feescategory Delete successfully.');
    }
}
