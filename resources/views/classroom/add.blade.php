@extends('display.home')
@section('title')
    Add Classroom
@endsection
@section('content')
    <form action="{{ route('classrooms.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="classroom_name">
        </div>
        <div class="form-group">
            <label>Giáo Viên</label>
            <select class="form-control" name="mentor_id" id="">
                <option value="0">Danh muc giao vien</option>
                @foreach($mentors as $mentor)
                    <option value="{{$mentor->id}}"> {{$mentor->mentor_name}} </option>
                @endforeach
            </select>
        </div>

        <label class="form-label">Roof</label>
        <input type="text" name="roof" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
