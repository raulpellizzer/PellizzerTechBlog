@extends('layouts.base_header')

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="home"/>

{{-- Check session 'authStatus' var --}}
@if (session('authStatus') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      Welcome!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

{{-- Carousel --}}
<x-carousel/>

{{-- Footer --}}
<x-footer/>