@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Manage Students</h3>
        <hr />
        <a class="btn btn-primary my-3" href="{{route('students.create')}}">Create</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Fee</th>
                    <th>Roll #</th>
                    <th>Phone #</th>
                    <th>Action</th>
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
                        <td>{{$stu->roll}}</td>
                        <td>{{$stu->phone}}</td>
                        <td class="d-flex">
                            <a href="{{route('students.edit',$stu->id)}}" class="mx-1 btn btn-primary" title="Edit Student"><span class="fa fa-pencil"></span></a>
                            <form method="post"  action="{{route('students.destroy',$stu->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" title="Delete Student"><span class="fa fa-trash"></span></button>
                            </form>
                            {{-- <a href="{{route('students.destroy',$stu->id)}}" class="btn btn-danger  " title="Delete Student"><span class="fa fa-trash"></span></a> --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No recod found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
