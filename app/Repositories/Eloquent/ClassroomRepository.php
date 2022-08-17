<?php

namespace App\Repositories\Eloquent;

use App\Models\Classroom;
use App\Repositories\ClassroomRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ClassroomRepository extends BaseRepository implements ClassroomRepositoryInterface
{
    public function __construct(Classroom $model)
    {
        parent::__construct($model);
    }

    public function searchClassroom($data)
    {
        return $this->model->newModelQuery()->where('classroom_name', 'LIKE', "%$data%")
            ->join('mentors', 'classrooms.mentor_id', '=', 'mentors.id')
            ->orwhere('mentors.mentor_name', 'LIKE', "%$data%")
            ->orwhere('roof', 'LIKE', "%$data%")->get();
    }
}
