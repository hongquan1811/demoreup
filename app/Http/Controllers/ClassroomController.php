<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Mentor;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $classrooms = Classroom::orderBy('id', 'ASC')->search()->get();
        return view('classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentors = Mentor::get();
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
        Classroom::create($request->all());
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
        $showClassroom = Classroom::where('id', $id)->first();
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
        $editClassroom = Classroom::where('id', '=', $id)->first();
        $mentors = Mentor::get();
        return view('classroom.edit', compact('editClassroom','mentors'));
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
        Classroom::where('id', '=', $id)->update($request->except(['_token', '_method']), $request->$id);
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
        Classroom::find($id)->students()->delete();
        Classroom::destroy($id);
        $notification = [
            'message' => __('text_message.classroom.destroy'),
            'alert-type' => 'success',
        ];
        return redirect()->route('classrooms.index')->with($notification);
    }
}
