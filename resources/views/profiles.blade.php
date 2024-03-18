
@extends('components/layout')

@section('content')



@foreach ($profiles as $profile)

<div class="row" style="background-color:{{$profile->is_active==1 ? 'red':''}};">

    {{-- <code>{!! $profile->name !!} --}}

    <img src="{{asset($profile->image) }}" alt=" No profile">


        <hr>
        <a href="role/<?=$profile->role->id ?>">

            {{ $profile->role->name }}

        </a>

    </code>



    <a href="profiles/<?=$profile->name ?>">

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
