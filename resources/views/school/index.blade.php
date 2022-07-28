@extends('display.home')
@section('title')
    List School
@endsection
@section('content')
    <table class="table" id="table_id">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Option</th>
        </tr>
        </thead>
        <tbody>
        <div>
            <a href="{{route('schools.create')}}">
                <button type="button" class="btn btn-primary">Thêm mới</button>
            </a>
        </div>
        @php
            $i=1;
        @endphp
        @foreach($index as $school)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$school->school_name}}</td>
                <td>{{$school->address}}</td>
                <td>
                    <form action="{{route('schools.show', $school->id)}}" method="get" style="display: inline-block">
                        <button type="submit" class="btn btn-primary">View</button>
                    </form>
                    <form action="{{route('schools.edit', $school->id)}}" method="get" style="display: inline-block">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form action="{{route('schools.destroy', $school->id)}}" method="post" onclick="myFunction()" style="display: inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        function myFunction() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>

@endsection


