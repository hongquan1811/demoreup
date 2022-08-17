<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Http\Requests\SchoolUpdateRequest;
use App\Models\School;
use App\Services\SchoolService;
use Illuminate\Http\Request;
use Nette\Utils\Strings;
use PhpParser\Node\Scalar\String_;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public SchoolService $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        $schools= $this->schoolService->getAllSchool();
        return view('school.index',compact('schools'));
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        $this->schoolService->createSchool($request->all());
        $notification = [
            'message' => __('text_message.school.create'),
            'alert-type' => 'success',
        ];
        return redirect()->route('schools.index')->with($notification);

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
        $show = $this->schoolService->showSchool($id);
        return view('school.show', compact('show'));
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
        $edit = $this->schoolService->showSchool($id);
        return view('school.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolUpdateRequest $request, $id)
    {
        $this->schoolService->updateSchool($request->all(), $id);
        $notification = [
            'message' => __('text_message.school.update'),
            'alert-type' => 'success',
        ];

        return redirect()->route('schools.index')->with($notification);
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
        $this->schoolService->deleteSchool($id);
        $notification = [
            'message' => __('text_message.school.destroy'),
            'alert-type' => 'success',
        ];
        return redirect()->route('schools.index')->with($notification);
    }

    public function schoolSearch()
    {
        if(isset($_GET['search'])){
            $schools_search = $_GET['search'];
            $schools =  $this->schoolService->searchSchool($schools_search);
        }
        else {
            $schools= $this->schoolService->getAllSchool();
        }
        return view('school.index',compact('schools'));
    }

}
