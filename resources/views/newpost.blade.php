@extends('layouts.base_header')

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="newpost"/>

{{-- New Post Form --}}
<div class="container-fluid custom-margin-left">
    <div class="row justify-content-left align-items-left">
        <div class="col col-md-9">
            <form action="{{ url('/posts/new/create') }}" method="POST">
              @csrf

              <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label regular-text">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="subtitle" class="col-sm-3 col-form-label regular-text">Subtitle</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="subtitle" id="subtitle" required>
                </div>
              </div>

              <div class="form-group row mt-5 little-margin-left">
                <label for="bodycontent">Body</label>
                <textarea class="form-control" name="bodycontent" id="bodycontent" rows="3" maxlength="65535" required></textarea>
                <p class="regular-text">Characters left: </p> <span class="little-margin-left" id="charactersleft">65535</span>
              </div>

              <div class="form-group row">
                <label for="author" class="col-sm-3 col-form-label regular-text">Author</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="author" id="author" required>
                </div>
              </div>

              <div class="form-group row regular-text little-margin-left">
                <label for="category">Choose a category for this post</label>
                <select class="form-control" name="category" id="category">
                  <option>Web Security</option>
                  <option>Development</option>
                  <option>IT Essentials</option>
                  <option>Best Practices</option>
                  <option>Other</option>
                </select>
              </div>

              <div class="col-sm-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Post</button>
              </div>

              <br><br><br>
            </form>
        </div>
    </div>
</div>





{{-- Footer --}}
<x-footer/>