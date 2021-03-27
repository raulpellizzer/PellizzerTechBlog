{{-- Header --}}
<x-header/>

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="editpost"/>

{{-- Edit Post Form --}}
<div class="container-fluid custom-margin-left">
    <div class="row justify-content-center align-items-center">
        <div class="col col-md-9">
            <form action="{{ url('/posts/update') }}/<?php echo $data[0]->id ?>" method="POST">
              @csrf

              <div class="form-group row">
                <div class="col-sm-10">
                    <label for="title" class="col-form-label regular-text">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $data[0]->title ?>" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                    <label for="subtitle" class="col-form-label regular-text">Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" id="subtitle" value="<?php echo $data[0]->subtitle ?>" required>
                </div>
              </div>

              <div class="form-group row mt-5 little-margin-left">
                <label for="bodycontent">Body</label>
                <textarea class="form-control" name="bodycontent" id="bodycontent" rows="3" maxlength="65535" required><?php echo $data[0]->content ?></textarea>
                <p class="regular-text">Characters left: </p> <span class="little-margin-left" id="charactersleft">65535</span>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                    <label for="author" class="col-form-label regular-text">Author</label>
                    <input type="text" class="form-control small-field " name="author" id="author" value="<?php echo $data[0]->author ?>" required>
                </div>
              </div>

              <div class="form-group row regular-text little-margin-left">
                <div>
                    <label class="col-form-label regular-text" for="category">Choose a category for this post</label>
                    <select class="form-control" name="category" id="category">

                      <option class="regular-text"> <?php echo $data[0]->category ?> </option>
                      
                      @foreach ($data[sizeof($data) - 1] as $category)
                        @if ($data[0]->category != $category->category)
                          <option class="regular-text"> <?php echo $category->category ?> </option>
                        @endif
                      @endforeach

                    </select>
                </div>
              </div>

              <div class="col-sm-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary regular-text">Save Changes</button>
              </div>
            </form>
        </div>
    </div>
</div>

{{-- Footer --}}
<x-footer/>