@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

<p class="main-header-text text-center mt-5"><strong>Sign In</strong></p>
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <form>
                <div class="form-group">
                  <label class="regular-text" for="login">Login</label>
                  <input type="text" class="form-control" id="login" placeholder="Username">
                </div>
        
                <div class="form-group">
                  <label class="regular-text" for="loginpassword">Password</label>
                  <input type="password" class="form-control" id="loginpassword" placeholder="Password">
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