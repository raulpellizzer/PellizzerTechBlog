@extends('layouts.base_header')

{{-- Main navbar --}}
<x-main-nav/>

{{-- Jumbotron --}}
<x-jumbotron type="usermanagement"/>

{{-- Grid --}}
<table class="table table-striped table-bordered container">
    <thead>
      <tr>
        <th class="main-header-text" scope="col">ID</th>
        <th class="main-header-text" scope="col">Name</th>
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


{{-- Footer --}}
<x-footer/>