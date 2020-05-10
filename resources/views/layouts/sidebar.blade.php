<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css"/>
</head>
<body>

    @include('inc.header')

    <div class="container">
        <div class="row">
            <div class="col-3">@include('inc.aside')</div>
            <div class="col-9">@yield('content')</div>
        </div>
        @include('inc.footer')
    </div>
</body>
</html>
