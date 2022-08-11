<?php

namespace App\Repositories\Eloquent;

use App\Models\Mentor;
use App\Repositories\MentorRepositoryInterface;

class MentorRepository extends BaseRepository implements MentorRepositoryInterface
{
    public function __construct(Mentor $model)
    {
        parent::__construct($model);
    }

    public function searchMentor($data)
    {
        $dataSearch = Mentor::where('mentor_name','LIKE',"%$data$")
            ->orwhere('subject','LIKE',"%$data%")->get();
        return $dataSearch;
    }
}