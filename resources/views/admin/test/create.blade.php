@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Finalize Test</h3>
        <hr />
        <div class="row">
            <div class="col-4">
                <h6 class="mb-0 text-capitalize fw-bold">{{$data["book"]}}{{$data["class"]}}: {{$data["test"]}}</h6>
                <h6 class="mb-0 fw-bold">Chapter: {{$data["chapter"]}}</h5>
                {{-- <h6 class="mb-0 fw-bold">Time Allowed: {{ 3*intval($data["short_count"]) + 5*intval($data["long_count"]) }} </h6> --}}
            </div>
            <div class="col-4">
                <img src="" />
            </div>
            <div class="col-4">
                <h6 class="mb-0 fw-bold text-end">Session (2022-23)</h6>
                <h6 class="mb-0 fw-bold text-end">{{$data["category"]." Test"}}</h6>
                {{-- <h6 class="mb-0 fw-bold text-end">Total Marks: {{ 2*intval($data["short_count"]) + 5*intval($data["long_count"]) }} </h6> --}}
            </div>
        </div>
        <hr>
    <form method="POST"  action="{{ route('test.finalize') }}">
        @csrf
        <input type="hidden" name="test_id" value="{{$data["id"]}}" />
        <div class="short my-2">
            <p class="fw-bold">Q.No.1: Answer the following question:
                {{-- {{strtolower(NumConvert::roman(4)) }} --}}
            </p>

                @php $i = 1; @endphp
                @forelse($questions as $q)
                    @if($q["type"]=="short")
                        <div id="{{"q".$q["id"]}}" class="row my-2">
                            <div class="col-md-10">
                                <input type="hidden" name="question_id[]" value="{{$q["id"]}}" />
                             <input class="form-control" type="text" name="question" value="{{$q["title"]}}" readonly/>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger rmv {{"q".$q["id"]}}">
                                    <span class="fa fa-trash"></span>
                                </button>

                            </div>
                        </div>
                    @endif

                    @empty
                        <div class="container">
                            <p class="fw-bold text-danger">Record not found!</p>
                        </div>
                @endforelse

            {{-- <ol type="i">
                @foreach($questions as $q)
                    @if($q["type"]=="short")
                        <li>{{$q["title"]}}</li>

                    @endif
                @endforeach
            </ol> --}}
        </div>

        <p class="fw-bold">Note: Explain the following question:</p>
        <div class="Long">
            <p class="fw-bold mb-0">Q.No.2:</p>

                @php $i = 1; @endphp
                @forelse($questions as $q)
                    @if($q["type"]=="long")

                    <div id="{{"q".$q["id"]}}" class="row my-2">
                        <div class="col-md-10">
                            <input type="hidden" name="question_id[]" value="{{$q["id"]}}" />
                            <input class="form-control" type="text" name="question" value="{{$q["title"]}}" readonly/>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="rmv btn btn-danger">
                                <span class="fa fa-trash"></span>
                            </button>

                        </div>
                    </div>

                    @endif

                    @empty
                        <div class="container">
                            <p class="fw-bold text-danger">Record not found!</p>
                        </div>
                @endforelse

                <button type="submit" class="btn btn-primary my-2">Finalize</button>
            </form>
            {{-- <ol type="a">
                @foreach($questions as $q)
                    @if($q["type"]=="long")
                        <li>{{$q["title"]}}</li>

                    @endif
                @endforeach
            </ol> --}}
        </div>
    </form>

        {{-- <form method="POST" action="{{ route('test.store') }}">
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

            <label>Chapter #:</label>
            <input type="number" min="1" name="chapter"  class="form-control">

            <label>Type:</label>
            <select name="type" id="" class="form-control">
                <option value="" selected disabled>--- Select Type ---</option>
                <option value="short">Short</option>
                <option value="long">Long</option>
                <option value="both">Both</option>
            </select>

            <div class="row my-2">
                <div class="col-md-6">
                    <label>Short Question Count:</label>
                    <input type="number" name="question_count" class="form-control" placeholder="Enter number of questions (5)" />

                </div>
                <div class="col-md-6">
                    <label>Long Question Count:</label>
                    <input type="number" name="question_count" class="form-control" placeholder="Enter number of questions (5)" />
                </div>
            </div>

            <label>Priority Level:</label>
            <select name="priority" id="" class="form-control">
                <option value="" selected disabled>--- Select Priority ---</option>
                <option value="imoportant">Imoportant</option>
                <option value="normal">Normal</option>
                <option value="random">Random</option>
            </select>

            <button type="submit" name="submit" class="btn btn-primary my-3">Save & Next</button>

        </form> --}}
    </div>
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(".rmv").click(function(){
        var id=$(this).parent().parent().attr("id");
        // alert(id);
        $("#"+id).remove();
        });
</script>
@endsection
