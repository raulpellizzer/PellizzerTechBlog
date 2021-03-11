@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

<p class="main-header-text text-center mt-5"><strong>Register and receive all notifications</strong></p>

{{-- Check session 'status' var --}}
@if (session('status') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text" role="alert">
      Invalid Credentials
    </div>
  </div>
@endif

@if (session('status') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text" role="alert">
      User successfully registered!
    </div>
  </div>
@endif

{{-- Register Form --}}
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <form action="{{ url('/users') }}" method="POST">
              @csrf

              <div class="form-group row">
                  <label for="userNameRegister" class="col-sm-2 col-form-label regular-text">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="userNameRegister" id="userNameRegister">
                  </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label regular-text">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" id="email">
                </div>
              </div>

              <div class="form-group row">
                <label for="passwordRegister" class="col-sm-2 col-form-label regular-text">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="passwordRegister" id="passwordRegister">
                </div>
              </div>

              <div class="form-group row">
                  <label for="confPasswordRegister" class="col-sm-2 col-form-label regular-text">Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="confPasswordRegister" id="confPasswordRegister">
                  </div>
              </div>

              <div class="col-sm-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
        </div>
    </div>

    <div class="padding-left">
      <p class="main-header-text mt-5"><strong>Rules:</strong></p>
      <p class="regular-text">> All fields must not be empty</p>
      <p class="regular-text">> Your username must have at least 07 characters</p>
      <p class="regular-text">> Your password must have at least 08 characters</p>
      <p class="regular-text">> Your password must contain at least one upper case ('A', 'B', ...)</p>
      <p class="regular-text">> Your password must contain at least one special character ([]!@#$%&*()<>{})</p>
    </div>
</div>

{{-- Footer --}}
<x-footer/>