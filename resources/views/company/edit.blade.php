@extends('layouts.master')

@push('css')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endpush

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Company Profile {{$company->name}}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Company Profile</li>
        <li class="breadcrumb-item active">Update</li>
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
                  <h3 class="card-title">Update Company Profile {{$company->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-6 col-lg-6 col-md-6">
                        <input type="text" class="form-control" value="{{$company->name}}" id="name" name="name" placeholder="Company Name">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input type="text" class="form-control" value="{{$company->description}}" id="description" name="description" placeholder="Company description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input type="email" class="form-control" value="{{$company->email}}" id="email" name="email" placeholder="Company email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input type="text" class="form-control" value="{{$company->phone}}" id="phone" name="phone" placeholder="Company phone number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="website" class="col-sm-2 col-form-label">Website</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input type="text" class="form-control" value="{{$company->website}}" id="website" name="website" placeholder="Company website">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Profile (Pdf)</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input type="file" class="form-control" id="image" name="profile">
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{route('company.index')}}" class="btn btn-default">Back</a>
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
@endpush
