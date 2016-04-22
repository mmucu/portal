
@extends('layouts.master')

@section('header')
    @parent

    <script language="javascript">
        var loadFile = function(event){
            var output = document.getElementById('show_image');
            var output1 = document.getElementById('show_image1');
            output.src = URL.createObjectURL(event.target.files[0]);
            output1.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
@section('title')
    @include('partials.navigation_home')

@endsection

@section('content')
    <div class="about-section">
        <div class="text-content">
            <div class="span7 offset1">
                <h3 style="color: #009926">UPLOAD IMAGES</h3>
                {!! Form::open(array('url' => 'uploads','method'=>'POST', 'files'=>true)) !!}
                <div class="control-group">
                    <div class="form-group">
                        {!! Form::file('images[]',array('multiple' => true)) !!}
                    </div>
                </div>
                {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
                <script type="text/javascript">
                    $('#input_image').bind('change', function(){
                        if(parseFloat(this.files[0].size/1024).toFixed(0) > 2024) {
                            alert('This image of ' + parseFloat(this.files[0].size / 1024 / 1024).toFixed(2) + "MB" + " is too large, try files below 2MB");
                            this.value = '';
                        }
                    });
                </script>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection