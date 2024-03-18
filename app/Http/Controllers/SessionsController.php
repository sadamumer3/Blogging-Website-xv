<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Author;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    //

    public function create()
    {


//        $allCategory = Category::all();
//        $posts = Post::latest();
//
        return view('login',
        [
//            'curCategory' => 0,
//            'allCategories' => $allCategory,
//            'posts' => $posts-> simplePaginate(6)
        ]);

    }

    public function login()
    {
        $data =  request()->validate([

            'email' => ['required','email'],
            'password' => ['required']
        ]);


        if(

            Auth::attempt($data)
            // Auth::attempt(['email' => $data['email'], 'password' => $data['password']])
            )
        {
            session()->regenerate();

            session()->flash('userMsg','Welcome 😊😊😊, \n Your Account is Logged In Successfully !!! ');
            return redirect('home');

        }
        else
        {
            session()->flash('userErr','Sorry 😵😵😵, \n Incorrect Email Or Password !!! ');

            // return back()->withErrors(['email'=>'Email or Password did not match.']);

            throw ValidationException::withMessages(
                [
                    'email'=>'Something went Wrong'
                ]
                );
        }

    }
    public function destroy()
    {
        Auth::logout();

      session()->flash('userErr','GoodBye 😒😒😒, \n Your Account is logged Out Successfully !!! ');

        return redirect('/home');
    }
}



//   for encryption --->  Crypt::encrypt(),
//   for decryption --->  Crypt::decrypt()
