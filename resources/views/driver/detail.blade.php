@extends('layouts.master')
@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Driver</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Driver</li>
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
          <h3 class="card-title">Detail Driver</h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link btn-danger active" href="{{ route('driver.index') }}"><i class=" fas fa-times"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <tbody>
                <tr>
                    <td style="width:15%">Avatar</td>
                    <td><img class="img-thumbnail" width="150px" src="{{asset("/uploads/".$driver->avatar)}}" alt=""></td>
                </tr>
              <tr>
                <td style="width:15%">Name</td>
                <td>{{$driver->name}}</td>
              </tr>
              <tr>
                <td style="width:15%">Email</td>
                <td>{{$driver->user->email}}</td>
              </tr>
              <tr>
                <td style="width:15%">Role</td>
                <td>
                    <small class="badge badge-info">{{$driver->user->role->name}}</small>
                </td>
              </tr>
              <tr>
                <td style="width:15%">Address</td>
                <td>{{$driver->address}}</td>
              </tr>
              <tr>
                <td style="width:15%">Phone Number</td>
                <td>{{$driver->phone}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <span style="font-size: 14px">
            <strong>Created At: </strong>{{$driver->created_at->format('l | d F Y')}} | {{$driver->created_at->format('h:i:s A')}}/ <strong>Updated At: </strong>{{$driver->updated_at->format('l | d F Y')}} | {{$driver->updated_at->format('h:i:s A')}}
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
