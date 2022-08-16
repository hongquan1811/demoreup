<?php

namespace App\Services;

use App\Repositories\ClassroomRepositoryInterface;
use App\Repositories\Eloquent\ClassroomRepository;
use Illuminate\Support\Facades\Validator;

class ClassroomService
{
    private  ClassroomRepositoryInterface $classroomRepositoryInterface;

    public function __construct(ClassroomRepositoryInterface $classroomRepositoryInterface)
    {
        $this->classroomRepositoryInterface = $classroomRepositoryInterface;
    }

    public function getAllClassroom()
    {
        return $this->classroomRepositoryInterface->getAll();
    }

    public function createClassroom(array $data)
    {
        return $this->classroomRepositoryInterface->create($data);
    }

    public function showClassroom($id)
    {
        return $this->classroomRepositoryInterface->findById($id);
    }

    public function updateClassroom(array $data, $id)
    {
        return $this->classroomRepositoryInterface->update($data, $id);
    }

    public function deleteClassroom($id)
    {
        return $this->classroomRepositoryInterface->delete($id);
    }
    public function searchClassroom($data)
    {
        return $this->classroomRepositoryInterface->searchClassroom($data);
    }
}
