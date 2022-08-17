<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository
{
    protected Model $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getAll() : Collection
    {
        return $this->model->newModelQuery()->get();
    }

    public function findById($id)
    {
        return $this->model->newModelQuery()->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->newModelQuery()->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->findById($id)->update($data);
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

}
