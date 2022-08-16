<?php

namespace App\Services;

use App\Repositories\MentorRepositoryInterface;

class MentorService
{
    private MentorRepositoryInterface $mentorRepositoryInterface;

    public function __construct(MentorRepositoryInterface $mentorRepositoryInterface)
    {
        $this->mentorRepositoryInterface = $mentorRepositoryInterface;
    }

    public function getAllMentor()
    {
        return $this->mentorRepositoryInterface->getAll();
    }

    public function createMentor(array $data)
    {
        return $this->mentorRepositoryInterface->create($data);
    }

    public function showMentor($id)
    {
        return $this->mentorRepositoryInterface->findById($id);
    }

    public function updateMentor(array $array, $id)
    {
        return $this->mentorRepositoryInterface->update($array, $id);
    }

    public function deleteMentor($id)
    {
        return  $this->mentorRepositoryInterface->delete($id);
    }
    public function searchMentor($data)
    {
        return $this->mentorRepositoryInterface->searchMentor($data);
    }
}
