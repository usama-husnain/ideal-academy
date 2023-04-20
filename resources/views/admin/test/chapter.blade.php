@extends('layouts.master')

@section('content')
<div id="new"></div>
<div class="card printtohide">
    <div class="card-body">
        <h3 >Print Test</h3>
        <button type="button" class="btn btn-success" id="btn">Print</button>
        <hr />
        <div id="printarea">
        <div class="row">
            <div class="col-4">
                <h6 class="mb-0 text-capitalize fw-bold">{{$data["book"]}}{{$data["class"]}}: {{$data["test"]}}</h6>
                <h6 class="mb-0 fw-bold">Chapter: {{$data["chapter"]}}</h5>
                <h6 class="mb-0 fw-bold">Time Allowed: <span class="time"></span> </h6>
            </div>
            <div class="col-4">
                <img src="" />
            </div>
            <div class="col-4">
                <h6 class="mb-0 fw-bold text-end">Session (2022-23)</h6>
                <h6 class="mb-0 fw-bold text-end">{{$data["category"]." Test"}}</h6>
                <h6 class="mb-0 fw-bold text-end">Total Marks: <span class="marks"></span> </h6>
            </div>
        </div>
        <hr>


        @php
            // Initialize counters for short and long type records
            $SHORT_PER_SECTION= env('SHORT_PER_SECTION');
            $LONG_PER_SECTION= env('LONG_PER_SECTION');
            $CHOICE= env('CHOICE');
            $shortCount = 0;
            $longCount = 0;
            $ques_order = 0;
            $short_questions = [];
            $long_questions = [];

            // Loop through the records to count the number of short and long type records
            foreach ($data->questions as $record) {
                if ($record['type'] == 'short') {
                    $shortCount++;
                    $short_questions[]=$record["title"];
                } else {
                    $longCount++;
                    $long_questions[]=$record["title"];
                }
            }

            // Determine the number of short and long type sections needed based on the counts
            $shortSections = round($shortCount / $SHORT_PER_SECTION);
            $longSections = round($longCount / $LONG_PER_SECTION);

        @endphp


        <div class="short my-2">

            <h5 class="fw-bold my-3 text-center">Section-I</h5>
            @for($i = 1; $i <= $shortSections; $i++)
            @php   $ques_order = $i; $count = 0;  @endphp
                <p class="fw-bold">Q.No.{{$i}}: Answer the following question: (Any {{$SHORT_PER_SECTION - $CHOICE}})</p>

                <ol type="i" class="short">
                    @foreach($short_questions as $key => $q)
                    @php   $count++; @endphp
                        @if($count <= $SHORT_PER_SECTION)
                            <li>{{$q}}</li>
                            @php
                                unset($short_questions[$key]);
                            @endphp

                        @endif
                    @endforeach
                </ol>
            @endfor
        </div>

        <div class="Long">
            <h5 class="fw-bold my-3 text-center">Section-II</h5>
            <p class="fw-bold">Note: Explain the following question:</p>
            @for($i = 1; $i <= $longSections; $i++)
                @php   $count = 0;  @endphp
                <p class="fw-bold mb-0">Q.No.{{$i+$ques_order}}:</p>

                <ol type="a" class="long">
                    @foreach($long_questions as $key => $lq)
                        @php   $count++; @endphp
                        @if($count <= $LONG_PER_SECTION)
                            <li>{{$lq}}</li>
                            @php
                                unset($long_questions[$key]);
                            @endphp

                        @endif
                    @endforeach
                </ol>
            @endfor
        </div>
    </div>

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
    $(document).ready(function(){
        var short_child=parseInt($(".short li").length);
        var long_child=parseInt($(".long li").length);
        var marks = short_child*2+long_child*5;
        var time = short_child*3+long_child*8;
        $(".marks").html(marks);
        $(".time").html(time);


        $("#btn").click(function () {
            //Hide all other elements other than printarea.
           $("#new").html($("#printarea").html())
            $(".printtohide").hide();
            // $('#wrapper').not("#box_5").hide();
            // $("#printarea").show();
            window.print();
            window.close();
            return false;
        });
    });

</script>
@endsection
