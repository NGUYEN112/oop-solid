@extends('layout')
@section('manager-content')
<h2>Create Category</h2>


<form method="post">
    @csrf
    <div class="input-form">
        <label for="input-form">Category Name :</label>
        <input id="input-form" name="category_name"  type="text">
    </div>
    
    <div class="func ">
        <a href="/manager/category">Back</a>
        <button type="submit">Submit</button>
    </div>
    
</form>
@endsection