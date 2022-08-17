<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Http\Requests\MentorRequest;
use App\Services\MentorService;
use Illuminate\Http\Request;
use App\Models\Mentor;
use Illuminate\Http\Response;

class MentorController extends Controller
{
    public MentorService $mentorService;

    public function __construct(MentorService $mentorService)
    {
        $this->mentorService = $mentorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mentors= $this->mentorService->getAllMentor();
        return view('mentor.index',compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('mentor.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function store(MentorRequest $request)
    {
        $this->mentorService->createMentor($request->all());

        $notification = [
            'message' => __('text_message.mentor.create'),
            'alert-type' => 'success',
        ];
        return redirect()->route('mentors.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $showMentor = $this->mentorService->showMentor($id);
        return view('mentor.show', compact('showMentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $editMentor = $this->mentorService->showMentor($id);
        return view('mentor.edit', compact('editMentor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return Response
     */
    public function update(MentorRequest $request, $id)
    {
        $this->mentorService->updateMentor($request->all(), $id);
        $notification = [
            'message' => __('text_message.mentor.update'),
            'alert-type' => 'success',
        ];

        return redirect()->route('mentors.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->mentorService->deleteMentor($id);
        $notification = [
            'message' => __('text_message.mentor.destroy'),
            'alert-type' => 'success',
        ];
        return redirect()->route('mentors.index')->with($notification);
    }

    public function mentorSearch()
    {
        if(isset($_GET['search'])){
            $mentors_search = $_GET['search'];
            $mentors =  $this->mentorService->searchMentor($mentors_search);
        }
        else {
            $mentors= $this->index();
        }
        return view('mentor.index',compact('mentors'));
    }
}
