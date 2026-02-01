<!DOCTYPE html>
<html>
<head>
    <title>Admin - Ecommerce MVP</title>
</head>
<body>

<header>
    <strong>ADMIN PANEL</strong> |
    <a href="{{ route('admin.orders.index') }}">Orders</a> |
    <a href="{{ route('admin.products.index') }}">Products</a>
</header>

<hr>

@yield('content')

</body>
</html>
