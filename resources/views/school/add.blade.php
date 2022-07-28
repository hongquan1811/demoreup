@extends('display.home')
@section('content')
    <form action="{{ route('schools.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="school_name">
        </div>
            <label  class="form-label">Address</label>
            <input type="text" name="address"  class="form-control"></input>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
