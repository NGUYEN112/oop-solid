<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="{{asset('/storage/styles.css')}}">
</head>
<body class="container ">
    <ul class="route">
        <li class="{{ (request()->segment(1) == '') ? 'active-route' : '' }}"><a href="/">Home</a></li>
        <li class="{{ (request()->segment(2) == 'category') ? 'active-route' : '' }}"><a href="/manager/category">Category Manager</a></li>
        <li class="{{ (request()->segment(2) == 'product') ? 'active-route' : '' }}"><a href="/manager/product">Product Manager</a></li>
    </ul>
    @yield('manager-content')
</body>
</html>