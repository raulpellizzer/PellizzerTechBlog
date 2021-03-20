@extends('layouts.base_header')

{{-- Jumbotron --}}
<x-jumbotron type="email"/>

<p class="lead regular-text">
    {{ $emailMessage }}
</p>

{{-- Footer --}}
<x-footer/>