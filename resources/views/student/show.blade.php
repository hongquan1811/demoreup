@extends('display.home')
@section('title')
    Show Student
@endsection
@section('content')
    <form action="{{ route('students.show', $show->id) }}" method="POST">
        @csrf
        <br />
        @method('PUT')
        <input type="hidden" name="id" value="{{$show->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="student_name" value="{{$show->student_name}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">School</label>
            <select class="form-control" name="school_id" id="" readonly>
                <option value="{{$school_show->id}}" selected=>
                    {{$school_show->school_name}}
                </option>
{{--                @foreach($school as $schools)--}}
{{--                    <option value="{{$schools->id}}"> {{$schools->school_name}}</option>--}}
{{--                @endforeach--}}
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">danh muc Lop hoc</label>
            <select class="form-control" name="classroom_id" id="" readonly>
                <option value="{{$classroom_show->id}}" selected=>{{$classroom_show->classroom_name}}</option>
{{--                @foreach($classroom as $classrooms)--}}
{{--                    <option value="{{$classrooms->id}}"> {{$classrooms->classroom_name}}</option>--}}
{{--                @endforeach--}}
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text"  class="form-control" name="phone" value="{{$show->phone}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <input type="text"  class="form-control" name="description" value="{{$show->description}}" readonly>
        </div>
    </form>
@endsection

