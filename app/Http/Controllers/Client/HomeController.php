<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\ProductsRepository;

class HomeController extends Controller
{
    //
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductsRepository $productsRepository,
    CategoriesRepository $categoriesRepository
    )
    {
        $this->productRepository = $productsRepository;
        $this->categoryRepository = $categoriesRepository;
    }

    public function homePage(){
        $categories = $this->categoryRepository->getAll();
        return view('index',compact('categories'));
    }

    public function getProduct($id) {
        $products = $this->productRepository->getProduct($id);
        return json_encode(array('data' => $products));
    }
}
