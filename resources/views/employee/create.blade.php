@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
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
        <li class="breadcrumb-item">Employee</li>
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
                  <h3 class="card-title">Create Employee {{$distributor->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('employee.distributor.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">name <span class="text-danger">*</span> </label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone Number <span class="text-danger">*</span></label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input value="{{old('phone')}}" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="phone">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input value="{{old('address')}}" type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Type <span class="text-danger">*</span></label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="custom-control custom-radio ">
                                <input class="custom-control-input @error('type') is-invalid @enderror" type="radio" id="employee" name="type" value="employee" {{old('type') == 'employee'?'checked':''}}>
                                <label for="employee" class="custom-control-label">Employee</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input @error('type') is-invalid @enderror" type="radio" id="owner" name="type" value="owner" {{old('type') == 'owner'?'checked':''}}>
                                <label for="owner" class="custom-control-label">Owner</label>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Avatar</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <img class="img-thumbnail mb-2" id="image_con" width="150px" src="{{asset('/uploads/images/default.jpg')}}" alt="">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="avatar">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                      </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                      <input type="hidden" name="distributor_id" value="{{$distributor->id}}">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{route('employee.distributor.index',$distributor->id)}}" class="btn btn-default">Back</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
@endsection

@push('script')
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
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
        const error = '{{ $errors->first() }}'
        if (error) {
            Toast.fire({
                type: 'error',
                title: 'Employee create failed'
            })
        }
    });
</script>
@endpush
