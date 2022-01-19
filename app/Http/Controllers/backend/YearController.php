<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Yearsdata = Year::all();
        return view('backend/year/index', compact('Yearsdata'));
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
            'year' => 'required|string|max:100',           
        ]);

        $info = array(
            'message' => "Student Class Added successfull",
            'alert-type' => 'success'
        );

        $Year = new Year;
        $Year->year = $request->year; 
        $Year->save();
        return redirect('admin/year')->with('success', 'Year created successfully.');
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
        $EditYearData = Year::findOrFail($id);
        return view('backend/year/edit-year', compact('EditYearData'));
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
        $UpdateYearData = Year::find($id);
        $UpdateYearData->year = $request->year;
        $UpdateYearData->update();
        return redirect('admin/year')->with('success', 'Year Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteYearData = Year::find($id);
        $deleteYearData->delete();
        return redirect('admin/year')->with('success', 'Year Delete successfully.');
    }
}
