<?php

namespace App\Services;

use App\Repositories\ClassroomRepositoryInterface;
use App\Repositories\Eloquent\ClassroomRepository;
use Illuminate\Support\Facades\Validator;

class ClassroomService
{
    private  ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    public function getAllClassroom()
    {
        return $this->classroomRepository->getAll();
    }

    public function createClassroom(array $data)
    {
        return $this->classroomRepository->create($data);
    }

    public function showClassroom($id)
    {
        return $this->classroomRepository->findById($id);
    }

    public function updateClassroom(array $data, $id)
    {
        return $this->classroomRepository->update($data, $id);
    }

    public function deleteClassroom($id)
    {
        return $this->classroomRepository->delete($id);
    }
    public function searchClassroom($data)
    {
        return $this->classroomRepository->searchClassroom($data);
    }
}
