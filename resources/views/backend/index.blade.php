@extends('backend.layouts.master')

@section('content')
<div class="col-12">
  <div class="card card-primary card-outline">
    <div class="card-header">
      <h4 class="card-title">
        Example Card
      </h4>
      
      <div class="card-tools">
        <a href="#" class="btn btn-success btn-xs">Example Button 1</a>
        <button class="btn btn-danger btn-xs">Example Button 2</button>
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-lg">Example Modal 1</button>
        <button class="btn btn-secondary btn-xs" id="btn-modal" >Example Modal with JS</button>
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <div class="btn-group">
          <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-wrench"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a href="#" class="dropdown-item">Action</a>
            <a href="#" class="dropdown-item">Another action</a>
            <a href="#" class="dropdown-item">Something else here</a>
            <a class="dropdown-divider"></a>
            <a href="#" class="dropdown-item">Separated link</a>
          </div>
        </div>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, sequi vitae. Ducimus ad asperiores architecto veniam nam, perferendis iure voluptatibus nulla dolorum voluptates tempora. Suscipit molestiae iusto similique eveniet repellat?</h5>
    </div>
  </div>
</div>
<div class="col-md-8">
  <div class="card card-success card-outline">
    <div class="card-header">
      <h5 class="card-title">Example Card 2</h5>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Keterangan</th>
              <th width="15%" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i <= 5; $i++)
              <tr>
                <td>{{ $i }}</td>
                <td>Nama {{ $i }}</td>
                <td>Keterangan {{ $i }}</td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="#" class="btn btn-xs btn-info">
                      <span class="fa fa-eye"></span>
                    </a>
                    <a href="#" class="btn btn-xs btn-warning">
                      <span class="fa fa-edit"></span>
                    </a>
                    <a href="#" class="btn btn-xs btn-danger">
                      <span class="fa fa-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
  <div class="card card-danger card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{ asset('images') }}/example.jpg" alt="User profile picture">
      </div>

      <h3 class="profile-username text-center">Si Invert Color</h3>

      <p class="text-muted text-center">Software Engineer</p>

      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
          <b>Followers</b> <a class="float-right">1,322</a>
        </li>
        <li class="list-group-item">
          <b>Following</b> <a class="float-right">543</a>
        </li>
      </ul>

      <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#btn-modal').on('click', function() {
      $('#modal-lg').modal('show');
    });
  });
</script>
@endsection