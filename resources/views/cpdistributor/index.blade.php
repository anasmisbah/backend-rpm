@extends('layouts.master')

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Contact Person Distributor</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Contact Person Distributor</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Contact Person Distributor</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('cpdistributor.create')}}"><i class="fas fa-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Url</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($cpdistributors as $cpdistributor)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cpdistributor->name}}</td>
                    <td>{{$cpdistributor->contact}}</td>
                    <td>{{$cpdistributor->url}}</td>
                    <td>
                      <a href="{{route('cpdistributor.edit',$cpdistributor->id)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form class="d-inline"
                          onsubmit="return confirm('Apakah anda ingin menghapus contact person distributor secara permanen?')"
                          action="{{route('cpdistributor.destroy',$cpdistributor->id)}}"
                          method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">
                                  <i class="fas fa-trash"></i></button>
                      </form>
                      <a href="{{route('cpdistributor.show',$cpdistributor->id)}}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
</div>
@endsection

@push('script')
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>
@endpush
