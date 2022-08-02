@extends('display.home')
@section('title')
    Edit Classroom
@endsection
@section('content')
    <form action="{{ route('classrooms.update', $editClassroom->id) }}" method="POST">
        @csrf
        <br/>
        @method('PUT')
        <input type="hidden" name="id" value="{{$editClassroom->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="classroom_name" value="{{$editClassroom->classroom_name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Mentor List</label>
            <select class="form-control" name="mentor_id" id="">
                <option value="{{$editClassroom->mentor->id}}" selected=>{{$editClassroom->mentor->mentor_name}}</option>
                @foreach($mentors as $mentor)
                    <option value="{{$mentor->id}}"> {{$mentor->mentor_name}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Roof</label>
            <input type="text" name="roof" class="form-control" value="{{$editClassroom->roof}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

