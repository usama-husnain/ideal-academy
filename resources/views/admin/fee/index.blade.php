@extends('layouts.master')

@section('content')
<div id="new"></div>
<div class="card printtohide">
    <div class="card-body">
        <h3 >Fee Sturcture</h3>
        <button type="button" class="btn btn-success" id="btn">Print</button>
        <hr />
        <div id="printarea">
        <div class="row">

                <h2 class=" fw-bolder text-center ">IDEAL ACADEMY</h2>
                <h3 class="mb-1 fw-bold text-center">Fee Structure</h3>
                <h5 class="mb-0 fw-bold text-center border border-dark rounded m-auto p-2  w-50" >For the Academic Session {{env('ANNUAL_SESSION')}} </h5>
        </div>

        <hr>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td style="width:80%"> <b> Registeration Fee </b> <br>
                        <small>(Note: Student will pay this fee only 1 time after that he will able to attend 3 days trail classes.)</small>
                    </td>
                    <td>{{env('REGISTRATION_FEE')}}/-</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <th colspan="2" class="text-center">Class (PlayGroup - KG)</th>
            </thead>
            <tbody>
                <tr>
                    <th>Tuition Fee (Monthly)</th>
                    <td>{{env('PG_KG_FEE')}}/-</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <th colspan="2" class="text-center">Class (1 - 5)</th>
            </thead>
            <tbody>
                <tr>
                    <th>Tuition Fee (Monthly)</th>
                    <td><?php putenv("ONE_FIVE_FEE=100")  ?> {{env('ONE_FIVE_FEE')}}/-</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <th colspan="2" class="text-center">Class (6 - 8)</th>
            </thead>
            <tbody>
                <tr>
                    <th>Tuition Fee (Monthly)</th>
                    <td>{{env('SIX_EIGHT_FEE')}}/-</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <th colspan="2" class="text-center">Class (9 - 10)</th>
            </thead>
            <tbody>
                <tr>
                    <th>Tuition Fee (Monthly)</th>
                    <td>{{env('NINE_TEN_FEE')}}/-</td>
                </tr>
            </tbody>
        </table>
        <h5 class="fw-bold text-decoration-underline mt-5">Note:</h5>
        <ul>
            <li>Registeration fee is only for New Admission that is Non-Refundable.</li>
            <li>Student or his/her parents will pay first fee after 3 days trail classes.</li>
            <li>
                Regular students need to pay their fees during the first 10 days of each month.
                If there is a delay, their parents should inform the academy, and they will have
                5 extra days to pay. However, if the fee is still not paid by the 15th of the month,
                the academy will charge a fine of 100 rupees.
            </li>
        </ul>
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
