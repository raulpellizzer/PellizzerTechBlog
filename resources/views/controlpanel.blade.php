@extends('layouts.base_header')

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="controlpanel"/>

{{-- Check session 'usercontrolpanel' var --}}
@if (session('usercontrolpanel') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      {{ Session::get('errorMessage')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

<div class="container">
    <div class="row text-center">
        <div class="col cpgrid">
            <a href="{{ url('/controlpanel/manageusers') }}" class="btn btn-secondary stretched-link regular-text"><h2>Manage Users</h2></a>
        </div>
        <div class="col cpgrid">
            <a href="{{ url('/controlpanel/manageposts') }}" class="btn btn-secondary stretched-link regular-text"><h2>Manage Posts</h2></a>
        </div>
    </div>
</div>

<br><br>
<div class="container">
    <div class="row text-center">
        <div class="col cpgrid">
            <a href="{{ url('/posts/new') }}" class="btn btn-secondary stretched-link regular-text"><h2>Create New Post (temp button)</h2></a>
        </div>
        <div class="col cpgrid"></div>
    </div>
</div>

{{-- Footer --}}
<x-footer/>