<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to MMUCU CHURCH</title>
    <link rel="stylesheet"     href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script      src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script    src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">    </script>
    {!!  HTML::style('css/styles.css') !!}
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    @yield('header')
</head>
<body>

<div class="container">

<div class="header">
    @yield('title')
</div>

    <div class="col-md-3">

        @yield('left-side')

    </div>

    <div class="col-md-9">
        @if(Session::has('message'))
            <div class='alert alert-info'>
                {{ Session::get('message') }}
            </div>
        @endif

        @yield('content')
    </div>


</div>
</body>
</html>
