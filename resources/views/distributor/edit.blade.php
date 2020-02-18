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
                  <h3 class="card-title">Update Distributor</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('distributor.update',$distributor->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">name <span class="text-danger">*</span> </label>
                          <div class="col-sm-6 col-lg-6 col-md-6">
                            <input type="text" value="{{$distributor->name}}" class="form-control" id="name" name="name" placeholder="name">
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="member" class="col-sm-2 col-form-label">Member <span class="text-danger">*</span></label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                              <select class="select2" id="select-category" name="member" data-placeholder="Select Category" style="width: 100%;">
                                    <option value="silver" {{$distributor->member == 'silver'?'selected':''}}>Silver</option>
                                    <option value="gold" {{$distributor->member == 'gold'?'selected':''}}>Gold</option>
                                    <option value="platinum" {{$distributor->member == 'platinum'?'selected':''}}>Platinum</option>
                              </select>
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="text" value="{{$distributor->address}}" class="form-control" id="address" name="address" placeholder="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone Number<span class="text-danger">*</span></label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="text" value="{{$distributor->phone}}" class="form-control" id="phone" name="phone" placeholder="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="text" value="{{$distributor->email}}" class="form-control" id="email" name="email" placeholder="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="text" value="{{$distributor->website}}" class="form-control" id="website" name="website" placeholder="website">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Logo</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <img class="img-thumbnail" id="image_con" width="150px" src="{{asset('/storage/'.$distributor->logo)}}" alt="">
                              <input type="file" class="form-control" id="image" name="logo">
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
