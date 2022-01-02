@extends('base.card')

@section('icon-title', 'fa-lock')
@section('card-title', 'Edit Data Hak Akses')

@section('card-action')
  <a href="{{ route('game.index') }}" class="btn btn-danger btn-xs">
    &ensp; <span class="fa fa-arrow-left"></span> &ensp; Kembali &ensp;
  </a>
@endsection

@section('card-body')
  <form action="{{ route('game.update', $game->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="kode_game">Kode Game : </label>
          <input type="text" name="kode_game" id="kode_game" class="form-control {{ $errors->has('kode_game') ? 'is-invalid' : '' }}" placeholder="Masukan Nama Hak Akses..." value="{{ $game->kode_game }}" required autofocus>
          <span class="invalid-feedback">
            {{ $errors->first('kode_game') }}
          </span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nama_game">Nama Game : </label>
          <input type="text" name="nama_game" id="nama_game" class="form-control {{ $errors->has('nama_game') ? 'is-invalid' : '' }}" placeholder="Masukan Nama Hak Akses..." value="{{ $game->nama_game }}" required autofocus>
          <span class="invalid-feedback">
            {{ $errors->first('nama_game') }}
          </span>
        </div>
      </div>
     
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-3">
        <button type="submit" class="btn btn-success btn-block">
          <span class="fa fa-check"></span> &ensp;
          Simpan Perubahan Data
        </button>
      </div>
    </div>
  </form>
@endsection