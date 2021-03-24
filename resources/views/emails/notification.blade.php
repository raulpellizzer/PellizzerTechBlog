@extends('layouts.base_header')

{{-- Jumbotron --}}
<x-jumbotron type="notification"/><br>

<div class="regular-text">
    <p>Test</p>
    <p> <strong> Title: </strong> {{ $post["title"] }} </p>
    <p> <strong> Subtitle: </strong> {{ $post["subtitle"] }} </p>
    <p> <strong> Category: </strong> {{ $post["category"] }} </p>
    <p> <strong> Author: </strong> {{ $post["author"] }} </p>
    <a href="{{ url('/blog') }}">Check it in our blog</a> 
</div>

{{-- Footer --}}
<x-footer/>