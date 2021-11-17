<?php 

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoriesRepository;
use App\Models\Category;

class CategoriesEloquentRepository implements CategoriesRepository {
    public function getAll()
    {
        return Category::all();
    }
    
    public function get($id)
    {
        return Category::findOrFail($id);
    }

    public function create($attributes)
    {
        return Category::create($attributes);
    }

    public function update($id, $attributes)
    {
        $category = $this->get($id);
        $category->category_name = $attributes['category_name'];


        return $category->save();

    }

    public function delete($id)
    {
        $category = $this->get($id);
        $category->destroy($id);
    }
}