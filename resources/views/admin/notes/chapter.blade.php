@extends('layouts.master')

@section('content')

<style>
   td {
        border:1px solid black !important;
        border-width: 1px !important;
        padding: 5px;
    }

</style>
<div id="new"></div>
<div class="card printtohide">
    <div class="card-body">
        <h3 >Print Notes</h3>
        <button type="button" class="btn btn-success" id="btn">Print</button>
        <hr />
        <div id="printarea">
        <div class="row">
            <div class="col-4">
                <h6 class="mb-0 text-capitalize fw-bold">{{$data["book"]}}{{$data["class"]}}: <span class="text-uppercase">{{$data["title"]}}</span></h6>
                <h6 class="mb-0 fw-bold">Chapter: {{$data["chapter"]}}</h5>

            </div>
            <div class="col-4">
                <img src="" />
            </div>
            <div class="col-4">
                <h6 class="mb-0 fw-bold text-end">Session ({{env('ANNUAL_SESSION')}})</h6>
                <h6 class="mb-0 fw-bold text-end text-capitalize">{{$data["type"]." Questions"}}</h6>

            </div>
        </div>
        <hr>
        <ol>
            @foreach($questions as $q)
                <li class="fw-bold mt-2">{{$q["title"]}}</li>
                <?php  echo $q["answer"] ? "<p class='mb-0 fw-bold'>Ans:</p>".$q["answer"]: "Answer Not Found"; ?>

            @endforeach
        </ol>



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
            window.print();
            window.close();
            return false;
        });
    });

</script>
@endsection
