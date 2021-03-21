@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

{{-- Login Form --}}
<p class="main-header-text text-center mt-5"><strong>Sign In</strong></p>

{{-- Check session 'authStatus' var --}}
@if (session('authStatus') === "invalidCredentials")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      Invalid credentials
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('authStatus') === "accountNotVerified")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      This account has not yet been verified. Please activate it via your email
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('authStatus') === "accountVerified")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      Your account has been verified! You can now log in.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('authStatus') === "disabledUser")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      This user account has been disabled
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('authStatus') === "errorInOperation")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      Something went wrong. Please, try again in a few minutes
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

{{-- Login Form --}}
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <form action="{{ url('/login/authenticate') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label class="regular-text" for="name">Login</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Username" required>
                </div>
        
                <div class="form-group">
                  <label class="regular-text" for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>

                <a href="#" class="float-right mb-3">Forgot your password?</a>
        
                <div class="col-sm d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary regular-text">Sign in</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Footer --}}
<x-footer/>