<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Back-End of {{ env('APP_NAME') }}</title>

  @include('backend.layouts.css')

  <script>
    function display_c(){
      var refresh=1000; // Refresh rate in milli seconds
      mytime=setTimeout('display_ct()',refresh)
    }

    function display_ct() {
      var x = new Date()
      var x1= x.getDate() + "/" + x.getMonth() + 1 + "/" + x.getFullYear(); 
      x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
      document.getElementById('clock').innerHTML = x1;
      display_c();
    }
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  @include('backend.layouts.navbar')

  <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
    <a href="{{ route('backend.main') }}" class="brand-link">
      <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">V.0</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      @include('backend.layouts.sidebar')
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content pt-3">
      <div class="row px-1">
        @yield('content')
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2021 <a href="https://sukakode.com">SukaKode</a>.</strong> All rights reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="row pt-4 px-4">
      <div class="col-12 text-center">
        <h5 class="text-light">Hi, User</h5>
      </div>
      <div class="col-12 pt-3">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="{{ asset('images') }}/example.jpg" alt="User profile picture">
        </div>
      </div>
      <div class="col-12 text-center pt-3">
        <h6 class="text-light">
          <span id="clock"></span>
        </h6>
      </div>
      <div class="col-12 pt-3">
        <a class="btn btn-block btn-outline-secondary btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <span class="fa fa-sign-out-alt"></span> &ensp;
          Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>

      </div>
    </div>
  </aside>
</div>

@include('backend.layouts.script')
<script>
  $(document).ready(function() {
    // Realtime Clock
    display_ct();
  });
</script>
</body>
</html>
