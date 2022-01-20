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
            'name' => 'required|string|max:50',           
            'std_id' => 'required|string|max:10|unique:students,std_id',  
            'class_roll' => 'required|integer',  
            'f_name' => 'required|string|max:50',  
            'm_name' => 'required|string|max:50',  
            'class' => 'required|string',  
            'shift' => 'required|string',  
            'session' => 'required|string',  
            'group' => 'required|string|nullable',  
            'gender' => 'required|string',  
            'b_date' => 'required|date',  
            'p_address' => 'required|string|max:200',  
            'per_address' => 'required|string|max:200|nullable',  
            'mobile' => 'required|integer',  
            'phone' => 'required|integer|nullable',  
            'photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',  
            
        ]);
   

        $info = array(
            'message' => "Student Added successfull",
            'alert-type' => 'success'
        );

        $Student = new Student;
        $Student->name = $request->name; 
        $Student->std_id = 'AISC-'. $request->std_id; 
        $Student->class_roll = $request->class_roll; 
        $Student->m_name = $request->m_name; 
        $Student->f_name = $request->f_name; 
        $Student->class = $request->class; 
        $Student->shift = $request->shift; 
        $Student->session = $request->session; 
        $Student->group = $request->group; 
        $Student->gender = $request->gender; 
        $Student->p_address = $request->p_address; 
        $Student->per_address = $request->per_address; 
        $Student->mobile = $request->mobile; 
        $Student->phone = $request->phone; 
        $Student->b_date = $request->b_date; 

        if ($request->file('photo')) {
            $photoname = $request->file('photo')->getClientOriginalName();
            $request->photo->storeAs('public/images/students', $photoname);
            $Student->photo = $photoname; 
           }else{
            $Student->photo = 'null'; 
           }
        $Student->save();
        return redirect('admin/student')->with('success', 'Student created successfully.');
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
