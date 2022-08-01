<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
class MentorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_infor = \request()->search;
        if($search_infor !="")
        {
            $index = Mentor::where('mentor_name','LIKE',"%$search_infor%")->orWhere('subject','LIKE',"%$search_infor%")->get();
            return view('mentor.index', compact('index'));
        }
        $mentors = Mentor::all();
        return view('mentor.index', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mentor.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mentor::create($request->all());

        $notification = [
            'message'    => 'Add Mentor Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('mentors.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show= Mentor::where('id','=',$id)->first();
        return view('mentor.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit= Mentor::where('id','=',$id)->first();
        return view('mentor.edit',compact('edit'));
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
        Mentor::where('id','=',$id)->update($request->except(['_token', '_method']),$request->$id);
        $notification = [
            'message'    => 'Update Mentor Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('mentors.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mentor::destroy($id);
        $notification = [
            'message'    => 'Delete Mentor Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('mentors.index')->with($notification);
    }
}
