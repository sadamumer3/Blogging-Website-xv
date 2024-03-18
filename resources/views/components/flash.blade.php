

@if (session()->has('userMsg'))



    <div class="mbar info">{{session()->get('userMsg') }}</div>
    {{-- <p class="text-red-500">{{session()->get('userCreated') }}</p> --}}

    @endif

    @if (session()->has('userErr'))


    <div class="mbar err">{{session()->get('userErr') }}</div>
    {{-- <p class="text-red-500">{{session()->get('userCreated') }}</p> --}}


    @endif

    @if (count( $errors)>0)

    @foreach ($errors->all() as $error)

    <div id="mbar" class="mbar err">{{$error}} </div>
    <br>



    @endforeach

    @endif
