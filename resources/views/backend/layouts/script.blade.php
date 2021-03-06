<!-- jQuery -->
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>

@if (session()->has('success'))
  <script>
    toastr.success("{{ session('success') }}", "Berhasil");
  </script>
@endif

@if (session()->has('info'))
  <script>
    toastr.info("{{ session('info') }}", "Pemberitahuan");
  </script>
@endif

@if (session()->has('warning'))
  <script>
    toastr.warning("{{ session('warning') }}", "Peringatan");
  </script>
@endif

@if (session()->has('error'))
  <script>
    toastr.error("{{ session('error') }}", "Kesalahan");
  </script>
@endif

@yield('script')