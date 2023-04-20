@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Manage Test</h3>
        <hr />
        <a class="btn btn-primary my-3" href="{{route('notes.create')}}">Create</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Title</th>
                    <th>Chapter#</th>
                    <th>Book</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=0; @endphp
                @forelse($notes as $nts)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$nts->title}}</td>
                        <td>{{$nts->chapter}}</td>
                        <td>{{$nts->book."-".$nts->class}}</td>
                        <td>
                            <a href="{{route('notes.print',$nts->id)}}" class="btn btn-success" title="print"><span class="fa fa-print"></span></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No Recod Found!</td>

                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
