<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Shiftssdata = Shift::all();
        return view('backend/setup/shift/index', compact('Shiftssdata'));
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
            'shift_name' => 'required|string|max:100',           
        ]);

        $info = array(
            'message' => "Shift Class Added successfull",
            'alert-type' => 'success'
        );

        $Shift = new Shift;
        $Shift->shift_name = $request->shift_name; 
        $Shift->save();
        return redirect('admin/shift')->with('success', 'Shift created successfully.');
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
        $EditShiftData = Shift::findOrFail($id);
        return view('backend/setup/shift/edit-shift', compact('EditShiftData'));
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
        $UpdateShiftData = Shift::find($id);
        $UpdateShiftData->shift_name = $request->shift_name;
        $UpdateShiftData->update();
        return redirect('admin/shift')->with('success', 'Shift Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteShiftData = Shift::find($id);
        $deleteShiftData->delete();
        return redirect('admin/shift')->with('success', 'Shift Delete successfully.');
    }
}
