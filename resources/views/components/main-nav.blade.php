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

        @if(!Auth::check() || !auth()->user()->isUserActive(Auth::user()->name)[0]->active || !auth()->user()->wasAccountVerified(Auth::user()->name)[0]->registration_verified)
          <li class="nav-item">
            <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Login to Website" href="{{ url('/login') }}">Login</a>
          </li>
        @else
          @if (auth()->user()->isUserActive(Auth::user()->name)[0]->active && auth()->user()->wasAccountVerified(Auth::user()->name)[0]->registration_verified)
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

      @if (Auth::check() && auth()->user()->isUserActive(Auth::user()->name)[0]->active && auth()->user()->wasAccountVerified(Auth::user()->name)[0]->registration_verified)
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

        <ul class="navbar-nav">
          <li class="nav-item m-2 mt-3">
            <form action="{{ url('/user/unsubscribe') }}/<?php echo Auth::user()->id ?>" method="GET">
              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#unsubscribeModal" >Unsubscribe</button>

              <!-- Modal -->
              <div class="modal fade" id="unsubscribeModal" tabindex="-1" role="dialog" aria-labelledby="unsubscribeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="unsubscribeModalLabel">Unsubscribe to blog</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to cancel your subscription? You will no longer receive notifications from us.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Unsubscribe</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </li>
        </ul>

      @endif
      
    </div>
</nav>