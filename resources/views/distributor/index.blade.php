@extends('layouts.master')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endpush

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Distributor</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Distributor</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Distributor</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('distributor.create')}}"><i class="fas fa-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table style="width:100%" id="example1" class="table table-bordered table-striped dt-responsive nowrap">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Member</th>
                  <th>Reward</th>
                  <th>Logo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($distributors as $distributor)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$distributor->name}}</td>
                    <td>
                        @if ($distributor->member == 'silver')
                        <small class="badge badge-info"> {{$distributor->member}}</small>
                        @elseif($distributor->member == 'gold')
                        <small class="badge badge-warning"> {{$distributor->member}}</small>
                        @else
                        <small class="badge badge-danger"> {{$distributor->member}}</small>
                        @endif
                    </td>
                    <td>{{$distributor->reward}}</td>
                    <td><img class="img-thumbnail" width="50px" src="{{asset("/uploads/".$distributor->logo)}}" alt=""></td>
                    <td>
                        <a data-toggle="tooltip" data-placement="top" title="Employee" href="{{route('employee.distributor.index',$distributor->id)}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-users"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Coupon" href="{{route('distributor.coupon.index',$distributor->id)}}" class="btn btn-info btn-sm">
                            <i class="fas fa-credit-card"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Transaction" href="{{route('transaction.distributor.index',$distributor->id)}}" class="btn btn-info btn-sm">
                            <i class="fas fa-chart-pie"></i>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('distributor.edit',$distributor->id)}}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="d-inline"
                            onsubmit="return confirm('Apakah anda ingin menghapus distributors secara permanen?')"
                            action="{{route('distributor.destroy',$distributor->id)}}"
                            method="POST">
                                @csrf
                                @method('DELETE')
                                <button data-toggle="tooltip" data-placement="top" title="Delete" type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i></button>
                        </form>
                        <a data-toggle="tooltip" data-placement="top" title="Detail"  href="{{route('distributor.show',$distributor->id)}}" class="btn btn-info btn-sm">
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
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable();
      $('.btn').tooltip({ boundary: 'window' })
    });
  </script>
<script>
    $(function() {
        const status = '{{ Session("status") }}'

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        if (status) {
            Toast.fire({
                type: 'success',
                title: status
            })
        }
    });
</script>
@endpush
