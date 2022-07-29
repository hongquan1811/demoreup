<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_infor = \request()->search;
        if($search_infor!="")
        {
            $index = School::where('school_name','LIKE',"%$search_infor%")->orwhere('address','LIKE',"%$search_infor%")->get();
            return view('school.index',compact('index'));
        }
        $index = School::all();
        return view('school.index',compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        School::create($request->all());
        $notification = [
            'message'    => 'Add School Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('schools.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show= School::where('id','=',$id)->first();
        return view('school.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=School::where('id','=',$id)->first();
        return view('school.edit',compact('edit'));
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
        School::where('id','=',$id)->update($request->except(['_token', '_method']),$request->$id);
        $notification = [
            'message'    => 'Update School Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('schools.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        School::destroy($id);
        $notification = [
            'message'    => 'Delete School Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('schools.index')->with($notification);
    }
}
