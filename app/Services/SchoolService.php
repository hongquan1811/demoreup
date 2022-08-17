<?php

namespace App\Services;

use App\Repositories\Eloquent\SchoolRepository;
use App\Repositories\SchoolRepositoryInterface;

class SchoolService
{
    private SchoolRepositoryInterface $schoolRepository;

    public function __construct(SchoolRepositoryInterface $schoolRepository) {
        $this->schoolRepository = $schoolRepository;
    }

    public function getAllSchool()
    {
        return $this->schoolRepository->getAll();
    }

    public function createSchool(array $data)
    {
        return $this->schoolRepository->create($data);
    }

    public function showSchool($id)
    {
        return $this->schoolRepository->findById($id);
    }

    public function updateSchool(array $array, $id)
    {
        return $this->schoolRepository->update($array, $id);
    }

    public function deleteSchool($id)
    {
        return $this->schoolRepository->delete($id);
    }

    public function searchSchool($data)
    {
        return $this->schoolRepository->searchSchool($data);
    }
}
