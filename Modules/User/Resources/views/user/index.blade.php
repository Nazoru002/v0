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
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-xs">
          &ensp; <span class="fa fa-plus"></span> &ensp; Tambah Data &ensp;
        </a>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          <thead>
            <tr>
              <th class="text-center" width="10%">No.</th>
              <th>Nama</th>
              <th>E-Mail</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $item)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info btn-sm borad">
                      <span class="fa fa-edit"></span>
                    </a>
                    <form action="{{ route('user.destroy', $item->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      
                      <button type="submit" class="btn btn-danger btn-sm borad">
                        <span class="fa fa-trash"></span>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4">Belum Ada Data Pengguna.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
