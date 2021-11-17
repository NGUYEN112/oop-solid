@extends('layout')
@section('manager-content')
<h2>Product Manager</h2>
<div class="create"><a href="product/create" title="Thêm mới" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
</div>
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Value</th>
            <th>Belong to</th>
            <th>Function</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key => $product)
        <tr>
            <th>{{$key+1}}</th>
            <td>
                {{$product->product_name}}
            </td>
            <td>
                {{$product->product_value}}
            </td>
            <td>
                {{$product->category->category_name}}
            </td>
            <td>
                <a href="product/update/{{$product->id}}"><i class="fas fa-edit text-success"></i></a>
                <a href=""><i class="fas fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection