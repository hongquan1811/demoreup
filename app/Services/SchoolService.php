<?php

namespace App\Services;

use App\Repositories\Eloquent\SchoolRepository;
use App\Repositories\SchoolRepositoryInterface;

class SchoolService
{
    private SchoolRepositoryInterface $schoolRepositoryInterface;

    public function __construct(
        SchoolRepositoryInterface $schoolRepositoryInterface
    ) {
        $this->schoolRepositoryInterface = $schoolRepositoryInterface;
    }

    public function getAllSchool()
    {
        return $this->schoolRepositoryInterface->getAll();
    }

    public function createSchool(array $data)
    {
        return $this->schoolRepositoryInterface->create($data);
    }

    public function showSchool($id)
    {
        return $this->schoolRepositoryInterface->findById($id);
    }

    public function updateSchool(array $array, $id)
    {
        return $this->schoolRepositoryInterface->update($array, $id);
    }

    public function deleteSchool($id)
    {
        return $this->schoolRepositoryInterface->delete($id);
    }

    public function searchSchool($data)
    {
        return $this->schoolRepositoryInterface->searchSchool($data);
    }
}
