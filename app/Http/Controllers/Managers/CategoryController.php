<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoriesRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoryRepository = $categoriesRepository;
    }

    //List Page
    public function categoriesPage(){
         $categories = $this->categoryRepository->getAll();
        return view('managers.categories.list',compact('categories'));
    }


    //Create
    public function createCategoryPage(){
        return view('managers.categories.create');
    }

    public function storeCategory(Request $request){
        $this->validate($request,[
            'category_name' => 'required'
        ]);

        $attributes = [
            'category_name' => $request->category_name
        ];

        $this->categoryRepository->create($attributes);
        return redirect();
    }


    //Update
    public function editCategoryPage($id) {
        $category = $this->categoryRepository->get($id);
        return view('managers.categories.edit',compact('category'));
    }

    public function updateCategory($id, Request $request){
        $this->validate($request,[
            'category_name' => 'required'
        ]);

        $attributes = [
            'category_name' => $request->category_name
        ];

        $this->categoryRepository->update($id,$attributes);
        return redirect();
    }
}
