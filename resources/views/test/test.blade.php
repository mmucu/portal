@extends('layouts.master')

@section('header')
    @parent
    <script src="js/dynamics.min.js"></script>
    <style>

        .pill{
            float: left;
            margin: 0 8px;
            width: 24px;
            height: 48px;

            background: black;
        }
        .top-pill{
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            box-shadow: 10px 10px 10px #636880;
        }
        .bottom-pill{
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            box-shadow: 10px 10px 10px #636880;
        }
        .bottom-pill-container{
            position: absolute;
            top: 220px;


        }
        .top-pill-container{
            position: absolute;
            top:100px;
            bottom: 0px;

        }
        .text1{
            float: left;
            margin: 0 8px;
            width: 24px;
            height: 24px;
            color: black;
        }
        .text_box{
            position: absolute;
            top:150px;
            height: 20px;
        }
        .logo_container{
            position: absolute;
            left: 0px;
            top: 50px;
            height:400px;
        }




    </style>

@endsection
@section('content')

    <div class="logo_container">
        <div class="logo_png">
            {!! HTML::image('images/mmucu_logo_round.png',null, array('class' => 'logo', 'width' => '25%','height' => '25%')) !!}
        </div>
    </div>


    <h4>my little thinky studio</h4>

    <div class="animate_container">

        <div class="dot_container top-pill-container">
            <div class="pill top-pill pill_top"></div>
            <div class="pill top-pill pill_top"></div>
            <div class="pill top-pill pill_top"></div>
            <div class="pill top-pill pill_top"></div>
            <div class="pill top-pill pill_top"></div>
        </div>
        <div class="text_box">
            <h1>
                <div class="text1">M</div>
                <div class="text1">M</div>
                <div class="text1">U</div>
                <div class="text1">C</div>
                <div class="text1">U</div>
            </h1>
        </div>
        <div class="dot_container bottom-pill-container">
            <div class="pill bottom-pill pill_bottom"></div>
            <div class="pill bottom-pill pill_bottom"></div>
            <div class="pill bottom-pill pill_bottom"></div>
            <div class="pill bottom-pill pill_bottom"></div>
            <div class="pill bottom-pill pill_bottom"></div>
        </div>

    </div>

    <script language="javascript">

        var top_pills = document.querySelectorAll('.pill_top')
        var bottom_pills = document.querySelectorAll('.pill_bottom')
        var textes = document.querySelectorAll('.text1')
        var colors = ['#007EFF', '#FF3700', '#92FF00','#FF3700','#007EFF']
        var delays = [1,2,3,2,1]
        var logo = document.querySelector('logo_png')

        // Start the 3 dot animations with different delays
        function animatePills() {
            for(var i=0; i<top_pills.length; i++) {
                dynamics.animate(top_pills[i], {
                    translateY: -12,
                    scaleY: 2,
                    backgroundColor: colors[i]
                }, {
                    type: dynamics.forceWithGravity,
                    bounciness: 400,
                    elasticity: 200,
                    duration: 2000,
                    delay: delays[i] * 450
                })
            }

            for(var i=0; i<bottom_pills.length; i++) {
                dynamics.animate(bottom_pills[i], {
                    translateY: 12,
                    scaleY: 2,
                    backgroundColor: colors[i]
                }, {
                    type: dynamics.forceWithGravity,
                    bounciness: 400,
                    elasticity: 200,
                    duration: 2000,
                    delay: delays[i] * 450
                })
            }

            for(var i=0; i<textes.length; i++) {
                dynamics.animate(textes[i], {
                    color: colors[i],
                    scaleY: 0.5
                }, {
                    type: dynamics.forceWithGravity,
                    bounciness: 400,
                    elasticity: 200,
                    duration: 2000,
                    delay: delays[i] * 450
                })

            }

            dynamics.animate(logo, {
                scaleY: 2,
                translateY: 50
            }, {
                type: dynamics.forceWithGravity,
                bounciness: 800,
                elasticity: 200,
                duration: 2000,
                delay: 450
            })




            dynamics.setTimeout(animatePills, 2500)
        }
        animatePills()


    </script>

@endsection