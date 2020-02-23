@extends('layouts.master')

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endpush

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Distributor</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Distributor</li>
        <li class="breadcrumb-item active">Point</li>
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
                  <h3 class="card-title">Update Point {{$distributor->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('distributor.point.update',$distributor->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="loyalty" class="col-sm-2 col-form-label">Loyalty Point <span class="text-danger">*</span> </label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="number" value="{{$distributor->loyalty}}" class="form-control" id="loyalty" name="loyalty" placeholder="loyalty">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reward" class="col-sm-2 col-form-label">reward Point <span class="text-danger">*</span> </label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="number" value="{{$distributor->reward}}" class="form-control" id="reward" name="reward" placeholder="reward">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="coupon" class="col-sm-2 col-form-label">coupon Point <span class="text-danger">*</span> </label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="number" value="{{$distributor->coupon}}" class="form-control" id="coupon" name="coupon" placeholder="coupon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="transaction" class="col-sm-2 col-form-label">transaction Point <span class="text-danger">*</span> </label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="number" value="{{$distributor->transaction}}" class="form-control" id="transaction" name="transaction" placeholder="transaction">
                            </div>
                        </div>
                      </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{route('distributor.index')}}" class="btn btn-default">Back</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
@endsection

@push('script')
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('#select-category').select2()
    $('#description').summernote()
  });
</script>
<script>
    //menampilkan foto setiap ada perubahan pada modal tambah
    $('#image').on('change', function() {
        readURL(this);
    });
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_con').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
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
