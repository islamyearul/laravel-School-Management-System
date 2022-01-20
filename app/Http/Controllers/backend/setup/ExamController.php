<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Examsdatas = Exam::all();
        return view('backend/setup/exam/index', compact('Examsdatas'));
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
            'exam_name' => 'required|string|max:100',           
        ]);

        $info = array(
            'message' => "Exam Type Class Added successfull",
            'alert-type' => 'success'
        );

        $Shift = new Exam;
        $Shift->exam_name = $request->exam_name; 
        $Shift->save();
        return redirect('admin/exam')->with('success', 'Exam Category created successfully.');
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
        $EditExamData = Exam::findOrFail($id);
        return view('backend/setup/exam/edit-exam', compact('EditExamData'));
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
        $UpdateExamtData = Exam::find($id);
        $UpdateExamtData->exam_name = $request->exam_name;
        $UpdateExamtData->update();
        return redirect('admin/exam')->with('success', 'Exam Name Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteExamData = Exam::find($id);
        $deleteExamData->delete();
        return redirect('admin/exam')->with('success', 'Exam Name Delete successfully.');
    }
}
