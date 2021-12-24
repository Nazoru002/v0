@extends('base.card')

@section('icon-title', 'fa-lock')
@section('card-title', 'Hak Akses Pengguna')

@section('card-action')
  <a href="{{ route('roles.create') }}" class="btn btn-primary btn-xs">
    &ensp; <span class="fa fa-plus"></span> &ensp; Tambah Data &ensp;
  </a>
@endsection

@section('card-body-p', '0')

@section('card-body')
  <div class="row">
    <div class="col-12">
      
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered mb-0">
      <thead>
        <tr>
          <th class="text-center" width="5%">No.</th>
          <th>Nama Hak Akses</th>
          <th class="text-center" width="10%">Level</th>
          <th class="text-center" width="15%">Status</th>
          <th class="text-center" width="10%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($roles as $item)
          <tr>
            <td class="align-middle text-center">{{ ($roles->currentpage()-1) * $roles->perpage() + $loop->index + 1 }}.</td>
            <td class="align-middle">{{ $item->name }}</td>
            <td class="align-middle text-center">{{ $item->level }}</td>
            <td class="align-middle text-center">
              @if ($item->is_active)
                <span class="btn btn-sm btn-success btn-block">
                  Aktif
                </span>
              @else
                <span class="btn btn-sm btn-danger btn-block">
                  Tidak Aktif
                </span>
              @endif
            </td>
            <td class="align-middle text-center">
              <div class="btn-group">
                <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-sm btn-warning borad">
                  <span class="fa fa-edit align-middle"></span>
                </a>
                <form action="{{ route('roles.active', $item->id) }}" method="post">
                  @csrf
                  @method('PUT')

                  @if ($item->is_active)
                    <button type="submit" class="btn btn-sm btn-danger borad">
                      <span class="fa fa-times align-middle"></span>
                    </button>
                  @else
                    <button type="submit" class="btn btn-sm btn-info borad">
                      <span class="fa fa-undo align-middle"></span>
                    </button>
                  @endif
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center align-middle">
              Belum Ada Data Roles.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection

@section('card-footer')
<div class="row m-0 p-0 ">
  <div class="col-md-6 align-midle">
    <x-button-info times="1" edit="1" undo="1"></x-button-info>
  </div>
  <div class="col-md-6">
    <div class="float-right">
      {{ $roles->links() }}
    </div>
  </div>
</div>
@endsection