@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

{{-- Login Form --}}
<p class="main-header-text text-center mt-5"><strong>Sign In</strong></p>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <form action="{{ url('/login/authenticate') }}" method="POST">
                @csrf

                <div class="form-group">
                  <label class="regular-text" for="name">Login</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Username">
                </div>
        
                <div class="form-group">
                  <label class="regular-text" for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
        
                <div class="col-sm d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Footer --}}
<x-footer/>