

<x-iLayout  >

    <div  class="f\ex ites-center">

    <h1>Register</h1>


    <form action="/login" method="post" class="form-fluid">
@csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email"  value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

            @error('email')

          <p class="text-red-500 text-xs"> {{ $message }} </p>

          @else
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

          @enderror

          </div>



          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" value="{{ old('password') }}"  class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>

        @error('password')

          <p class="text-red-500 text-xs"> {{ $message }} </p>

          @enderror

          <button type="submit" class="btn btn-primary">Submit</button>

    </form>

    @if (count( $errors)>0)

    <hr>

    <div style="text-align:center">

        <h2>Error List </h2>

<ol>

    @endif

    @foreach ($errors->all() as $error)

    <li class="text-red-500"> {{$error}} </li>


    @endforeach
</ol>

</div>

    </div>
</x-iLayout>
