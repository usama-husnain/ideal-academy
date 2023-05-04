@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Create Fee</h3>
        <hr />
        <form method="POST" action="{{ route('fee.store') }}">
            @csrf


            <label>Student:</label>
            <select name="student_id" id="" class="form-control" required>
                <option value="" selected disabled>--- Select Student (Name | Class | Roll#) ---</option>
                @foreach($students as $student)
                    <option value="{{$student->id}}"  >{{$student->fname.' '.$student->lname.' | '.$student->class.' | '.$student->roll}}</option>
                @endforeach
            </select>


            <label>Fee Received :</label>
            <input type="number" min="1" name="paid_fee"  class="form-control">

            <label>Remarks:</label>
            <textarea id="mytextarea" name="remarks" class="form-control" placeholder="Enter remarks"></textarea>


            <button type="submit" name="submit" class="btn btn-primary my-3">Save</button>

        </form>
    </div>
</div>

@endsection
