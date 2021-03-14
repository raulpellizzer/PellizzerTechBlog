@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="blogindex"/>

{{-- Posts --}}
@foreach ($data as $post)

    <div class="container-fluid custom-margin-left">
        <div class="row justify-content-center align-items-center">
            <div class="col col-md-11">

                <div class="m-3">
                    <div class="card">
                        <h5 class="card-header regular-text"><?php echo "#" . $post->id . ". Posted in: " . $post->created_at; ?></h5>
                        <div class="card-body">
                        <h5 class="card-title main-header-text"><?php echo $post->title; ?></h5>
                        <p class="card-text regular-text"><?php echo $post->title; ?></p>
                        <a href="#" class="btn btn-primary regular-text">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endforeach


{{-- Footer --}}
<x-footer/>