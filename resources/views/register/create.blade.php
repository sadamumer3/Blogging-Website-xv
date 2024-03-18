

<x-iLayout :post="$posts[0]"   :allCategories="$allCategories" :curCategory="$curCategory"  >

    <h1>Register</h1>


    <form action="/register" method="post" class="form-fluid">
@csrf
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
          </div>

          @error('name')

          <p class="text-red-500 text-xs"> {{ $message }} </p>

          @enderror

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email"  value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          @error('email')

          <p class="text-red-500 text-xs"> {{ $message }} </p>

          @enderror

          <div class="form-group">
            <label for="exampleInputPassword1">Country</label>
            <input type="text" name="country" value="{{ old('country') }}"  class="form-control" id="exampleInputPassword1" placeholder="country">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" value="{{ old('password') }}"  class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>

        @error('country')

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
</x-iLayout>
