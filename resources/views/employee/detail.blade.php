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
        <li class="breadcrumb-item">Employee</li>
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
          <h3 class="card-title">Detail Employee {{$distributor->name}}</h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link btn-danger active" href="{{ route('employee.distributor.index',$distributor->id) }}"><i class=" fas fa-times"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <tbody>
                <tr>
                    <td style="width:15%">Avatar</td>
                    <td><img class="img-thumbnail" width="150px" src="{{asset("/uploads/".$employee->avatar)}}" alt=""></td>
                </tr>
              <tr>
                <td style="width:15%">Name</td>
                <td>{{$employee->name}}</td>
              </tr>
              <tr>
                <td style="width:15%">Type</td>
                <td>
                    <small class="badge {{$employee->type == 'owner'?'badge-danger':'badge-info'}}">{{$employee->type}}</small>
                </td>
              </tr>
              <tr>
                <td style="width:15%">Address</td>
                <td>{{$employee->address}}</td>
              </tr>
              <tr>
                <td style="width:15%">Phone Number</td>
                <td>{{$employee->phone}}</td>
              </tr>
              <tr>
                <td style="width:15%">Email</td>
                <td>{{$employee->user->email}}</td>
              </tr>
              <tr>
                <td style="width:15%">Distributor</td>
                <td><a href="{{route('distributor.show',$distributor->id)}}">{{$distributor->name}}</a></td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <span style="font-size: 14px">
            <strong>Created At: </strong>{{$employee->created_at->format('l | d F Y')}} | {{$employee->created_at->format('h:i:s A')}}/ <strong>Updated At: </strong>{{$employee->updated_at->format('l | d F Y')}} | {{$employee->updated_at->format('h:i:s A')}}
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
