<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holidays;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $Holidayssdata = Holidays::all();
        return view('backend/setup/holidays/index', compact('Holidayssdata'));
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
            'name' => 'required|string|max:100|unique:holidays, name',           
            'description' => 'required|max:200',           
            'date' => 'required|date',           
        ]);

        $info = array(
            'message' => "Holidays Class Added successfull",
            'alert-type' => 'success'
        );

        $Holidays = new Holidays;
        $Holidays->name = $request->name; 
        $Holidays->description = $request->description; 
        $Holidays->date = $request->date; 
        $Holidays->save();
        return redirect('admin/holidays')->with('success', 'Holidays created successfully.');
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
        $EditholidaysData = Holidays::findOrFail($id);
        return view('backend/setup/holidays/edit-holidays', compact('EditholidaysData'));
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
            'name' => 'required|string|max:100|unique:holidays, name',           
            'description' => 'required|max:200',           
            'date' => 'required|date',           
        ]);

        $info = array(
            'message' => "Holidays Class Added successfull",
            'alert-type' => 'success'
        );

        $UpdateHolidaysData = Holidays::find($id);
        $UpdateHolidaysData->name = $request->name; 
        $UpdateHolidaysData->description = $request->description; 
        $UpdateHolidaysData->date = $request->date; 
        $UpdateHolidaysData->update();
        return redirect('admin/holidays')->with('success', 'Holidays Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteHolidaysData = Holidays::find($id);
        $deleteHolidaysData->delete();
        return redirect('admin/holidays')->with('success', 'Holidays Delete successfully.');
    }
}
