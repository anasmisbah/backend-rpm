@extends('layouts.master')

@push('css')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endpush

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Contact Person</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Contact Person</li>
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
                  <h3 class="card-title">Create Contact Person</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('contactperson.store')}}" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="contact" class="col-sm-2 col-form-label">contact</label>
                      <div class="col-sm-6 col-lg-6 col-md-6">
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Person">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <input type="text" class="form-control" id="url" name="url" placeholder="company url">
                        </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{route('contactperson.index')}}" class="btn btn-default">Back</a>
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
