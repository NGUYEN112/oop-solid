@extends('layout')
@section('manager-content')
<h2>Category Manager</h2>
<div class="create"><a href="category/create" title="Thêm mới" style="position: absolute;right: 35px;top: 22px;"><i class="fas fa-plus-square text-success" style="font-size: 24px"></i></a>
</div>
<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Function</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $key => $category)
        <tr>
            <th>{{$key+1}}</th>
            <td>
                {{$category->category_name}}
            </td>
            <td>
                <a href="category/update/{{$category->id}}"><i class="fas fa-edit text-success"></i></a>
                <a href=""><i class="fas fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection