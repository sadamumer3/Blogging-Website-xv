<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            dd(
                $credentials,

                Auth::attempt(request()->only('email', 'password'))
                // Auth::attempt(['email' => $user['email'], 'password' => $user['password']])

            );

            return redirect()->intended('dashboard');
        }
        else
        {
            dd(
                $credentials,

                Auth::attempt($credentials)
                // Auth::attempt(['email' => $user['email'], 'password' => $user['password']])

            );
        }
    }

    public function login()
    {

        $data =  request()->validate([

            'email' => ['required','email'],
            'password' => ['required']
        ]);


        $user = Array(

            'email' => 'katharina.lynch@lockman.com',
            'password' => 'sadam123'

        );


        if(

            // Auth::attempt($data)
            Auth::attempt(['email' => $data['email'], 'password' => $data['password']])
            )
        {
            session()->flash('userMsg','Welcome 😊😊😊, \n Your Account is Logged In Successfully !!! ');
            return redirect('home');

        }
        else
        {
            session()->flash('userErr','Sorry 😵😵😵, \n Incorrect Email Or Password !!! ');

            return redirect('login');
        }

    }
}
