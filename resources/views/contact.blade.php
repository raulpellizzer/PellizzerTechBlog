{{-- Header --}}
<x-header/>

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="contact"/>

{{-- Check session 'messagestatus' var --}}
@if (session('messagestatus') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      {{ Session::get('errorMessage')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('messagestatus') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      Your message was successfully sent
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('messagestatus') === "noMessageProvided")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
      Please enter your message before hitting the Send button
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

{{-- Contact Form --}}
<form action="{{ url('/contact/sendmessage') }}" method="POST">
    @csrf

    <div class="container regular-text">
        <div class="form-group">
            <label for="contactform">My comment</label>
            <textarea class="form-control" id="contactform" name="contactform" rows="10" required></textarea>
        </div>

        <div class="col-sm d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </div>
</form>

{{-- Footer --}}
<x-footer/>