@extends('layouts.base_header')

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="postmanagement"/>

{{-- Check session 'updatePost' var --}}
@if (session('updatePost') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
        {{ Session::get('errorMessage')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('updatePost') === "errorInUpudate")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
        There was an error when attempting to update user status
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('updatePost') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      Post data updated successfully
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

<div class="container">
    <form class="form-inline">
        <label class="regular-text" for="postsearch">Search for a post:</label>
        <input class="form-control mr-sm-2 ml-4 regular-text" type="search" id="postsearch" name="postsearch" placeholder="Title" onkeyup="searchPost()" aria-label="Search">
    </form>
</div>

{{-- Grid --}}
<form action="{{ url('/controlpanel/manageposts/save') }}" method="POST">
    @csrf
    <table class="table table-striped table-bordered container" id="postgrid" >
        <thead>
        <tr>
            <th class="main-header-text" scope="col">Edit Content</th>
            <th class="main-header-text" scope="col">ID</th>
            <th class="main-header-text" scope="col">Title</th>
            <th class="main-header-text" scope="col">Subtitle</th>
            <th class="main-header-text" scope="col">Category</th>
            <th class="main-header-text" scope="col">Published</th>
        </tr>
        </thead>
        <tbody>

            @foreach ($data as $post)
                <tr>
                    <td class="regular-text"><a href="{{ url('/controlpanel/manageposts/edit') }}/<?php echo $post->id ?>" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Edit</a></td>
                    <th class="main-header-text" scope="row"> <?php echo $post->id ?> </th>
                    <td class="regular-text"> <?php echo $post->title ?> </td>
                    <td class="regular-text"> <?php echo $post->subtitle ?> </td>
                    <td class="regular-text"> <?php echo $post->category ?> </td>

                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ckbox<?php echo $post->id ?>" id="ckbox<?php echo $post->id ?>"
                                @if ($post->published)
                                    checked
                                @endif>
                            <label class="custom-control-label" for="ckbox<?php echo $post->id ?>"></label>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="col-sm d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-primary regular-text">Save Changes</button>
        <div class="padding-left">
            <a href="{{ url('/posts/new') }}" class="btn btn-secondary regular-text">Create New Post</a>
        </div>
    </div>
</form>

{{-- Footer --}}
<x-footer/>