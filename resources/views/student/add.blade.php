@extends('display.home')
@section('content')
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="student_name">
        </div>
        <div class="form-group">
            <label>Classroom</label>
            <select class="form-control" name="classroom_id" id="">
                <option value="0">Classroom List</option>
                @foreach($classrooms as $classroom)
                    <option value="{{$classroom->id}}"> {{$classroom->classroom_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>School</label>
            <select class="form-control" name="school_id" id="">
                <option value="0">School List</option>
                @foreach($schools as $school)
                    <option value="{{$school->id}}"> {{$school->school_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control"></input>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
