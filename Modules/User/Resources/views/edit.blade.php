@extends('backend.layouts.master')

@section('content')
<div class="col-12">
  <div class="card card-secondary">
    <div class="card-header">
      <h4 class="card-title">
        <span class="fa fa-user"></span> &ensp;
        Data Pengguna
      </h4>
      <div class="card-tools">
        <a href="{{ route('user.index') }}" class="btn btn-danger btn-xs">
          &ensp; <span class="fa fa-arrow-left"></span> &ensp; Kembali &ensp;
        </a>
      </div>
    </div>
    <div class="card-body">
      <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-12">
            <h5>Data Diri & Akun Pengguna : </h5>
            <hr class="hr-title">
          </div>
          <div class="col-12 px-3">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="name">Nama Pengguna : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text {{ $errors->has('name') ? 'box-invalid':'' }}"><i class="fa fa-address-card"></i></span>
                    </div>
                    <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Masukan Nama Pengguna..." value="{{ $user->name }}" required autofocus>
                    <span class="invalid-feedback">
                      {{ $errors->first('name') }}
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <label for="email">E-Mail Pengguna : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text {{ $errors->has('email') ? 'box-invalid':'' }}"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" placeholder="Masukan E-Mail Pengguna..." value="{{ $user->email }}" readonly autofocus>
                    <span class="invalid-feedback">
                      {{ $errors->first('email') }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 pt-2">
            <h6>Ubah Password Pengguna : </h6>
            <hr class="hr-title">
          </div>
          <div class="col-12 px-3">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="password">Password Pengguna : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text {{ $errors->has('password') ? 'box-invalid':'' }}"><i class="fa fa-lock"></i></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" placeholder="Masukan Password..." autofocus>
                    <span class="invalid-feedback">
                      {{ $errors->first('password') }}
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password_confirmation">Konfirmasi Password : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text {{ $errors->has('password_confirmation') ? 'box-invalid':'' }}"><i class="fa fa-key"></i></span>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid':'' }}" placeholder="Tulis Ulang Password..." autofocus>
                    <span class="invalid-feedback">
                      {{ $errors->first('password_confirmation') }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 px-3">
            <div class="row">
              <div class="col-md-3 pt-2">
                <button type="submit" class="btn btn-success btn-block btn-sm">
                  <span class="fa fa-check"></span> &ensp;
                  Simpan Perubahan Pengguna
                </button>
              </div>
              <div class="col-md-3 pt-2">
                <button type="reset" class="btn btn-danger btn-block btn-sm">
                  <span class="fa fa-undo"></span> &ensp;
                  Reset Input
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
