{{-- Header --}}
<x-header/>

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="usermanagement"/>

{{-- Check session 'updateUsers' var --}}
@if (session('updateUsers') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
        {{ Session::get('errorMessage')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('updateUsers') === "errorInUpudate")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
        There was an error when attempting to update user status
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('updateUsers') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      User data updated successfully
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

{{-- Grid --}}
<div class="row">
  <div class="col-md-1"></div>

  <div class="col-md-2">
    <p class="main-header-text"><strong>Statistics</strong></p>
    <p class="regular-text">> Number of users: <?php echo sizeof($data) ?></p>
  </div>

  <div class="col-md-9">
    <div class="container">
      <form class="form-inline ">
          <label class="regular-text" for="namesearch">Search for a username:</label>
          <input class="form-control mr-sm-2 ml-4 regular-text" type="search" id="namesearch" name="namesearch" placeholder="Username" onkeyup="searchUser()" aria-label="Search">
      </form>
    </div>

    <form action="{{ url('/controlpanel/manageusers/save') }}" method="POST">
      @csrf
      <table class="table table-striped table-bordered container" id="usergrid" >
          <thead>
          <tr>
              <th class="main-header-text" scope="col">ID</th>
              <th class="main-header-text" scope="col">Username</th>
              <th class="main-header-text" scope="col">Email</th>
              <th class="main-header-text" scope="col">Created At</th>
              <th class="main-header-text" scope="col">Is Active</th>
          </tr>
          </thead>
          <tbody>
  
              @foreach ($data as $user)
                  <tr>
                      <th class="main-header-text" scope="row"> <?php echo $user->id ?> </th>
                      <td class="regular-text"> <?php echo $user->name ?> </td>
                      <td class="regular-text"> <?php echo $user->email ?> </td>
                      <td class="regular-text"> <?php echo $user->created_at ?> </td>
  
                      <td>
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="ckbox<?php echo $user->id ?>" id="ckbox<?php echo $user->id ?>"
                                  @if ($user->active)
                                      checked
                                  @endif>
                              <label class="custom-control-label" for="ckbox<?php echo $user->id ?>"></label>
                          </div>
                      </td>
                  </tr>
              @endforeach
  
          </tbody>
      </table>
  
      <div class="col-sm d-flex justify-content-center mt-5">
          <button type="submit" class="btn btn-primary regular-text">Save Changes</button>
      </div>
    </form>
  </div>
</div>

{{-- Footer --}}
<x-footer/>