<?php

namespace App\Http\Controllers;

use App\services\Newsletter;
use Exception;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    //

    public function  addEmail(Request $request){

//        session()->flash('userMsg','Your have Subscribed Successfully !!!');
//
//        session()->flash('userErr','Something Went Wrong');
//
//        return redirect('home#newsLetter');


//    dd(config('services.mailchimp.key'));

        $data = $request->validate(
            [

                'EmailInNewsLetter' => ['required','email']

            ]
        );




        try
        {

            $newsLetter = new Newsletter();

            $newsLetter->subscribe($data['EmailInNewsLetter']);

        }
        catch (Exception $e)
        {
            session()->flash('userErr','Something Went Wrong !!! Please Try Again ');


            return redirect('home#newsLetter');
        }


            session()->flash('userMsg','Your have Subscribed Successfully !!!');

        return back();

    }
}
