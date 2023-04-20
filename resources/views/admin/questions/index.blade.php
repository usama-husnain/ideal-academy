@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Manage Question</h3>
        <hr />
        <a class="btn btn-primary my-3" href="{{route('question.create')}}">Add Question</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>Sr #</td>
                    <td>Question</td>
                    <td>Chapter</td>
                    <td>Answer</td>
                    <td>Book</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $q)

                    <tr>
                        <td>{{$q->id}}</td>
                        <td>{{$q->title}}</td>
                        <td>{{$q->chapter}}</td>
                        <td>{{$q->answer}}</td>
                        <td>{{$q->book}}-{{$q->class}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('question.edit',$q->id)}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger" href="{{route('question.destroy',$q->id)}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
