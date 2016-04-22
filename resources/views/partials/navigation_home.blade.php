<nav class="navbar navbar-default navbar-static-top hidden-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://mmucu.dev">CHURCH</a>
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href=" {{ url('/') }}">portal</a>
        </div>
        @include('partials.welcome_page')
    </div>
</nav>

@include('partials.navigation_xs')