<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Classdata = StudentClass::all();
        return view('backend/setup/class/index', compact('Classdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/setup/class/add-class');
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
            'class_name' => 'required|string|max:100',           
        ]);

        $info = array(
            'message' => "Student Class Added successfull",
            'alert-type' => 'success'
        );

        $Class = new StudentClass;
        $Class->class_name = $request->class_name; 
        $Class->save();
        return redirect('admin/class')->with('success', 'Class created successfully.');
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
        $EditClassData = StudentClass::find($id);
        return view('backend/setup/class/edit-class', compact('EditClassData'));
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
        $UpdateClassData = StudentClass::find($id);
        $UpdateClassData->class_name = $request->class_name;
        $UpdateClassData->update();
        return redirect('admin/class')->with('success', 'Class Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteClassData = StudentClass::find($id);
        $deleteClassData->delete();
        return redirect('admin/class')->with('success', 'Class Delete successfully.');

    }
}
