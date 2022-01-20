<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjectdatas = Subject::all();
        return view('backend/setup/subject/index', compact('subjectdatas'));
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
            'subject_name' => 'required|string|max:100|unique:subjects, subjects_name',           
        ]);

        $info = array(
            'message' => "Subject Class Added successfull",
            'alert-type' => 'success'
        );

        $subject = new Subject;
        $subject->subject_name = $request->subject_name; 
        $subject->save();
        return redirect('admin/subject')->with('success', 'Subject created successfully.');
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
        $EditsubjectData = Subject::findOrFail($id);
        return view('backend/setup/subject/edit-subject', compact('EditsubjectData'));
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
            'subject_name' => 'required|string|max:100|unique:subjects, subjects_name',           
        ]);

        $info = array(
            'message' => "Subject Class Added successfull",
            'alert-type' => 'success'
        );
        $UpdatesubjectData = Subject::find($id);
        $UpdatesubjectData->subject_name = $request->subject_name;
        $UpdatesubjectData->update();
        return redirect('admin/subject')->with('success', 'subject Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletesubjectData = Subject::find($id);
        $deletesubjectData->delete();
        return redirect('admin/subject')->with('success', 'subject Delete successfully.');
    }
}
