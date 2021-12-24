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
              <th>Hak Akses</th>
              <th width="10%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $item)
              <tr>
                <td class="align-middle text-center">{{ ($users->currentpage()-1) * $users->perpage() + $loop->index + 1 }}.</td>

                <td class="align-middle">{{ $item->name }}</td>
                <td class="align-middle">{{ $item->email }}</td>
                <td class="align-middle">
                  @foreach ($item->roles as $item2)
                    <span class="btn btn-sm btn-outline-success">
                      {{ $item2->name }}
                    </span>
                  @endforeach
                </td>
                <td class="align-middle text-center">
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
    <div class="card">
      <div class="row m-0 p-0 ">
        <div class="col-md-6 align-midle">
          <x-button-info times="1" edit="1" undo="1"></x-button-info>
        </div>
        <div class="col-md-6">
          <div class="float-right">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
