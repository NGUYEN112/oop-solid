@extends('layout')
@section('manager-content')

<h2>Update Product</h2>


<form method="post">
    @csrf
    <div class="input-form">
        <label for="input-form">Product Name :</label>
        <input id="input-form" name="product_name" value="{{$product->product_name}}" type="text">
    </div>
    <div class="input-form">
        <label for="input-form">Product Value :</label>
        <input id="input-form" name="product_value" value="{{$product->product_value}}" type="number">
    </div>

    <div class="input-form">
        <label for="input-form">Belong to :</label>
        <select name="category_id" id="input-form">
            @foreach($categories as $category) 
                <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ""}}>{{$category->category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="func ">
        <a href="/manager/product">Back</a>
        <button type="submit">Submit</button>
    </div>
    
</form>
@endsection