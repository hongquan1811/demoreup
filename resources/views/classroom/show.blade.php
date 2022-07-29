
@extends('display.home')
@section('title')
    List Classes
@endsection
@section('content')
    <form action="{{ route('classrooms.show', $show->id) }}" method="POST">
        @csrf
        <br />
        @method('PUT')
        <input type="hidden" name="id" value="{{$show->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="classroom_name" value="{{$show->classroom_name}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Danh mục giáo viên</label>
            <select class="form-control" name="mentor_id" id="" readonly>
                <option value="{{$mentor_show->id}}" selected=>{{$mentor_show->mentor_name}}</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Roof</label>
            <input type="text" name="roof"  class="form-control" value="{{$show->roof}}" readonly>
        </div>
        {{--        <button type="submit" class="btn btn-primary">Submit</button>--}}
    </form>
@endsection
