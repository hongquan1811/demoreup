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
        $search_infor= \request()->search;
        if($search_infor!="")
        {
            $index = Classroom::where('classroom_name','LIKE',"%$search_infor%")
                ->join('mentors','classrooms.mentor_id','=','mentors.id')
                ->orwhere('mentors.mentor_name','LIKE',"%$search_infor%")
                ->orwhere('roof','LIKE',"%$search_infor")->get();
            return view('classroom.index',compact('index'));
        }
        $index = Classroom::all();
        return view('classroom.index',compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentor = Mentor::get();
        return view('classroom.add', compact('mentor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Classroom::insert([
            'classroom_name'=>$request->classroom_name,
            'mentor_id'=>$request->mentor_id,
            'roof'=>$request->roof,
        ]);
        $notification = [
            'message'    => 'Add Classroom Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('classrooms.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show= Classroom::where('id',$id)->first();
        $mentor=Mentor::get();
        $mentor_show=$show->mentor;
        return view('classroom.show',compact('show','mentor','mentor_show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Classroom::where('id','=',$id)->first();
        $mentor=Mentor::get();
        $mentor_show=$edit->mentor;
        return view('classroom.edit',compact('edit','mentor','mentor_show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Classroom::where('id','=',$id)->update($request->except(['_token', '_method']),$request->$id);
        $notification = [
            'message'    => 'Update Classroom Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('classrooms.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classroom::find($id)->students()->delete();
        Classroom::destroy($id);
        $notification = [
            'message'    => 'Delete Classroom Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('classrooms.index')->with($notification);
    }
}
