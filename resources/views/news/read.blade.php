
@extends('layouts.post')
@section('description')
<p class="text-left  text-bold h5">{{$news->title}}</p>
<hr style="border-top: 1px solid black">
<p><i class="fa fa-clock"></i>{{" ".$news->created_at->format('d F Y')}}</p>
<img src="{{asset('/uploads/'.$news->image)}}" class="img-fluid" alt="">
{!! $news->description !!}
@endsection
