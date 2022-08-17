<?php

namespace App\Services;

use App\Repositories\MentorRepositoryInterface;

class MentorService
{
    private MentorRepositoryInterface $mentorRepository;

    public function __construct(MentorRepositoryInterface $mentorRepository)
    {
        $this->mentorRepository = $mentorRepository;
    }

    public function getAllMentor()
    {
        return $this->mentorRepository->getAll();
    }

    public function createMentor(array $data)
    {
        return $this->mentorRepository->create($data);
    }

    public function showMentor($id)
    {
        return $this->mentorRepository->findById($id);
    }

    public function updateMentor(array $array, $id)
    {
        return $this->mentorRepository->update($array, $id);
    }

    public function deleteMentor($id)
    {
        return  $this->mentorRepository->delete($id);
    }
    public function searchMentor($data)
    {
        return $this->mentorRepository->searchMentor($data);
    }
}
