@extends('layouts.master')

@section('content')

<div class="card">
    <div class="card-body">
        <h3>Add Question</h3>
        <hr />
        <form method="POST" action="{{ route('question.update',$question->id) }}">
            @method('PUT')
            @csrf
            <label>Title:</label>
            <input type="text" name="title" class="form-control" placeholder="What is physics?" value="{{$question->title}}"/>

            <label>Answer:</label>
            <textarea name="answer" id="" class="form-control" rows="5" placeholder="Your answer..." >{{$question->answer}}</textarea>

            <label>Class:</label>
            <select name="class" id="" class="form-control" disabled>
                <option value="9" {{$question->class == "9" ? 'selected' : ''}}>9</option>
                <option value="10" {{$question->class == "10" ? 'selected' : ''}}>10</option>
            </select>

            <label>Book:</label>
            <select name="book" id="" class="form-control" disabled>
                <option value="physics" {{$question->book == "physics" ? 'selected' : ''}}>Physics</option>
                <option value="chemistry" {{$question->book == "chemistry" ? 'selected' : ''}}>Chemistry</option>
            </select>

            <label>Chapter #:</label>
            <input type="number" min="1" name="chapter"  class="form-control" value="{{$question->chapter}}" disabled>

            <label>Type:</label>
            <select name="type" id="" class="form-control" disabled>
                <option value="short" {{$question->type == "short" ? 'selected' : ''}}>Short</option>
                <option value="long" {{$question->type == "long" ? 'selected' : ''}}>Long</option>
            </select>

            <label>Priority:</label>
            <select name="priority" id="" class="form-control" disabled>
                <option value="imoportant" {{$question->priority == "imoportant" ? 'selected' : ''}}>Imoportant</option>
                <option value="normal" {{$question->priority == "normal" ? 'selected' : ''}}>Normal</option>
            </select>

            <button type="submit" name="submit" class="btn btn-primary my-3">Submit</button>

        </form>
    </div>
</div>

@endsection
