<nav class="navbar header-nav navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Creative Lab
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li><a href="{{ url('/login') }}"><i class="material-icons">fingerprint</i> Login</a></li>
                <li><a href="{{ url('/register') }}"><i class="material-icons">person_add</i> Register</a></li>
            </ul>
        </div>
    </div>
</nav>
