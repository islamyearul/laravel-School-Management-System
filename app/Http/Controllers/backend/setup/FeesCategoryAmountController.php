<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\FeesCategory;
use App\Models\FeesCategoryAmount;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Http\Request;

class FeesCategoryAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $fee_category_amounts = FeeCategoryAmount::all();
         $FeesCatdatas = FeesCategory::all();
         $StudentClasss = StudentClass::all();
         $fee_category_amounts = FeesCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
         return view('backend.setup.fee_category_amount.view_fee_amount', compact('fee_category_amounts', 'FeesCatdatas', 'StudentClasss'));
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
            'amount' => 'required',           
        ]);

        $Notification = array(
            'message' => "Fees Category Amount Added successfull",
            'alert-type' => 'success'
        );

        $FeesCategoryAmount = new FeesCategoryAmount;
        $FeesCategoryAmount->fee_category_id = $request->fee_category_id; 
        $FeesCategoryAmount->class_id = $request->class_id; 
        $FeesCategoryAmount->amount = $request->amount; 
        $FeesCategoryAmount->save();
        return redirect('admin/feescategoryamount')->with($Notification);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
