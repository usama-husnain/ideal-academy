@extends('layouts.master')

@section('content')
<style>
    .badge-warning{
        background-color:#F0AD4E
    }
    .badge-success{
        background-color:#5CB85C
    }
    .badge-danger{
        background-color:#D9534F
    }
    .disabled-link {
      pointer-events: none;
    }
    .p > p{
        margin-left: 50px;
    }
    </style>
<div id="new"></div>
<div class="card printtohide">
    <div class="card-body">
        <h3 class="">Fee Slip</h3>
        <button type="button" class="btn btn-success" id="btn">Print</button>
        <hr />
        <div id="printarea">
            @for($i=0; $i<=1; $i++)
            <div class="row">

                    <h2 class=" fw-bolder text-center ">IDEAL ACADEMY</h2>
                    <h3 class="mb-1 fw-bold text-center">Fee Slip</h3>
                    <h5 class="mb-0 fw-bold text-center border border-dark rounded m-auto p-2  w-50" ><span class="small">(For the Month of {{ now()->format('F Y') }})</span> </h5>
            </div>
            <hr/>

            <h5 class="text-center mt-5 fw-bold my-3 text-decoration-underline">Slip For {{ ($i==0) ? "Academy" : "Student"}}</h5>
            <div class="row ">
                <div class="col-6 text-center ">
                    <label class="fw-bold">Student Name:</label>
                    {{$fee->student->fname.' '.$fee->student->lname}}
                </div>
                <div class="col-6 text-center ">
                    <label class="fw-bold">Roll #:</label>
                    {{$fee->student->roll}}
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-center ">
                    <label class="fw-bold">Monthly Fee:</label>
                    {{$fee->student->fee." /-"}}
                </div>
                <div class="col-6 text-center ">
                    <label class="fw-bold">Class:</label>
                    {{$fee->student->class}}
                </div>

            </div>
            <div class="row">
                <div class="col-6 text-center ">
                    <label class="fw-bold">Date:</label>
                    {{date('d-m-Y',strtotime($fee->created_at))}}
                </div>

                <div class="col-6 text-center ">
                    <label class="fw-bold">  Fee Paid:</label>
                    {{$fee->paid_fee." /-"}} <span class="badge  badge-success">{{$fee->status}}</span>
                </div>

            </div>
            <div class="row">
                <div class="col-6 text-center ">
                    <label class="fw-bold">Remarks:</label>
                    <?php echo $fee->remarks ?>
                </div>
                <div class="col-6 text-center ">

                </div>
            </div>
            <div class="p mb-5 text-center ">

            </div>


            @endfor
        </div>
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
