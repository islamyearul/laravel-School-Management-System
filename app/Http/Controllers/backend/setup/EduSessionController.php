<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EduSession;

class EduSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessiondatas = EduSession::all();
        return view('backend/setup/session/index', compact('sessiondatas'));
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
            'edu_session' => 'required|string|max:100',           
        ]);

        $info = array(
            'message' => "session Added successfull",
            'alert-type' => 'success'
        );

        $session = new EduSession;
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
        $EditsessionData = EduSession::findOrFail($id);
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
        $UpdatesessionData = EduSession::find($id);
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
        $deletesessionData = EduSession::find($id);
        $deletesessionData->delete();
        return redirect('admin/session')->with('success', 'session Delete successfully.');
    }
}
