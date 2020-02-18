@extends('layouts.master')
@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Company Profile {{$company->name}}</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">Company Profile</li>
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
          <h3 class="card-title">Company Profile {{$company->name}}</h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link btn-warning active" href="{{ route('company.edit') }}"><i class=" fas fa-edit"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <tbody>
                <tr>
                    <td style="width:15%">Logo</td>
                    <td><img class="img-thumbnail" width="150px" src="{{asset("/storage/".$company->logo)}}" alt=""></td>
                </tr>
                <tr>
                    <td style="width:10%">Name</td>
                    <td> <strong>{{$company->name}}</strong></td>
                </tr>
                <tr>
                    <td style="width:10%">Description</td>
                    <td>{{$company->description}}</td>
                </tr>
                <tr>
                    <td style="width:10%">Contact</td>
                    <td>{{$company->contact}}</td>
                </tr>
                <tr>
                    <td style="width:10%">Unduh</td>
                    <td><a href="{{route('company.profile.download')}}" class="btn btn-info btn-sm">Unduh Profile</a></td>
                </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <span style="font-size: 14px">
            <strong>Created At: </strong>{{$company->created_at->format('l | d F Y')}} | {{$company->created_at->format('h:i:s A')}}/ <strong>Updated At: </strong>{{$company->updated_at->format('l | d F Y')}} | {{$company->updated_at->format('h:i:s A')}}
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
