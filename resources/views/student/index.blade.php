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
            <th scope="col">School</th>
            <th scope="col">Classroom</th>
            <th scope="col">Mentor</th>
            <th scope="col">Phone</th>
            <th scope="col">Description</th>
            <th scope="col">Option</th>
        </tr>
        </thead>
        <tbody>
        <div>
            <a href="{{route('students.create')}}">
                <button type="button" class="btn btn-primary">Add</button>
            </a>
        </div>

        <div class="input-group mb-3">
            <form action="{{ route('students.index') }}" method="get" style="display: inline-block">
                <input type="search" class="form-control" name="search" style="margin-left: 1100px"
                       placeholder="Search here">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" style="margin-left: 10px;">Search
                </button>
            </form>
        </div>

        @php
            $i=1;
        @endphp
        @foreach($students as $student)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$student->student_name}}</td>
                <td>{{$student->school->school_name}}</td>
                <td>{{$student->classroom->classroom_name}}</td>
                <td>{{$student->classroom->mentor->mentor_name}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->description}}</td>
                <td>
                    <form action="{{route('students.show', $student->id)}}" method="get" style="display: inline-block">
                        <button type="submit" class="btn btn-primary">View</button>
                    </form>
                    <form action="{{route('students.edit', $student->id)}}" method="get" style="display: inline-block">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form action="{{route('students.destroy', $student->id)}}" method="post" onclick="myFunction()"
                          style="display: inline-block">
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



