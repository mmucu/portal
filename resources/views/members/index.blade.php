@extends('layouts.master')
@section('header')
    @parent

@endsection

@section('title')
    @include('partials.navigation_home')
@endsection

@section('left-side')

@endsection

@section('content')
    @foreach($members as $member)
        <table style="width: 100% margin:2%" class="profile-table">
            <tr>
                <td width="25%">
                    <div class="post-image">
                        {!! HTML::image( Image::url('images/'.$member->image_name,300,300,array('crop','grayscale')) ,null, array('width' => '100%','height' => '100%', 'class' => 'post-image image-circle')) !!}
                    </div>
                </td>
                <td width="10%">

                </td>
                <td width="65%">
                    <h4>{{ $member->user->firstname }} {{ $member->user->lastname }}</h4>
                    @if($member->year_of_study)
                        <h5>A {{ strtolower($member->year_of_study->year) }} year student pursuing {{ explode('.',$member->course)[1] }}</h5>
                    @else
                        <h5>pursuing {{ $member->course }}</h5>
                    @endif

                </td>
            </tr>
        </table>
        <hr>
    @endforeach
@endsection