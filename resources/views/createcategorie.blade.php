{{-- Header --}}
<x-header/>

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="createcategorie"/>

{{-- Check session 'createstatus' var --}}
@if (session('createstatus') === "error")
  <div class="container">
    <div class="alert alert-danger text-center regular-text fade show alert-dismissible" role="alert">
        {{ Session::get('errorMessage')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

@if (session('createstatus') === "success")
  <div class="container">
    <div class="alert alert-success text-center regular-text fade show alert-dismissible" role="alert">
      New categorie successfully registered!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
@endif

<div class="d-flex justify-content-center">
    <div class="row">
      <div class="col">
        <div>
            <label class="col-form-label regular-text" for="category">Available Categories</label>
            <select class="form-control" name="category" id="category">
    
              @foreach ($data as $category)
                <option class="regular-text"> <?php echo $category->category ?> </option>
              @endforeach
    
            </select>
        </div>
      </div>

      <div class="col">
        <form action="/controlpanel/createcategorie/save" method="POST">
            @csrf

            <div class="form-group mt-2">
                <label for="newcategorie">New Category</label>
                <input type="text" class="form-control" id="newcategorie" name="newcategorie" placeholder="Your new category" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
</div>

{{-- Footer --}}
<x-footer/>