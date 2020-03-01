@extends('layouts.master')

@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endpush

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Distributor {{$distributor->name}}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Distributor</li>
        <li class="breadcrumb-item">Transaction</li>
        <li class="breadcrumb-item active">create</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Create Transaction {{$distributor->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('transaction.distributor.store')}}" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="no_so" class="col-sm-2 col-form-label">No SO <span class="text-danger">*</span> </label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <input type="text" class="form-control" id="no_so" name="no_so" placeholder="No SO">
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="billing_date" class="col-sm-2 col-form-label">Billing Date <span class="text-danger">*</span> </label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="input-group date" id="billing_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#billing_date" name="billing_date"/>
                                <div class="input-group-append" data-target="#billing_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="quantity" class="col-sm-2 col-form-label">Quantity <span class="text-danger">*</span> </label>
                      <div class="col-sm-6 col-lg-6 col-md-6">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="total" class="col-sm-2 col-form-label">Total<span class="text-danger">*</span></label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input type="number" class="form-control" id="total" name="total" placeholder="total">
                        </div>
                    </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                      <input type="hidden" name="distributor_id" value="{{$distributor->id}}">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{route('transaction.distributor.index',$distributor->id)}}" class="btn btn-default">Back</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
@endsection

@push('script')
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
  $(function () {
        $('#pricing_date').datetimepicker({
                format: 'L',
                format: 'YYYY-MM-D'
        });
        $('#billing_date').datetimepicker({
                format: 'L',
                format: 'YYYY-MM-D'
        });
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
