

<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>

    html{
        scroll-behavior: smooth;
    }

    #msg
    {

        z-index: 9;
        left 0;
        position: fixed;
        width: 100%;
        top: o;

    }
    .mbar {

        font-size: large;
        height: 30px;
        width: 100%;
        margin: 5px;
        border: 1px solid #aaa;

    }
    .info {

        overflow: hidden;
        text-align: center;
        color: green;
      background: #b0fab0;

        border: 1px solid #92aad4;

    }
    .err {

        overflow: hidden;
        text-align: center;
        color: #ff1a1a;
      background: #f5c4c4;
      border: 1px solid #ff6a6a;

    }
    </style>


<body  style="font-family: Open Sans, sans-serif">

    <div id="msg">
        <x-flash />
    </div>

<script>

$('document').ready(function() {

    $('.err').slideDown();

setTimeout(function() {

$('#msg').animate({
    height: 'hide'
  });

}, 3000); // <-- time in milliseconds


});

</script>
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/home">
                    <img src="/img/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex item-center">

                @auth


                <span class="text-md font-bold capitalise">
                   Welcome, {{Auth::user()->name}}
                </span>

                <form action="/logout" method="post">

                    @csrf
                    <button class="text-blue-500 text-xs ml-5 font-bold uppercase">Log Out </button>

                </form>
                @else

                <a href="/login" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Log In </a>

                <a href="/register" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Log Up </a>

                @endauth

                <a href="#newsLetter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>


{{ $slot }}


<footer id="newsLetter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
    <img src="/img/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
    <h5 class="text-3xl">Stay in touch with the latest posts</h5>
    <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

            <form method="post" action="/addMail" class="lg:flex text-sm">

                @csrf

                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        <img src="/img/mailbox-icon.svg" alt="mailbox letter">
                    </label>

                    <input required name="EmailInNewsLetter" id="email" type="text" placeholder="Your email address"
                           class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                </div>

                <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                >
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</footer>
</section>
</body>

