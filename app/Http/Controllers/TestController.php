<?php

namespace App\Http\Controllers;

use App\Models\QuestionModel;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Http\Str;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Test::orderBy('id','desc')->get();
        return view('admin.test.index',compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.test.setting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=Test::create($request->all())->toArray();

        if($data["chapter"]){
            $questions=QuestionModel::where("chapter",$data["chapter"])
            ->where("book",$data["book"])
            ->inRandomOrder()->get()->toArray();

            return view('admin.test.create',compact('questions','data'));

        }

        // return redirect()->route('test.finalize')->with( ['data' => $data] );
    }


    public function finalize(Request $request)
    {
        // dd($request->all());
        $test_id = $request->get("test_id");
        $question_ids = $request->get("question_id");
        $test = Test::find($test_id);
        $test->questions()->attach($question_ids);
        return redirect()->route('test.index');
    }


    public function get_finalize($id)
    {
        // dd($id);
        $data = Test::find($id)->toArray();
        // dd($test->questions->toArray());
        // dd($test);
        if($data["chapter"]){
            $questions=QuestionModel::where("chapter",$data["chapter"])
            ->where("book",$data["book"])
            ->inRandomOrder()->get()->toArray();

            return view('admin.test.create',compact('questions','data'));

        }

        // return view('admin.test.chapter', compact('data'));
    }

    public function print($id)
    {
        // dd($id);
        $data = Test::with('questions')->find($id);
        // dd($test->questions->toArray());

        return view('admin.test.chapter', compact('data'));
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
