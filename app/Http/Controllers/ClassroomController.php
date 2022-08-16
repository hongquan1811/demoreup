<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Mentor;
use App\Services\ClassroomService;
use App\Services\MentorService;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public ClassroomService $classroomService;
    public MentorService $mentorService;

    public function __construct(
        ClassroomService $classroomService,
        MentorService $mentorService
    ) {
        $this->classroomService = $classroomService;
        $this->mentorService = $mentorService;
    }

    public function index()
    {
        if(isset($_GET['search'])){
            $classrooms_search = $_GET['search'];
            $classrooms = $this->classroomService->searchClassroom($classrooms_search);
        }
        else{
            $classrooms= $this->classroomService->getAllClassroom();
        }
        return view('classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentors = $this->mentorService->getAllMentor();
        return view('classroom.add', compact('mentors'));
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
        $this->classroomService->createClassroom($request->all());
        $notification = [
            'message' => __('text_message.classroom.create'),
            'alert-type' => 'success',
        ];
        return redirect()->route('classrooms.index')->with($notification);
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
        $showClassroom = $this->classroomService->showClassroom($id);
        return view('classroom.show', compact('showClassroom'));
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
        $editClassroom = $this->classroomService->showClassroom($id);
        $mentors = $this->mentorService->getAllMentor();
        return view('classroom.edit', compact('editClassroom', 'mentors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request, $id)
    {
        $this->classroomService->updateClassroom($request->all(), $id);
        $notification = [
            'message' => __('text_message.classroom.update'),
            'alert-type' => 'success',
        ];

        return redirect()->route('classrooms.index')->with($notification);
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
        $this->classroomService->deleteClassroom($id);
        $notification = [
            'message' => __('text_message.classroom.destroy'),
            'alert-type' => 'success',
        ];
        return redirect()->route('classrooms.index')->with($notification);
    }
}
