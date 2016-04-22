<!DOCTYPE html>
<html>
<head>
    <title>Oooops!!.</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
            background-color: #456896;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class='title'>WE ARE REALLY SORRY</div>
        {!! HTML::image('images/'.'minions.jpg',null, array('width' => '33%','height' => '33%')) !!}
        <div class="title">We are still developing this part</div>
        <a href="/" class="btn btn-success">GET ME OUT OF HERE</a>

    </div>
</div>
</body>
</html>
