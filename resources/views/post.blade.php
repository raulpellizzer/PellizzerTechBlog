{{-- Header --}}
<x-header/>

{{-- NavBar --}}
<x-main-nav/>

{{-- Post  --}}
<br>
<div class="container">
    <p class="regular-text float-left custom-margin-left">Category:<strong> <?php echo $data[0]->category; ?> </strong></p>
</div><br><br>

<div class="container text-center justify-content-center align-items-center">
    <h1 class="display-4 main-header-text"> <?php echo "#" . $data[0]->id . " " . $data[0]->title; ?> </h1><br>
    <h3 class="regular-text"> <?php echo $data[0]->subtitle; ?> </h3>
    <br>
    <p class="regular-text"> <?php echo $data[0]->content; ?> </p>
</div>

<div class="container">
    <p class="regular-text float-right">Author:<strong> <?php echo $data[0]->author; ?> </strong></p>
</div>

{{-- Footer --}}
<x-footer/>