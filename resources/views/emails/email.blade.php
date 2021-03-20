@extends('layouts.base_header')

{{-- Jumbotron --}}
<x-jumbotron type="email"/><br>

<div class="main-header-text">
    <h2>From (Username): <span>{{ $userFrom }}</span></h2>
    <h2>From (User Email): <span>{{ $emailFrom }}</span></h2><br>
</div>

<hr class="hr-customized">

<p class="lead regular-text">
    {{ $emailMessage }}
</p><br>

{{-- Footer --}}
<x-footer/>