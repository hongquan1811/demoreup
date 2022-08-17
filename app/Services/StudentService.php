<?php

namespace App\Services;

use App\Repositories\StudentRepositoyInterface;

class StudentService
{
    private StudentRepositoyInterface $studentRepository;

    public function __construct(StudentRepositoyInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAllStudent()
    {
        return $this->studentRepository->getAll();
    }

    public function createStudent(array $array)
    {
        return $this->studentRepository->create($array);
    }

    public function showStudent($id)
    {
        return $this->studentRepository->findById($id);
    }

    public function updateStudent(array $array, $id)
    {
        return $this->studentRepository->update($array, $id);
    }

    public function deleteStudent($id)
    {
        return $this->studentRepository->delete($id);
    }

    public function searchStudent($data)
    {
        return $this->studentRepository->searchStudent($data);
    }
}
