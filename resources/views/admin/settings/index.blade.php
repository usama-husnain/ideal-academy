@extends('layouts.master')

@section('content')
<div id="new"></div>
<div class="card printtohide">

    <div class="card-body">
        <h3 >Settings</h3>
        <hr />
        @if(session('success'))
            <div class="my-3 alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <h4 class="text-center my-3 text-decoration-underline">Test Settings</h4>

        <form action="{{route('setting.store')}}" method="post">
            @csrf
            <label class="text-capitalize">annual session</label>
            <input type="text" class="form-control" name="ANNUAL_SESSION" value="{{env('ANNUAL_SESSION')}}">
            <div class="row">
                <div class="col-md-6">
                    <label>Short Per Section</label>
                    <input type="text" class="form-control" name="SHORT_PER_SECTION" value="{{env('SHORT_PER_SECTION')}}">
                </div>
                <div class="col-md-6">
                    <label>Short Per Section</label>
                    <input type="text" class="form-control" name="LONG_PER_SECTION" value="{{env('LONG_PER_SECTION')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Short Question Choice</label>
                    <input type="text" class="form-control" name="CHOICE" value="{{env('CHOICE')}}">
                </div>
                <div class="col-md-6">
                    <label>Long Question Choice</label>
                    <input type="text" class="form-control" name="LONG_CHOICE" value="{{env('LONG_CHOICE')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary my-2">Save</button>


        </form>



        <hr />
        <h4 class="text-center my-3 text-decoration-underline">Fee Settings</h4>

        <form action="{{route('setting.store')}}" method="post">
            @csrf
            <label class="text-capitalize">Registeration Fee</label>
            <input type="text" class="form-control" name="REGISTRATION_FEE" value="{{env('REGISTRATION_FEE')}}">
            <div class="row">
                <div class="col-md-6">
                    <label>PG to KG Fee</label>
                    <input type="text" class="form-control" name="PG_KG_FEE" value="{{env('PG_KG_FEE')}}">
                </div>
                <div class="col-md-6">
                    <label>ONE to FIVE Fee</label>
                    <input type="text" class="form-control" name="ONE_FIVE_FEE" value="{{env('ONE_FIVE_FEE')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>SIX to EIGHT Fee</label>
                    <input type="text" class="form-control" name="SIX_EIGHT_FEE" value="{{env('SIX_EIGHT_FEE')}}">
                </div>
                <div class="col-md-6">
                    <label>NINE to TEN Fee</label>
                    <input type="text" class="form-control" name="NINE_TEN_FEE" value="{{env('NINE_TEN_FEE')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary my-2">Save</button>


        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    });

</script>
@endsection
