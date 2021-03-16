<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}"> <i class="fas fa-shield-alt"></i> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse regular-text" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Home Page" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Access Blog" href="{{ url('/blog') }}">Blog</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Access Portfolio" href="{{ url('/portfolio') }}">Portfolio</a>
        </li>

        @if(!Auth::check() || !auth()->user()->isUserActive(Auth::user()->name)[0]->active)
          <li class="nav-item">
            <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Login to Website" href="{{ url('/login') }}">Login</a>
          </li>
        @else
          @if (auth()->user()->isUserActive(Auth::user()->name)[0]->active)
            <li class="nav-item">
              <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Login to Website" href="{{ url('/logout') }}">Logout</a>
            </li>
          @endif
        @endif

        <li class="nav-item">
            <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Register New User" href="{{ url('/register') }}">Register</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="tooltip" data-placement="top" title="About Page" href="{{ url('/about') }}">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Contact Page" href="{{ url('/contact') }}">Contact</a>
        </li>
      </ul>

      @if (Auth::check() && auth()->user()->isUserActive(Auth::user()->name)[0]->active)
        <ul class="navbar-nav">
          <li class="nav-item">
            <span class="lead regular-text">Welcome, {{ Auth::user()->name }} </span>
          </li>
        </ul>

        @if (auth()->user()->isAdmin(Auth::user()->email))
          <ul class="navbar-nav">
            <li class="nav-item m-2 mt-3">
              <form action="{{ url('/controlpanel') }}" method="GET">
                <button type="submit" class="btn btn-success btn-sm">Control Panel</button>
              </form>
            </li>
          </ul>
        @endif
      @endif

    </div>
</nav>