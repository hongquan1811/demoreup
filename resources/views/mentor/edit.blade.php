@extends('display.home')
@section('title')
    Edit Mentor
@endsection
@section('content')
    <form action="{{ route('mentors.update', $editMentor->id) }}" method="POST">
        @csrf
        <br/>
        @method('PUT')
        <input type="hidden" name="id" value="{{$editMentor->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="mentor_name" value="{{$editMentor->mentor_name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" value="{{$editMentor->subject}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
