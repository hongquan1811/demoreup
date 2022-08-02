@extends('display.home')
@section('title')
    Edit Student
@endsection
@section('content')
    <form action="{{ route('students.update', $editStudent->id) }}" method="POST">
        @csrf
        <br/>
        @method('PUT')
        <input type="hidden" name="id" value="{{$editStudent->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="student_name" value="{{$editStudent->student_name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">School</label>
            <select class="form-control" name="school_id" id="">
                <option value="{{$editStudent->school->id}}" selected=>
                    {{$editStudent->school->school_name}}
                </option>
                @foreach($schools as $school)
                    <option value="{{$school->id}}"> {{$school->school_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Classroom</label>
            <select class="form-control" name="classroom_id" id="">
                <option value="{{$editStudent->classroom->id}}" selected=>{{$editStudent->classroom->classroom_name}}</option>
                @foreach($classrooms as $classroom)
                    <option value="{{$classroom->id}}"> {{$classroom->classroom_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$editStudent->phone}}">
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <input type="text" class="form-control" name="description" value="{{$editStudent->description}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
