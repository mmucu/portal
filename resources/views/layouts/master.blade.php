<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mmucu.org</title>
    <meta name="keywords" content="mmucu.org, masinde muliro university christian union, mmust cu, mmustcu, weco cu,
			reaching to the world with the word of God" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet"     href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script      src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
    <script    src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js">    </script>
    {!!  HTML::style('css/styles.css')!!}
    {!! HTML::style('css/tiksluscarousel.css') !!}
    {!! HTML::script('js/tiksluscarousel.js') !!}


    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:400italic' rel='stylesheet' type='text/css'>
    @yield('header')

    <script language="javascript">

        jQuery(document).ready(function() {
            jQuery('.toggle-nav').click(function(e) {
                jQuery(this).toggleClass('active');
                jQuery('.menu ul').toggleClass('active');

                e.preventDefault();
            });

            $('.alert-autoclose').fadeTo(2000,500).slideUp(200,function(){
                $('.alert').alert('close');
            });
        });

    </script>
</head>
<body>

<div class="container container-fluid">

<div class="header">
    @yield('title')
</div>

    <div class="col-md-3">

        @yield('left-side')

    </div>

    <div class="col-md-6">
        @if(Session::has('message'))
            <div class='alert alert-info fade in alert-autoclose'>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h3 style="text-align: center">{{ Session::get('message') }}</h3>
            </div>
        @endif
            @if(Session::has('success'))
                <div class='alert alert-success fade in alert-autoclose'>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h3 style="text-align: center">{{ Session::get('success') }}</h3>
                </div>
            @endif

            @if(count($errors) > 0)
                <div class='alert alert-warning fade in'>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $error )
                        <h3 style="text-align: center">{{ $error }}</h3>
                    @endforeach
                </div>

            @endif


            @yield('content')
    </div>

    <div class="col-md-3 hidden-xs">

        @yield('right-side')

    </div>


</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thanks for visiting</h4>
            </div>
            <div class="modal-body">
                <p>You are welcomed again</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">done</button>
            </div>
        </div>

    </div>
</div>

<script>
    var refTagger = {
        settings: {
            bibleVersion: "ESV",
            customStyle : {
                heading: {
                    backgroundColor : "#a4c2f4",
                    color : "#000000",
                    fontFamily : "Georgia, Times, 'Times New Roman', serif",
                    fontSize : "12px"
                },
                body   : {
                    color : "#000000",
                    moreLink : {
                        color: "#783f04"
                    }
                }
            }
        }
    };
    (function(d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = "//api.reftagger.com/v2/RefTagger.js";
        s.parentNode.insertBefore(g, s);
    }(document, "script"));
</script>
<footer class="footer-basic-centered">

    <p class="footer-company-motto">Reaching the world with the word of God</p>

    <p class="footer-links">
        <a href="/">Home</a>
        |
        <a href="profile">Profile</a>
        |
        <a href="articles">Articles</a>
        |
        <a href="about">About</a>
        |
        <a href="image">Photo Gallery</a>
        |
        <a href="#">Contact</a>
    </p>

    <p class="footer-company-name">mmucu &copy; 2015</p>

</footer>
</body>
</html>
