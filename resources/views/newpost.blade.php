@extends('layouts.base_header')

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="newpost"/>

{{-- Check session 'createPostStatus' var --}}
@if (session('createPostStatus') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      Your new post is up!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('createPostStatus') === "postAlreadyExists")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      You already have a post with that title.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('createPostStatus') === "missingData")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      Please provide data to all fields.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('createPostStatus') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      {{ Session::get('errorMessage')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

{{-- New Post Form --}}
<div class="container-fluid custom-margin-left">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-9">
            <form action="{{ url('/posts/new/create') }}" method="POST">
              @csrf

              <div class="form-group row">
                <div class="col-sm-10">
                    <label for="title" class="col-form-label regular-text">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                    <label for="subtitle" class="col-form-label regular-text">Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" id="subtitle" required>
                </div>
              </div>

              <div class="form-group row mt-5 little-margin-left">
                <label for="bodycontent">Body</label>
                <textarea class="form-control" name="bodycontent" id="bodycontent" rows="3" maxlength="65535" required></textarea>
                <p class="regular-text">Characters left: </p> <span class="little-margin-left" id="charactersleft">65535</span>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                    <label for="author" class="col-form-label regular-text">Author</label>
                    <input type="text" class="form-control small-field " name="author" id="author" required>
                </div>
              </div>

              <div class="form-group row regular-text little-margin-left">
                <div>
                    <label class="col-form-label regular-text" for="category">Choose a category for this post</label>
                    <select class="form-control" name="category" id="category">

                      @foreach ($data as $category)
                        <option class="regular-text"> <?php echo $category->category ?> </option>
                      @endforeach

                    </select>
                </div>
              </div>

              <div class="col-sm-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary regular-text">Post</button>
              </div>
            </form>
        </div>
    </div>
</div>

{{-- Footer --}}
<x-footer/>