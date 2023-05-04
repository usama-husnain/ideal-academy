<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fee.index');
    }


    public function collection()
    {
        $id = array();

        $fees = Fee::whereMonth('created_at', Carbon::now()->month)->orderBy('id','DESC')->get();
        $students = Student::whereDoesntHave('fee', function ($query){
            $query->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
        })->get();

        return view('admin.fee.collect', compact('fees','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::whereDoesntHave('fee', function ($query){
            $query->whereMonth('created_at', Carbon::now()->month)
                  ->whereYear('created_at', Carbon::now()->year);
        })->get();
        return view('admin.fee.create',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::find($request->get('student_id'));
     //   dd($student->fee);
        $status = "Unpaid";
        if($student->fee-$request->get('paid_fee')==0)
        {
            $status = "Paid";
        }

        if($student->fee-$request->get('paid_fee')!=0)
        {
            $status = "Partial-paid";
        }
        $request["status"] = $status;
        $fee = Fee::create($request->all());
        return redirect('/fee/collection');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        $student = $fee;
        return view('admin.fee.edit',compact('fee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
        $student = $fee->student;
    //    dd($student->fee);
        $status = "Unpaid";
        if($student->fee-$request->get('paid_fee')==0)
        {
            $status = "Paid";
        }

        if($student->fee-$request->get('paid_fee')!=0)
        {
            $status = "Partial-paid";
        }
        $request["status"] = $status;
        $fee->update($request->all());
        return redirect('/fee/collection');

    }


    public function print($id)
    {
        $fee = Fee::find($id);

        return view('admin.fee.feeSlip', compact('fee'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        //
    }
}
