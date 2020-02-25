
@extends('layouts.post')
@section('description')
<h5 class="text-center text-bold">{{$news->title}}</h5>
<img src="{{asset('/uploads/'.$news->image)}}" class="img-fluid" alt="">
{!! $news->description !!}
@endsection
