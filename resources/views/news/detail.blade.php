@extends('layouts.master')
@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">News</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item">News</li>
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
          <h3 class="card-title">News Detail</h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link btn-danger active" href="{{ route('news.index') }}"><i class=" fas fa-times"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td style="width:10%">Name</td>
                <td>{{$news->title}}</td>
              </tr>
              <tr>
                <td style="width:10%">Image</td>
                <td><img class="img-thumbnail" width="150px" src="{{asset("/uploads/".$news->image)}}" alt=""></td>
              </tr>
              <tr>
                <td style="width:10%">Category</td>
                <td>
                    @foreach ($news->category as $item)
                        <small class="badge badge-info"><i class="fas fa-tag"></i> {{$item->name}}</small>
                    @endforeach
                </td>
              </tr>
              <tr>
                <td style="width:10%">Description</td>
                <td>{!!$news->description!!}</td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <span style="font-size: 14px">
            <strong>Created At: </strong>{{$news->created_at->format('l | d F Y')}} | {{$news->created_at->format('h:i:s A')}}/ <strong>Updated At: </strong>{{$news->updated_at->format('l | d F Y')}} | {{$news->updated_at->format('h:i:s A')}}
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
