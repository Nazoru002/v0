@extends('backend.layouts.master')

@section('content')
<div class="col-12">
  <div class="card card-secondary">
    <div class="card-header">
      <h4 class="card-title">
        <span class="fa @yield('icon-title', 'fa-align-justify')"></span> &ensp;
        @yield('card-title', 'Menu')
      </h4>
      <div class="card-tools">
        @yield('card-action')
      </div>
    </div>
    <div class="card-body p-@yield('card-body-p', '3')">
      @yield('card-body')
    </div>
    <div class="card-footer">
      @yield('card-footer')
    </div>
  </div>
</div>
@endsection
