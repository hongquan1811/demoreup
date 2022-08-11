<?php

namespace App\Services;

use App\Repositories\StudentRepositoyInterface;

class StudentService
{
    private StudentRepositoyInterface $studentRepositoyInterface;

    public function __construct(StudentRepositoyInterface $studentRepositoyInterface)
    {
        $this->studentRepositoyInterface = $studentRepositoyInterface;
    }

    public function getAllStudent()
    {
        $dataSearch = \request()->search;
        if($dataSearch != ""){
            return $this->studentRepositoyInterface->searchStudent($dataSearch);
        }
        return $this->studentRepositoyInterface->getAll();
    }

    public function createStudent(array $array)
    {
        return $this->studentRepositoyInterface->create($array);
    }

    public function showStudent($id)
    {
        return $this->studentRepositoyInterface->findById($id);
    }

    public function updateStudent(array $array, $id)
    {
        return $this->studentRepositoyInterface->update($array, $id);
    }

    public function deleteStudent($id)
    {
        return $this->studentRepositoyInterface->delete($id);
    }
}