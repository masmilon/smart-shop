<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function parent_category() // CategoryItem -> parent category id
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function child_categories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}