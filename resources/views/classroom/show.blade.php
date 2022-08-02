@extends('display.home')
@section('title')
    List Classes
@endsection
@section('content')
    <form action="{{ route('classrooms.show', $showClassroom->id) }}" method="POST">
        @csrf
        <br/>
        @method('PUT')
        <input type="hidden" name="id" value="{{$showClassroom->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="classroom_name" value="{{$showClassroom->classroom_name}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Mentor List</label>
            <select class="form-control" name="mentor_id" id="" readonly>
                <option value="{{$showClassroom->mentor->id}}" selected=>{{$showClassroom->mentor->mentor_name}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Roof</label>
            <input type="text" name="roof" class="form-control" value="{{$showClassroom->roof}}" readonly>
        </div>
    </form>
@endsection
