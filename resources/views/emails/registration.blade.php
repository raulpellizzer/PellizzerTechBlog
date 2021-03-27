{{-- Header --}}
<x-header/>

{{-- Jumbotron --}}
<x-jumbotron type="accountverification"/><br>

<div class="regular-text">
    <p> <strong> Hello, {{ $userName }}!</strong> </p>
    <p> <strong> A new subscription with this email address was made for Pellizzer Tech Blog.</strong> </p>
    <p> To verify your account, please click the link bellow. </p>
    <p> <strong> If you dont recognize this email, please ignore it.</strong> </p><br>

    <a href="{{ url('/users/verify/newuser') }}/<?php echo $id ?>">Verify My Account</a><br>
</div>

{{-- Footer --}}
<x-footer/>