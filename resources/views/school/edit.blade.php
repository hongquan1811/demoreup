@extends('display.home')
@section('title')
    Edit School
@endsection
@section('content')
    <form action="{{ route('schools.update', $edit->id) }}" method="POST">
        @csrf
        <br />
        @method('PUT')
        <input type="hidden" name="id" value="{{$edit->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="school_name" value="{{$edit->school_name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text"  class="form-control" name="address" value="{{$edit->address}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
