@extends('display.home')
@section('title')
    Show Student
@endsection
@section('content')
    <form action="{{ route('students.show', $showStudent->id) }}" method="POST">
        @csrf
        <br/>
        @method('PUT')
        <input type="hidden" name="id" value="{{$showStudent->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="student_name" value="{{$showStudent->student_name}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">School</label>
            <select class="form-control" name="school_id" id="" readonly>
                <option value="{{$showStudent->school->id}}" selected=>{{$showStudent->school->school_name}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Classroom</label>
            <select class="form-control" name="classroom_id" id="" readonly>
                <option value="{{$showStudent->classroom->id}}" selected=>{{$showStudent->classroom->classroom_name}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$showStudent->phone}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{$showStudent->description}}" readonly>
        </div>
    </form>
@endsection

