@extends('layouts.base_header')

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="contact"/>

{{-- Contact Form --}}
<form>
    <div class="container">
        <div class="form-group">
            <label for="contactform">My comment</label>
            <textarea class="form-control" id="contactform" rows="7"></textarea>
        </div>

        <div class="col-sm d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </div>
</form>

{{-- Footer --}}
<x-footer/>