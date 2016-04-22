<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>MMUCU CHURCH</title>
        <link rel="stylesheet"     href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script      src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
         <script    src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">    </script>
        {!!  HTML::style('css/styles.css') !!}
        <link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
        @yield('header')
    </head>
    <body>

    <div class="container">

        <div class="col-md-1">

            @yield('left-margin')

        </div>

        <div class="col-md-10">

            <div class="header">
                <nav class="navbar navbar-default navbar-static-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{ url('/') }}">CHURCH</a>
                        </div>

                    </div>
                </nav>
            </div>

            @if(Session::has('message'))
                <div class='alert alert-info'>
                    {{ Session::get('message') }}
                </div>
            @endif

            <div class="jumbotron">
                <h2 style="align-content: center">ABOUT MMUCU CHURCH PORTAL</h2>
            </div>

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        {!! HTML::image('images/mela/2 (1).jpg',null, array('width' => '100%','height' => '100%')) !!}
                    </div>

                    <div class="item">
                        {!! HTML::image('images/mela/2 (2).jpg',null, array('width' => '100%','height' => '100%')) !!}
                    </div>

                    <div class="item">
                        {!! HTML::image('images/mela/2 (3).jpg',null, array('width' => '100%','height' => '100%')) !!}
                    </div>

                    <div class="item">
                        {!! HTML::image('images/mela/2 (4).jpg',null, array('width' => '100%','height' => '100%')) !!}
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <div class="main-body">
                <div class="col-md-3">
                    @section('left-side-content')
                        <div class="">
                            <h4>Communication</h4>
                            <p>
                                Having an interactive website will enable information to be communicated faster and
                                more efficiently hence more members of the church will be able to access information
                                in the right time
                            </p>
                        </div>
                        {!! HTML::image('images/dicline.jpg',null, array('width' => '100%','height' => '100%')) !!}

                        <div class="">
                            <h4>An information hub</h4>
                            <p>
                                Do you know what will be happening next week? have you ever wanted to find out where that bestp
                                class fellowship will be? or who will be preaching this Sunday and about what? come here oftenly
                                for that information
                            </p>
                        </div>

                </div>
                <div class="col-md-4">
                    {!! HTML::image('images/small-bird.jpg',null, array('width' => '100%','height' => '100%')) !!}
                </div>
                <div class="col-md-3">
                    @section('right-side-content')
                        <div class="about-right-side">
                            <h4>Interactions</h4>
                            <p>
                                So you are in the music team and want to know some more people in that team, or you want to know
                                the exec, this will be made possible now.
                            </p>
                        </div>
                        {!! HTML::image('images/dicline.jpg',null, array('width' => '100%','height' => '100%')) !!}
                        <div class="about-right-side">
                            <h4>Membership</h4>
                            <p>
                                you can now have an account with Mmucu and share with us some of the Christian teachings you know.
                            </p>
                        </div>

                </div>
            </div>
        </div>

        <div class="col-md-1">
            @yield('right-margin')
        </div>


    </div>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->


    </body>
    </html>
