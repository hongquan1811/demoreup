<?php

namespace App\Repositories\Eloquent;

use App\Models\School;
use App\Repositories\SchoolRepositoryInterface;

class SchoolRepository extends BaseRepository implements SchoolRepositoryInterface
{
    public function __construct(School $model)
    {
        parent::__construct($model);
    }

    public function searchSchool($data)
    {
        $dataSearch = School::where('school_name','LIKE',"%$data%")
            ->orwhere('address','LIKE',"%$data%")->get();
        return $dataSearch;
    }
}
