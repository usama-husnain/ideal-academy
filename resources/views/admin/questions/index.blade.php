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
                    <td>Type</td>
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
                        <td>{{$q->type}}</td>
                        <td>{{$q->book}}-{{$q->class}}</td>
                        <td class="d-md-flex">
                            <a class="btn btn-primary mx-md-1" href="{{route('question.edit',$q->id)}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form method="post"  action="{{route('question.destroy',$q->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" title="Delete Question"><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
