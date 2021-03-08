@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

<p class="main-header-text text-center mt-5"><strong>Register and receive all notifications</strong></p>

{{-- Register Form --}}
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <form>
                <div class="form-group row">
                    <label for="usernameregister" class="col-sm-2 col-form-label regular-text">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="usernameregister">
                    </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label regular-text">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="passwordregister" class="col-sm-2 col-form-label regular-text">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordregister">
                  </div>
                </div>

                <div class="form-group row">
                    <label for="confpasswordregister" class="col-sm-2 col-form-label regular-text">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="confpasswordregister">
                    </div>
                </div>

                <div class="col-sm-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Footer --}}
<x-footer/>