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
      <h1 class="m-0 text-dark">Distributor {{$distributor->name}}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Distributor</li>
        <li class="breadcrumb-item active">Transaction</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Transaction {{$distributor->name}}</h3>
              <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item pr-1">
                    <a class="btn btn-info" href="{{route('transaction.distributor.chart',$distributor->id)}}"><i class="fas fa-chart-bar"></i></a>
                    </li>
                  <li class="nav-item">
                    <a class="btn btn-primary" href="{{route('transaction.distributor.create',$distributor->id)}}"><i class="fas fa-plus"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table style="width:100%"  id="example1" class="table table-bordered table-striped dt-responsive nowrap">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Billing Date</th>
                  <th>Quantity (KL)</th>
                  <th>Total (IDR)</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($distributor->transactions as $transaction)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$transaction->billing_date}}</td>
                    <td>{{$transaction->quantity}}</td>
                    <td>Rp {{$transaction->total}}</td>
                    <td>
                        <a href="{{route('transaction.distributor.edit',$transaction->id)}}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="d-inline"
                            onsubmit="return confirm('Apakah anda ingin menghapus transactions secara permanen?')"
                            action="{{route('transaction.distributor.destroy',$transaction->id)}}"
                            method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i></button>
                        </form>
                        <a href="{{route('transaction.distributor.show',$transaction->id)}}" class="btn btn-info btn-sm">
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
