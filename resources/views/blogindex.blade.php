@extends('layouts.base_header')

{{-- NavBar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="blogindex"/>

{{-- Check session 'viewPosts' var --}}
@if (session('viewPosts') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      {{ Session::get('errorMessage')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

<div class="d-flex justify-content-center">
  <h5 class="main-header-text lead">Optimize your search</h5>
</div>

{{-- Search form --}}
<form action="/blog" method="POST">
  @csrf

  <div class="d-flex justify-content-center regular-text">
    <div class="form-row align-items-center">
      <div class="col-sm-4 my-1">
        <label class="sr-only" for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
      </div>

      <div class="col-sm-4 my-1">
        <label class="sr-only" for="subtitle">Subtitle</label>
        <div class="input-group">
          <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle">
        </div>
      </div>

      <div class="col-sm-3 my-1">
        <div>
            <select class="form-control" name="category" id="category">
              <option class="regular-text">All</option>

              @foreach ($data[sizeof($data) - 1] as $category)
                <option class="regular-text"> <?php echo $category->category ?> </option>
              @endforeach

            </select>
        </div>
      </div>

      <div class="col-sm-5"></div>
      <div class="col-sm-3 my-1 padding-left">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
</form><br>

{{-- Posts --}}
@for ($i = 0; $i < sizeof($data) - 1; $i++)

  <div class="container-fluid custom-margin-left">
    <div class="row justify-content-center align-items-center">
      <div class="col col-md-11">
        <div class="m-3">
          <div class="card">
            <h5 class="card-header regular-text"><?php echo "#" . $data[$i]->id . ". Posted in: " . $data[$i]->created_at; ?></h5>
            <div class="card-body">
              <h5 class="card-title main-header-text"><?php echo $data[$i]->title; ?></h5>
              <p class="card-text regular-text"><?php echo $data[$i]->subtitle; ?></p>
              <a href="{{ url('/blog/post/' . $data[$i]->id) }}" class="btn btn-primary regular-text">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endfor

<div class="container d-flex justify-content-center">
  {{-- {{ $data->links() }} --}}
  {{ $data->appends(request()->all())->links() }}
</div>

{{-- Footer --}}
<x-footer/>