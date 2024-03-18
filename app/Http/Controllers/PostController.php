<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Collection;

class PostController extends Controller
{
    //

    public static function index()
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



        return view('home',
    [
        'curCategory' => 0,
        'allCategories' =>  $allCategory,
        'posts' => $posts-> simplePaginate(6)
    ]);

    }

    public function findCategory( $category_id )
    {

        // $curCategory = Category::find($category_id);
         $curCategory = $category_id;
        $allCategory = Category::all();
        $resCategory = Post::latest();
        // $category_id = Post::where('category_id',$category_id)->get();



        if (request('search'))
        {

        // $resCategory =
         $resCategory
        ->where('title','like','%'.request('search').'%')
        // ->orWhere('body','like','%'.request('search').'%')
        ;


        }
        else
        {
            $resCategory-> where('category_id',$category_id);
        }

        //  dd();
        return view('home',
    [
        'curCategory' => $curCategory,
        'allCategories' => $allCategory,
        'posts' => $resCategory->get()
    ]);

    }

    public function findPost( $id )
    {
        $post = Post::find($id);


        return view('post',
     [
        'post' => $post

        ]);

    }

    public function findP( $title )
    {
        $allCategory = Category::all();
        $posts = Post::latest();


        if (request('search'))
        {

        $posts =
         $posts
        ->where('title','like','%'.request('search').'%')
        // ->orWhere('body','like','%'.request('search').'%')
        ;


        }



        return view('home',
    [
        'curCategory' => 0,
        'allCategories' => $allCategory,
        'posts' => $posts-> get()
    ]);

    }

    public function createPost()
    {

        return view('createPost');
    }

    public function storePost(Request $request)
    {


        //  $path=        $request->file('thumbnail')->store('thumbnails');
////     $path = $request->file('thumbnail')->store('thumbnails');
//
//     dd($path);

//        dd($request->all());

        $data = $request->validate(
            [
                'title' => ['required'],
                'excerpt' => ['required'],
                'body' => ['required'],
                'thumbnail' => ['required'],
                'category_id'=> ['required',Rule::exists('Categories','id')]

            ]
        );

        $path = $request->file('thumbnail')->store('thumbnails');

        $data['author_id'] = auth()->id();
        $data['thumbnail'] = $path;

       $check = Post::factory()->create($data);

        session()->flash('userMsg','Your Post is Published Successfully !!! ');

        $id = $check->where('title',$data['title'])->get('id',0);
        $id = $id[0]->id;

        return
//            redirect('/home');
            redirect('/post/'.$id);


    }

}
