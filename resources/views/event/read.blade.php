@extends('layouts.post')
@section('description')
<p class="text-left  text-bold h5">{{$event->title}}</p>
<hr style="border-top: 1px solid black">
<p><i class="fa fa-clock"></i>{{" ".$event->created_at->format('d F Y')}}</p>
<img src="{{asset('/uploads/'.$event->image)}}" class="img-fluid" alt="">
{!! $event->description !!}
@endsection
