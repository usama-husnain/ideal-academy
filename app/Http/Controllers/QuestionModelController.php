<?php

namespace App\Http\Controllers;

use App\Models\QuestionModel;
use Illuminate\Http\Request;

class QuestionModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = QuestionModel::all();
        // dd($questions);
        return view('admin.questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $question = QuestionModel::create($request->all());
        return redirect()->route('question.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionModel $questionModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionModel $questionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionModel $questionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionModel $questionModel)
    {
        //
    }
}
