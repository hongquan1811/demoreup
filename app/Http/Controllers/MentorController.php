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
        $mentors = Mentor::orderBy('id', 'ASC')->search()->get();
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mentor::create($request->all());

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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showMentor= Mentor::where('id', '=', $id)->first();
        return view('mentor.show', compact('showMentor'));
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
        $editMentor = Mentor::where('id', '=', $id)->first();
        return view('mentor.edit', compact('editMentor'));
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
        Mentor::where('id', '=', $id)->update($request->except([
            '_token',
            '_method'
        ]), $request->$id);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mentor::destroy($id);
        $notification = [
            'message' => __('text_message.mentor.destroy'),
            'alert-type' => 'success',
        ];
        return redirect()->route('mentors.index')->with($notification);
    }
}
