{{-- Header --}}
<x-header/>

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="home"/>

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

{{-- Check session 'authStatus' var --}}
@if (session('authStatus') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      Welcome!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

{{-- Check session 'userStatus' var --}}
@if (session('userStatus') === "deleted")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      You are no longer a subscriber of the blog. Thank you for your stay!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('userStatus') === "errorInOperation")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      Something went wrong. Please, try again in a few minutes
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

{{-- Carousel --}}
<x-carousel/>

{{-- Footer --}}
<x-footer/>