<?php

namespace App\Repositories;

use App\Interfaces\ICategoryRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{

    public function __construct(Category $model)
    {
        parent::_construct($model);
    }

    public function GetMainCategory()
    {
        return $this->model->where("parent_category_id", null)->get();
    }

    public function CreateCategory($request)
    {
        try {
            $category = $this->model;
            $category->name = $request->name;
            $category->parent_category_id = $request->parent_category_id ? $request->parent_category_id : null;
            $category->save();
            flash('Successfully Saved')->success();

            return true;
        } catch (\Throwable $th) {
            flash('Something went wrong.')->error();
            return false;
        }
    }
}