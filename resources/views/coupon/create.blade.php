@extends('layouts.master')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Distributor {{$distributor->name}}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Distributor</li>
        <li class="breadcrumb-item">Coupon</li>
        <li class="breadcrumb-item active">Add</li>
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
                  <h3 class="card-title">Add Coupon For {{$distributor->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{route('distributor.coupon.store')}}" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="coupon" class="col-sm-2 col-form-label">Total Coupon <span class="text-danger">*</span> </label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input value="{{old('coupon')}}" type="number" class="form-control  @error('coupon') is-invalid @enderror" id="coupon" name="coupon" placeholder="coupon">
                            @error('coupon')
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
                    <a href="{{route('distributor.coupon.index',$distributor->id)}}" class="btn btn-default">Back</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
@endsection
