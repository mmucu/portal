@extends('layouts.master')

@section('header')
    @parent
    <script src="js/jquery.bsPhotoGallery.js"></script>

    <script language="javascript">

        $(document).ready(function(){
            $('ul.first').bsPhotoGallery({
                "classes" : "col-lg-3 col-md-4 col-sm-3 col-xs-6 col-xxs-12",
                "hasModal" : true
            });


        });

    </script>

    <style>
        ul {
            padding:0 0 0 0;
            margin:0 0 0 0;
        }
        ul li {
            list-style:none;
            margin:0px;
        }
        ul li img {
            cursor: pointer;
        }

        .first [class*='col-']{
            padding: 0;
            margin: 0;
        }
    </style>

@endsection

@section('title')
    @include('partials.navigation_home')
@endsection

@section('left-side')

@endsection

@section('content')

    <ul class="first">
    @foreach($images as $image)

        <li>
            {!! HTML::image( Image::url('images/'.$image->image_name,600,480,array('crop')),null, array('width' => '100%','height' => '100%')) !!}
        </li>
    @endforeach
    </ul>
@endsection

@section('right-side')

@endsection