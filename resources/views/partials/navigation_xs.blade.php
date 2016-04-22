<nav class="menu hidden-lg hidden-md">
    <ul class="active">
        <li class="current-item">
            <a href="/"><span class="glyphicon glyphicon-home"></span> Home</a>
        </li>
        <li><a href="profile"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
        <li><a href="article"><span class="glyphicon glyphicon-file"></span> Articles</a> </li>
        <li><a href="ministries">Ministries</a> </li>
        <li><a href="events">events</a> </li>
        <li><a href="members"> Members</a> </li>
        <li><a href="about"><span class="glyphicon glyphicon-hand-down"></span> About</a></li>

        @if(Auth::check())
            <li><a href="{{ url('auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        @else
            <li><a href="{{ url('auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="{{ url('auth/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        @endif

    </ul>
    <a class="toggle-nav" href="#">&#9776;</a>

</nav>