@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="blogindex"/>


{{-- @foreach ($data as $post)
    <?php // echo $post->title; ?><br>
@endforeach --}}


{{-- Footer --}}
<x-footer/>