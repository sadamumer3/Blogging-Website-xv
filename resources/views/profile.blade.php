

@extends('components/layout')


@section('content')



    <section style="background-color:{{$profile->id==10 ? 'red':''}};">

        <code>{!! $profile->id !!} {{ $profile->role->name }}</code>

        <img src="{{asset($profile->image) }}" alt=" No profile Image Found">


        <a href="profiles/<?=$profile->id ?>">

            <h1>{!! $profile->name !!}</h1>

        </a>

        <p>{!! $profile->password !!}</p>


    </section>
    <hr>


    @endsection





