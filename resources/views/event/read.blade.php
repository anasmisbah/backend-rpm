@extends('layouts.post')
@section('description')
<h5 class="text-center text-bold">{{$event->title}}</h5>
<img src="{{asset('/uploads/'.$event->image)}}" class="img-fluid" alt="">
{!! $event->description !!}
@endsection
