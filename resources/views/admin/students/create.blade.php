@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Create Student</h3>
        <hr />

        <form method="POST" action="{{ route('students.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label>First Name:</label>
                    <input type="text" name="fname" class="form-control" placeholder="Ali" />
                </div>
                <div class="col-md-6">
                    <label>Last Name:</label>
                    <input type="text" name="lname" class="form-control" placeholder="Raza" />
                </div>
            </div>


            <label>School:</label>
            <input type="text" name="school" class="form-control" placeholder="Al-Hadi Foundation" />

            <label>Class:</label>
            <input type="text" name="class" class="form-control" placeholder="e.g. KG, 1-10" />


            <label>Roll #:</label>
            <input type="number"  name="roll"  class="form-control" value="{{rand('100000','999999')}}" readonly>

            <label>Phone #:</label>
            <input type="number"  name="phone"  class="form-control" placeholder="03023537951">

            <label>Monthly Fee:</label>
            <input type="number"  name="fee"  class="form-control" placeholder="2500">


            <button type="submit" name="submit" class="btn btn-primary my-3">Save</button>

        </form>
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
