@extends('display.home')
@section('title')
    Edit Classroom
@endsection
@section('content')
    <form action="{{ route('classrooms.update', $edit->id) }}" method="POST">
        @csrf
        <br/>
        @method('PUT')
        <input type="hidden" name="id" value="{{$edit->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="classroom_name" value="{{$edit->classroom_name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Danh mục giáo viên</label>
            <select class="form-control" name="mentor_id" id="">
                <option value="{{$mentor_show->id}}" selected=>{{$mentor_show->mentor_name}}</option>
                @foreach($mentor as $mentors)
                    <option value="{{$mentors->id}}"> {{$mentors->mentor_name}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Roof</label>
            <input type="text" name="roof" class="form-control" value="{{$edit->roof}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

