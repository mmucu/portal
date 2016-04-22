<div>
    <ul class="nav navbar-nav">
        <li><a href="{{ url("profile") }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
        <li><a href="{{ url('about') }}"><span class="glyphicon glyphicon-hand-down"></span> About</a></li>
        <li><a href="{{ url('image') }}"><span class="glyphicon glyphicon-picture"></span> Photo Gallery</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">

        @if(Auth::check())
            <li><a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        @else
            <li><a href="{{ url('auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="{{ url('auth/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        @endif
    </ul>

</div>