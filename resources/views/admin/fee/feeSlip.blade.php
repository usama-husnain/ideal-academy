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

            <div class="row {{($i==1) ? "mt-4" : ""}}">

                    <h2 class=" mb-0 fw-bolder text-center ">IDEAL ACADEMY</h2>
                    <h3 class="mb-0 fw-bold text-center">Fee Slip</h3>
                    {{-- <h5 class="mb-0 fw-bold text-center border border-dark rounded m-auto p-2  w-50" ><span class="small">(For the Month of {{ now()->format('F Y') }})</span> </h5> --}}
            </div>

            <table class="table table-bordered mt-1">
                <thead class="bg-light">
                    <tr>
                        <th  colspan="2">
                            <h5 class="text-center fw-bold  text-decoration-underline">Slip For {{ ($i==0) ? "Academy" : "Student"}}</h5>
                        </th>
                    </tr>
                </thead>
                <tr>
                    <th>Student Name:</th>
                    <td>
                        {{$fee->student->fname.' '.$fee->student->lname}}
                    </td>
                </tr>
                <tr>
                    <th>Roll #</th>
                    <td>
                        {{$fee->student->roll}}
                    </td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td>
                        {{$fee->student->class}}
                    </td>
                </tr>
                <tr>
                    <th>Monthly Fee</th>
                    <td>
                        {{$fee->student->fee.' /-'}}
                    </td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>
                        {{date('d-m-Y',strtotime($fee->created_at))}}
                    </td>
                </tr>
                <tr>
                    <th>Fee Paid</th>
                    <td>
                        {{$fee->paid_fee.' /- '}} <span class="badge  badge-success">{{$fee->status}}</span>
                    </td>
                </tr>
                <tr>
                    <th>Remarks</th>
                    <td>
                        <?php echo $fee->remarks ?>
                    </td>
                </tr>

            </table>



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
