@extends('base.card')

@section('icon-title', 'fa-lock')
@section('card-title', 'Tambah Data Hak Akses')

@section('card-action')
  <a href="{{ route('roles.index') }}" class="btn btn-danger btn-xs">
    &ensp; <span class="fa fa-arrow-left"></span> &ensp; Kembali &ensp;
  </a>
@endsection

@section('card-body')
  <form action="{{ route('roles.store') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Nama Hak Akses : </label>
          <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Masukan Nama Hak Akses..." value="{{ old('name') }}" required autofocus>
          <span class="invalid-feedback">
            {{ $errors->first('name') }}
          </span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-2">
        <button type="submit" class="btn btn-success btn-block">
          <span class="fa fa-plus"></span> &ensp;
          Tambah Data
        </button>
      </div>
    </div>
  </form>
@endsection