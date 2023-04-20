@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Create Test Setting</h3>
        <hr />
        <form method="POST" action="{{ route('test.store') }}">
            @csrf
            <label>Test #:</label>
            <input type="text" name="test" class="form-control" placeholder="Test-1" />


            <label>Class:</label>
            <select name="class" id="" class="form-control">
                <option value="" selected disabled>--- Select Class ---</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>

            <label>Book:</label>
            <select name="book" id="" class="form-control">
                <option value="" selected disabled>--- Select Book ---</option>
                <option value="physics">Physics</option>
                <option value="chemistry">Chemistry</option>
            </select>


            <div class="row my-2">
                <div class="col-md-12">
                    <label>Category:</label>
                    <select name="category" id="" class="form-control">
                        <option value="" selected disabled>--- Select Category ---</option>
                        <option value="Chapter-Wise">Chapter-Wise</option>
                        <option value="Half-Book">Half-Book</option>
                        <option value="Full-Book">Full-Book</option>
                    </select>
                </div>
                {{-- <div class="col-md-6">
                    <label>Type:</label>
                    <select name="type" id="" class="form-control">
                        <option value="" selected disabled>--- Select Type ---</option>
                        <option value="short">Short</option>
                        <option value="long">Long</option>
                        <option value="both">Both</option>
                    </select>
                </div> --}}
            </div>


            {{-- <div class="row my-2">
                <div class="col-md-6">
                    <label>Short Question Count:</label>
                    <input type="number" name="short_count" class="form-control" placeholder="Enter number of questions (5)" />

                </div>
                <div class="col-md-6">
                    <label>Long Question Count:</label>
                    <input type="number" name="long_count" class="form-control" placeholder="Enter number of questions (5)" />
                </div>
            </div> --}}

            <label>Chapter #:</label>
            <input type="number" min="1" name="chapter"  class="form-control">

            {{-- <label>Priority Level:</label>
            <select name="priority" id="" class="form-control">
                <option value="" selected disabled>--- Select Priority ---</option>
                <option value="imoportant">Imoportant</option>
                <option value="normal">Normal</option>
                <option value="random">Random</option>
            </select> --}}

            <button type="submit" name="submit" class="btn btn-primary my-3">Save & Next</button>

        </form>
    </div>
</div>

@endsection
