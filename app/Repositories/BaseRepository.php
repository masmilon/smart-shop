<?php

namespace App\Repositories;

use App\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    protected $model;

    public function _construct(Model $model)
    {
        $this->model = $model;
    }

    public function Get()
    {
        $this->model->get();
    }

    public function Find($id)
    {
    }

    public function Delete($id)
    {
    }
}