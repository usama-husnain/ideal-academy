@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Manage Test</h3>
        <hr />
        <a class="btn btn-primary my-3" href="{{route('test.create')}}">Create</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr #</th>
                    <th>Test</th>
                    <th>Question Count</th>
                    <th>Chapter#</th>
                    <th>Book</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i=0; @endphp
                @forelse($test as $tst)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$tst->test}}</td>
                        <td>{{count($tst->questions)}}</td>
                        <td>{{$tst->chapter}}</td>
                        <td>{{$tst->book."-".$tst->class}}</td>
                        <td class="d-flex">
                            <a href="{{route('test.print',$tst->id)}}" class="btn btn-success" title="print"><span class="fa fa-print"></span></a>
                            <a href="{{route('test.get_finalize',$tst->id)}}" class="mx-1 btn btn-primary bg-primary-50 {{ (count($tst->questions)!=0) ? 'disabled' : '' }}" title="Finalize"><span class="fa fa-arrow-right"></span></a>
                            <form method="post"  action="{{route('test.destroy',$tst->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" title="Delete Test"><span class="fa fa-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td rowspan="5">No recod found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
