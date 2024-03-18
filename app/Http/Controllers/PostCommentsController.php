<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    //

    public function store(Post $post)
    {

       request()->validate(
            [
                'body' => ['required','min:5','max:500']

            ]
            );

           if ( $post->comments()->create(
                [
                    'post_id'=> $post->id,
                    'author_id'=> auth()->id(),
                    'body'=> request('body')
                ]
                )
           )
           {

               session()->flash('userMsg',' Your Comment has been Posted. ');

           }
           else
           {
               session()->flash('userErr','Sorry 😒😒😒, \n Something Went Wrong !!! ');
           }


                return back();
    }
}
