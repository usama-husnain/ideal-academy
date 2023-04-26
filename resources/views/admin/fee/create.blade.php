@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Create Notes</h3>
        <hr />
        <form method="POST" action="{{ route('fee.store') }}">
            @csrf


            <label>Student:</label>
            <select name="book" id="" class="form-control" required>
                <option value="" selected disabled>--- Select Students ---</option>
                @foreach($students as $student)
                    <option value="{{$student->id}}"  >{{$student->fname.' '.$student->lname}}</option>
                @endforeach
            </select>


            <label>Chapter #:</label>
            <input type="number" min="1" name="chapter"  class="form-control">

            <label>Type:</label>
            <select name="type" id="" class="form-control" required>
                <option value="" selected disabled>--- Select Type ---</option>
                <option value="short">Short</option>
                <option value="long">Long</option>
                <option value="both">Both</option>
            </select>


            <button type="submit" name="submit" class="btn btn-primary my-3">Save</button>

        </form>
    </div>
</div>

@endsection
