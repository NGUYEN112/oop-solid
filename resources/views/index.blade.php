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

<body class="container">
    <h2>Welcome</h2>
    <ul class="route">
        <li class="{{ (request()->segment(1) == '') ? 'active-route' : '' }}"><a href="'/">Home</a></li>
        <li><a href="/manager/category">Category Manager</a></li>
        <li><a href="/manager/product">Product Manager</a></li>
    </ul>
    <div class="categories">
        <ul class="categories-list">
            @foreach($categories as $key => $category)
            <li id="{{$category->id}}" class="tab-link {{$key == 0 ? 'active' : ''}}">{{$category->category_name}}</li>
            @endforeach
        </ul>
    </div>
    <div class="product-list">
        <div class="product-header">
            <h4>Name</h4>
            <p>Value</p>
        </div>
        <div class="product-contain">
            <div class="product">
                <h4><a href="">Guitar</a></h4>
                <p>$50</p>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var category_id = parseInt($('.active').attr('id'))
            $.ajax({
                url: 'get-product/' + category_id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    var product = data['data']
                    var productList = ''
                    $.each(product, function(index, row) {
                        productList += '<div class="product"> <h4><a href="">' + row.product_name + '</a></h4><p>$' + row.product_value + '</p>'
                    })
                    $('.product-contain').html(productList)
                }
            })
        })

        $('.tab-link').click(function() {
            var category_id = parseInt($(this).attr('id'))

            if (!$(this).hasClass("active")) {
                $('.tab-link').removeClass('active');
                $(this).addClass("active");
                $('.tab-link').each(function() {
                    $.ajax({
                        url: 'get-product/' + category_id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            var product = data['data']
                            var productList = ''
                            $.each(product, function(index, row) {
                                productList += '<div class="product"> <h4><a href="'+row.id+'">' + row.product_name + '</a></h4><p>$' + row.product_value + '</p>'
                            })
                            $('.product-contain').html(productList)
                        }
                    })
                })


            }
        })
    </script>
</body>

</html>