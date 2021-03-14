@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

<p class="main-header-text text-center mt-5"><strong>Register and receive all notifications</strong></p>

{{-- Check session 'registerStatus' var --}}
@if (session('registerStatus') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      User successfully registered!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('registerStatus') === "invalidCredentials")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      Invalid credentials
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('registerStatus') === "userExists")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      Pick a different username or email
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('registerStatus') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      Something went wrong!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
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
                    <input type="text" class="form-control" name="userNameRegister" id="userNameRegister" required>
                  </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label regular-text">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="passwordRegister" class="col-sm-2 col-form-label regular-text">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="passwordRegister" id="passwordRegister" required>
                </div>
              </div>

              <div class="form-group row">
                  <label for="confPasswordRegister" class="col-sm-2 col-form-label regular-text">Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="confPasswordRegister" id="confPasswordRegister" required>
                  </div>
              </div>

              <div class="col-sm-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary regular-text">Register</button>
              </div>
            </form>
        </div>
    </div>

    <div class="padding-left">
      <p class="main-header-text mt-5"><strong>Instructions:</strong></p>
      <p class="regular-text">> All fields must not be empty</p>
      <p class="regular-text">> Your username must have at least 07 characters</p>
      <p class="regular-text">> Your password must have at least 08 characters</p>
      <p class="regular-text">> Your password must contain at least one upper case letter ('A', 'B', ...)</p>
      <p class="regular-text">> Your password must contain at least one special character among these ( []!@#$%&*-()<>{} )</p>
    </div>
</div>

{{-- Footer --}}
<x-footer/>