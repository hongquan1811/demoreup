<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Mentor;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $search_infor = \request()->search;
        if ($search_infor != "") {
            $index = Student::where('student_name', 'LIKE', "%$search_infor%")
                ->join('classrooms', 'students.classroom_id', '=', 'classrooms.id')
                ->orwhere('classrooms.classroom_name', 'LIKE', "%$search_infor%")
                ->join('schools', 'students.school_id', '=', 'schools.id')
                ->orwhere('schools.school_name', 'LIKE', "%$search_infor%")
                ->orwhere('phone', 'LIKE', "%$search_infor%")
                ->orwhere('description', 'LIKE', "%$search_infor%")->get();
            return view('student.index', compact('index'));
        }
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classroom = Classroom::get();
        $school = School::get();
        return view('student.add', compact('classroom', 'school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create($request->all());

        $notification = [
            'message' => 'Add Student Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('students.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Student::where('id', '=', $id)->first();
        $school = School::get();
        $classroom = Classroom::get();
        $classroom_show = $show->classroom;
        $school_show = $show->school;
        return view('student.show',
            compact('show', 'school', 'classroom', 'classroom_show',
                'school_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Student::where('id', '=', $id)->first();
        $school = School::get();
        $classroom = Classroom::get();
        $classroom_show = $edit->classroom;
        $school_show = $edit->school;
        return view('student.edit',
            compact('edit', 'school', 'classroom', 'classroom_show',
                'school_show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Student::where('id', '=', $id)->update($request->except([
            '_token',
            '_method'
        ]), $request->$id);
        $notification = [
            'message' => 'Update Student Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('students.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        $notification = [
            'message' => 'Delete Student Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('students.index')->with($notification);
    }
}
