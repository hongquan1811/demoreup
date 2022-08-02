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
        $students = Student::orderBy('classroom_id', 'ASC')->search()->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::get();
        $schools = School::get();
        return view('student.add', compact('classrooms', 'schools'));
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
            'message' => __('text_message.mentor.create'),
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
        $showStudent = Student::where('id', '=', $id)->first();
        return view('student.show', compact('showStudent'));
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
        $editStudent = Student::where('id', '=', $id)->first();
        $schools = School::get();
        $classrooms = Classroom::get();
        return view('student.edit', compact('editStudent', 'schools', 'classrooms'));
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
        Student::where('id', '=', $id)->update($request->except(['_token', '_method']), $request->$id);
        $notification = [
            'message' => __('text_message.mentor.update'),
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
            'message' => __('text_message.mentor.destroy'),
            'alert-type' => 'success',
        ];
        return redirect()->route('students.index')->with($notification);
    }
}
