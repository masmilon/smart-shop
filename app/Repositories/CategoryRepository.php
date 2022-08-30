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

    public function DemonFunction()
    {
    }
}