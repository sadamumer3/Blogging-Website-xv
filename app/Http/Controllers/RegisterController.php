<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    //

    public function create()
    {
        $allCategory = Category::all();
        $posts = Post::latest();

        if (request('search'))
        {

        $posts =
         $posts
        ->where('title','like','%'.request('search').'%')
        ->orWhere('body','like','%'.request('search').'%');


        }



        return view('register/create',
    [
        'curCategory' => 0,
        'allCategories' => $allCategory,
        'posts' => $posts-> simplePaginate(6)
    ]);

    }

    public function store()
    {

      $data =  request()->validate([

            'name' => ['required','min:3','max:16', Rule::unique('authors','name') ],
            'email' => ['required','email','max:25',Rule::unique('authors','email') ],
            'country' => ['required','min:6','max:12'],
            'password' => ['required','min:6','max:12']
        ]);

        $data['name'] = ucwords($data['name']);
        $data['password'] = bcrypt($data['password']);

      if( $author = Author::create( $data ) )
      {

          //    auth()->login($user);
          Auth::login($author);

          //  session()-> put('userMsg','Account Created Successfully !!! ');
          session()->flash('userMsg','Welcome 😊😊😊, \n Your Account is Created Successfully !!! ');
          return redirect('home');

      }
      else{

          session()->flash('userErr','Sorry 😒😒😒, \n Something Went Wrong !!! ');
          return redirect('login');

      }


    // dd(session()->get('userMsg'));



        // dd('✔');
    }
}
