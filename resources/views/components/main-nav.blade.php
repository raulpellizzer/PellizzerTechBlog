<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}"> <i class="fas fa-shield-alt"></i> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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

        <li class="nav-item">
            <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Login to Website" href="{{ url('/login') }}">Login</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Register New User" href="{{ url('/register') }}">Register</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="tooltip" data-placement="top" title="About Page" href="{{ url('/about') }}">About</a>
        </li>
      
      </ul>
    </div>
</nav>