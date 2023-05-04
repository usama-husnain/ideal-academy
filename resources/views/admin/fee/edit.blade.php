@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Edit Fee </h3>
        <hr />
        <form method="POST" action="{{ route('fee.update',$fee->id) }}">
            @method('PUT')
            @csrf
            <label>Student:</label>
            <select name="student_id" id="" class="form-control" required>
                <option value="{{$fee->id}}"  >{{$fee->student->fname.' '.$fee->student->lname.' | '.$fee->student->class.' | '.$fee->student->roll}}</option>

            </select>


            <label>Fee Received :</label>
            <input type="number" min="1" name="paid_fee"  class="form-control" value="{{ $fee->paid_fee }}">

            <label>Remarks:</label>
            <textarea id="mytextarea" name="remarks" class="form-control" placeholder="Enter remarks">
                {{ $fee->remarks }}
            </textarea>


            <button type="submit" name="submit" class="btn btn-primary my-3">Save</button>

        </form>
    </div>
</div>

@endsection
