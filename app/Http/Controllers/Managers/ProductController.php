<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoriesRepository;
use App\Repositories\Contracts\ProductsRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductsRepository $productsRepository,
    CategoriesRepository $categoriesRepository
    )
    {
        $this->productRepository = $productsRepository;
        $this->categoryRepository = $categoriesRepository;
    }

    public function productsPage(){
        $products = $this->productRepository->getAll();
        return view('managers.products.list',compact('products'));
    }

    public function createProductPage(){
        $categories = $this->categoryRepository->getAll();
        return view('managers.products.create',compact('categories'));
    }

    public function storeProduct(Request $request) {
        $this->validate($request,[
            'product_name' => 'required',
            'product_value' => 'required|numeric|min:1'
        ]);

        $attributes = [
            'product_name' => $request->product_name,
            'product_value' => $request->product_value,
            'category_id'   => $request->category_id
        ];

        $this->productRepository->create($attributes);
        return redirect('/manager/product');
    }

    public function editProductPage($id) {
        $categories = $this->categoryRepository->getAll();
        $product = $this->productRepository->get($id);
        return view('managers.products.edit',compact('product','categories'));
    }

    public function updateProduct($id,Request $request){
        $this->validate($request,[
            'product_name' => 'required',
            'product_value' => 'required|numeric|min:1'
        ]);

        $attributes = [
            'product_name' => $request->product_name,
            'product_value' => $request->product_value,
            'category_id'   => $request->category_id
        ];

        $this->productRepository->update($id,$attributes);
        return redirect('/manager/product');
    }
}
