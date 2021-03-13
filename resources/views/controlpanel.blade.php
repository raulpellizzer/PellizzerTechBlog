@extends('layouts.base_header')

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="controlpanel"/>

<div class="container">
    <div class="row text-center">
        <div class="col cpgrid">
            <a href="{{ url('/manageusers') }}" class="btn btn-secondary stretched-link regular-text"><h2>Manage Users</h2></a>
        </div>
        <div class="col cpgrid">
            <a href="{{ url('/manageposts') }}" class="btn btn-secondary stretched-link regular-text"><h2>Manage Posts</h2></a>
        </div>
    </div>
</div>

{{-- Footer --}}
<x-footer/>