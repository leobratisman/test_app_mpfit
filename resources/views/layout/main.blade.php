<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<section class="app">
    <header style="border-bottom: 2px solid black" class="header">
        <div>
            <h1>Test app (By Lev Romanov)</h1>
        </div>
        <div class="nav-links">
            <a class="nav-link" href="{{ route('product.index') }}">Товары</a>
            <a class="nav-link" href="{{ route('order.index') }}">Заказы</a>
        </div>
    </header>

    @yield('content')
</section>

</body>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .app {
        padding: 20px;
    }

    .nav-links {
        padding: 20px 0;
    }

    .nav-link {
        padding: 10px;
        margin-right: 10px;
        text-decoration: none;
        color: #4b5563;
    }

    .nav-link:hover {
        background-color: #4b5563;
        color: white;
    }
</style>
</html>
