<?php 

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ProductsRepository;
use App\Models\Product;

class ProductsEloquentRepository implements ProductsRepository {
    public function getAll()
    {
        return Product::all();
    }
    public function getProduct($id)
    {
        return Product::where('category_id',$id)->get();
    }
    
    public function get($id)
    {
        return Product::findOrFail($id);
    }

    public function create($attributes)
    {
        return Product::create($attributes);
    }

    public function update($id, $attributes)
    {
        $product = $this->get($id);
        $product->product_name = $attributes['product_name'];
        $product->product_value = $attributes['product_value'];
        $product->category_id = $attributes['category_id'];
        return $product->save();

    }

    public function delete($id)
    {
        $product = $this->get($id);
        $product->destroy($id);
    }
}