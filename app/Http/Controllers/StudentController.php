<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Classroom;
use App\Models\Mentor;
use App\Models\School;
use App\Models\Student;
use App\Services\ClassroomService;
use App\Services\MentorService;
use App\Services\SchoolService;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected SchoolService $schoolService;
    protected ClassroomService $classroomService;
    protected MentorService $mentorService;
    protected StudentService $studentService;

    public function __construct(
        SchoolService $schoolService,
        ClassroomService $classroomService,
        MentorService $mentorService,
        StudentService $studentService
    ) {
        $this->schoolService = $schoolService;
        $this->classroomService = $classroomService;
        $this->mentorService = $mentorService;
        $this->studentService = $studentService;
    }

    public function index()
    {
        if(isset($_GET['search'])){
            $students_search = $_GET['search'];
            $students =  $this->studentService->searchStudent($students_search);
        }
        else {
            $students = $this->studentService->getAllStudent();
        }
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = $this->classroomService->getAllClassroom();
        $schools = $this->schoolService->getAllSchool();
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
        $this->studentService->createStudent($request->all());

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
        $showStudent = $this->studentService->showStudent($id);
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
        $editStudent = $this->studentService->showStudent($id);
        $schools = $this->schoolService->getAllSchool();
        $classrooms = $this->classroomService->getAllClassroom();
        return view('student.edit',
            compact('editStudent', 'schools', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $this->studentService->updateStudent($request->all(), $id);
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
        $this->studentService->deleteStudent($id);
        $notification = [
            'message' => __('text_message.mentor.destroy'),
            'alert-type' => 'success',
        ];
        return redirect()->route('students.index')->with($notification);
    }
}
