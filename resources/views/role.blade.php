

@extends('layout')

@section('content')



@foreach ($profiles as $profile)

<div class="row" style="margin-left:30px;float:left;background-color:{{$profile->id==1 ? 'red':''}};">

     <img src="{{asset($profile->image) }}" alt=" No profile Image Found">

     <br>

    <code>{!! $profile->id !!} <hr>  {{ $profile->role->name }}</code>



    <a href="profiles/{{$profile->name }}">

        <h1>{!! $profile->name !!}</h1>

    </a>

    <p>{!! $profile->detail !!}</p>


</div>

    @endforeach

@endsection
{{--

@section('greet');

<h1>Section: greet</h1>

@endsection --}}
