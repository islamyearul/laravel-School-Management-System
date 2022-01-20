<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Group;
use App\Models\EduSession;
use App\Models\Shift;
use App\Models\StudentClass;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Studentsdatas = Student::all();
        return view('backend/student/index', compact('Studentsdatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Classs = StudentClass::all();
        $Groups = Group::all();
        $Sessions = EduSession::all();
        $Shifts = Shift::all();
        return view('backend/student/add-student', compact('Classs', 'Groups', 'Sessions', 'Shifts'));
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
            'edu_session' => 'required|string|max:100|unique:edu_sessions,edu_session',           
        ]);

        $info = array(
            'message' => "session Added successfull",
            'alert-type' => 'success'
        );

        $session = new Student;
        $session->edu_session = $request->edu_session; 
        $session->save();
        return redirect('admin/session')->with('success', 'session created successfully.');
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
        $EditsessionData = Student::findOrFail($id);
        return view('backend/setup/session/edit-session', compact('EditsessionData'));
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
            'edu_session' => 'required|string|max:100|unique:edu_sessions,edu_session',           
        ]);

        $info = array(
            'message' => "session Added successfull",
            'alert-type' => 'success'
        );
        $UpdatesessionData = Student::find($id);
        $UpdatesessionData->edu_session = $request->edu_session;
        $UpdatesessionData->update();
        return redirect('admin/session')->with('success', 'session Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletesessionData = Student::find($id);
        $deletesessionData->delete();
        return redirect('admin/session')->with('success', 'session Delete successfully.');
    }
}
