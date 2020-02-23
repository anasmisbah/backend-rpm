@extends('layouts.master')
@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Promo</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Promo</li>
        <li class="breadcrumb-item active">Detail</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Promo Detail</h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link btn-danger active" href="{{ route('promo.index') }}"><i class=" fas fa-times"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td style="width:10%">Name</td>
                <td>{{$promo->name}}</td>
              </tr>
              <tr>
                <td style="width:10%">Point</td>
                <td>{{$promo->point}}</td>
              </tr>
              <tr>
                <td style="width:10%">Total Promo</td>
                <td>{{$promo->total}}</td>
              </tr>
              <tr>
                <td style="width:10%">Status</td>
                <td>
                    <small class="badge {{$promo->status == 'normal'?'badge-info':'badge-danger'}}"><i class="fas fa-tag"></i> {{$promo->status}}</small>
                </td>
              </tr>
              <tr>
                <td style="width:10%">Description</td>
                <td>{{$promo->description}}</td>
              </tr>
              <tr>
                <td style="width:10%">Image</td>
                <td><img class="img-thumbnail" width="150px" src="{{asset("/uploads/".$promo->image)}}" alt=""></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <span style="font-size: 14px">
            <strong>Created At: </strong>{{$promo->created_at->format('l | d F Y')}} | {{$promo->created_at->format('h:i:s A')}}/ <strong>Updated At: </strong>{{$promo->updated_at->format('l | d F Y')}} | {{$promo->updated_at->format('h:i:s A')}}
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
