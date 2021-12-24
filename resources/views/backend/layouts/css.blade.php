<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">
  
<style>
  .borad {
    border-radius: 0px !important;
  }

  .hr-title {
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid #918383;
  }

  .box-invalid {
    border: 1px solid #dc3545;
    color: #dc3545;
  }

  .input-group:not(.has-validation)>.form-control:not(:last-child) {
    border-top-right-radius: 4px !important;
    border-bottom-right-radius: 4px !important;
  }
</style>

@yield('css')