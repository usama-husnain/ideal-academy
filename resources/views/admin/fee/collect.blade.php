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
</style>
<div class="card">
    <div class="card-body">
        <h3 class="m-0 ">Fee Collection </h3> <span class="small">(For the Month of {{ now()->format('F Y') }})</span>
        <hr />

        <a class="btn btn-primary my-3" href="{{route('fee.create')}}">Create</a>
        <h4 class="yt-3">Paid Students</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Student</th>
                    <th>Class</th>
                    <th>Tution Fee</th>
                    <th>Paid Fee</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=0; @endphp
                @forelse($fees as $fee)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$fee->student->fname.' '.$fee->student->lname}}</td>
                        <td>{{$fee->student->class}}</td>
                        <td>{{$fee->student->fee}}</td>
                        <td>{{$fee->paid_fee}}</td>
                        <td><span class="badge  {{ ($fee->status=='Paid') ? "badge-success" : "badge-warning"}}">{{$fee->status}}<span></td>
                        <td class="d-flex">
                            <a href="{{route('fee.print',$fee->id)}}" class="btn btn-success mx-1" title="Print Slip"><span class="fa fa-print"></span></a>
                            <a href="{{route('fee.edit',$fee->id)}}" class="btn btn-primary mx-1 {{ ($fee->status=='Paid') ? "disabled" : ""}}"  ><span class="fa fa-pencil"></span></a>
                            <form method="post"  action="{{route('fee.destroy',$fee->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" disabled><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No Recod Found!</td>

                    </tr>
                @endforelse
            </tbody>
        </table>

        <hr/>
        <h4>Unpaid Students</h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Student</th>
                    <th>Class</th>
                    <th>Tution Fee</th>
                    <th>Paid Fee</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @php $i=0; @endphp
                @forelse($students as $stu)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$stu->fname.' '.$stu->lname}}</td>
                        <td>{{$stu->class}}</td>
                        <td>{{$stu->fee}}</td>
                        <td>0</td>
                        <td><span class="badge badge-danger">Upaid<span></td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No Recod Found!</td>

                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
