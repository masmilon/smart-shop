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

    public function UpdateCategory($request, $id)
    {
        try {
            $category = $this->model->find($id);

            if ($category) {

                $category->name = $request->name;
                $category->parent_category_id = $request->parent_category_id ? $request->parent_category_id : null;
                $category->save();
                flash('Successfully updated')->success();

                return true;
            } else {
                flash('No item found.')->error();
                return false;
            }
        } catch (\Throwable $th) {
            flash('Something went wrong.')->error();
            return false;
        }
    }
}