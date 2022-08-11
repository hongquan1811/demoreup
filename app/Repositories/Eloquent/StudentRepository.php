<?php

namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Repositories\StudentRepositoyInterface;

class StudentRepository extends BaseRepository implements StudentRepositoyInterface
{
    public function __construct(Student $model)
    {
        parent::__construct($model);
    }

    public function searchStudent($data)
    {
        $dataSearch = Student::where('student_name', 'LIKE', "%$data%")
            ->join('schools', 'students.school_id', '=', 'schools.id')
            ->orwhere('schools.school_name', 'LIKE', "%$data%")
            ->join('classrooms', 'students.classroom_id', '=', 'classrooms.id')
            ->orwhere('classrooms.classroom_name', 'LIKE', "%$data%")
            ->orwhere('phone', 'LIKE', "%$data%")
            ->orwhere('description', 'LIKE', "%$data%")->get();

        return $dataSearch;
    }
}
