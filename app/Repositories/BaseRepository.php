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

    public function myGet()
    {
        return  $this->model->get();
    }

    public function myFind($id)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $data;
        } else {
            flash('No item found')->error();
            return null;
        }
    }

    public function myDelete($id)
    {
        try {
            $data = $this->model->find($id);
            if ($data) {
                $data->delete();
                flash('Data deleted')->success();
                return true;
            } else {
                flash('No item found')->error();
                return null;
            }
        } catch (\Throwable $th) {
            flash('Something went wrong')->error();
            return null;
        }
    }
}