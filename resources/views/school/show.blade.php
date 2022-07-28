
@extends('display.home')
@section('title')
    List School
@endsection
@section('content')
    <form action="{{ route('schools.show', $show->id) }}" method="POST">
        @csrf
        <br />
        @method('PUT')
        <input type="hidden" name="id" value="{{$show->id}}">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="school_name" value="{{$show->school_name}}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address" value="{{$show->address}}" readonly>
        </div>
        {{--        <button type="submit" class="btn btn-primary">Submit</button>--}}
    </form>
@endsection
