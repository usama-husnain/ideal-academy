@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Fee Collection</h3>
        <hr />
        <a class="btn btn-primary my-3" href="{{route('fee.create')}}">Create</a>
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
                {{-- @php $i=0; @endphp
                @forelse($notes as $nts)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$nts->title}}</td>
                        <td>{{$nts->chapter}}</td>
                        <td>{{$nts->book."-".$nts->class}}</td>
                        <td class="d-flex">
                            <a href="{{route('notes.print',$nts->id)}}" class="btn btn-success mx-1" title="print"><span class="fa fa-print"></span></a>
                            <form method="post"  action="{{route('notes.destroy',$nts->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" title="Delete Notes"><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No Recod Found!</td>

                    </tr>
                @endforelse --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
