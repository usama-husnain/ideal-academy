@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Create Notes</h3>
        <hr />
        <form method="POST" action="{{ route('notes.store') }}">
            @csrf
            <label>Title #:</label>
            <input type="text" name="title" class="form-control" placeholder="IDEAL NOTES" />


            <label>Class:</label>
            <select name="class" id="" class="form-control" required>
                <option value="" selected disabled>--- Select Class ---</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

            <label>Book:</label>
            <select name="book" id="" class="form-control" required>
                <option value="" selected disabled>--- Select Book ---</option>
                <option value="physics">Physics</option>
                <option value="chemistry">Chemistry</option>
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
