@extends('layouts.master')

@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endpush

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Promo</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Promo</li>
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
                  <h3 class="card-title">Update Promo</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('promo.update',$promo->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-6 col-lg-6 col-md-6">
                        <input type="text" class="form-control" value="{{$promo->name}}" id="name" name="name" placeholder="name promo">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="point" class="col-sm-2 col-form-label">Point</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <input type="number" class="form-control" value="{{$promo->point}}" id="point" name="point" placeholder="point">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="total" class="col-sm-2 col-form-label">Total Promo</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <input type="number" class="form-control" value="{{$promo->total}}" id="total" name="total" placeholder="total">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <textarea id="description" class="form-control" id="description" name="description">{{ $promo->description }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <select class="form-control"  name="status" id="status">
                            <option value="normal" {{$promo->status == "normal"?'selected':''}}>Normal</option>
                            <option value="hot" {{$promo->status == "hot"?'selected':''}}>Hot</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <img class="img-thumbnail" id="image_con" width="150px" src="{{asset("/storage/".$promo->image)}}" alt=""><br>
                            <span class="mt-2">kosongkan jika tidak ingin mengubah image</span>
                          <input type="file" id="image" class="form-control" id="image" name="image">
                        </div>
                      </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{route('promo.index')}}" class="btn btn-default">Back</a>
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
        const error = '{{ $errors->first() }}'
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

        if (error) {
            Toast.fire({
                type: 'error',
                title: error
            })
        }
    });
</script>
@endpush
