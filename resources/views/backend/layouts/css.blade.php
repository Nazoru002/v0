<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/css/select2.min.css">

  
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

  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #2a2a2a !important;
    border: 1px solid #aaa !important;
    padding-left: 5px;
    padding-right: 5px;
  }
</style>

@yield('css')