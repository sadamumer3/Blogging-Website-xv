<?php

use App\Http\Controllers\NewsLetterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use function GuzzleHttp\Promise\all;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    // $posts = Category::all();


    return view('welcome',
    [
        // 'posts' => $posts
    ]);

});

Route::get('/index', function() {

    return view('index');

});

Route::get('/profiles', function() {

    //  $posts = User::latest()-> all();

     $posts = User::latest('id')-> with('role')->get(); //  <--- for quick get

// dd($posts);


    // $profiles = File::files(resource_path("profiles"));

    // // new method

    // $doc = collect($profiles)

    // ->map( function($temp)
    // {

    //     $file= YamlFrontMatter::parseFile($temp);

    //     $file->img = resource_path("img/moiz_pic.png");
    //     // $file->img = resource_path("img/{$file->img}");

    //     return new Profiles(

    //         $file->sno,
    //         $file->img,
    //         $file->title,
    //         $file->body()

    //     );

    // });


    // //  new old

    // // $doc = [];

    // // foreach ($profiles as $profile) {

    // //     $file= YamlFrontMatter::parseFile($profile);

    // //     $doc[] = new Profiles(

    // //        $file->sno,
    // //        $file->title,
    // //        $file->body()

    // //    );

    // //     # code...
    // // }



    // return view('profiles',
    // [
    //     'prof'=>$posts
    // ]);

    return view('profiles',
    [
        'profiles' => $posts
    ]);

});


Route::get('profiles/{profile:name}', function(User $profile) {

    $profiles = User::all();

    //  $user= User::find($profile);


    //  dd($user->password);
   // return $username;



    // $profile = file_get_contents($url);


    //  $profile = Profiles::get($username);



    // return $profile;

    return view('profile',
[
    'profile' => $profile,
    'profiles' =>$profiles
]);

})->where('id','[a-zA-Z0-9]+');

Route::get('role/{id}', function ( $id) {

    $profiles = Role::find($id);

    //  dd($profiles->user);

    return view('role',
    [
        'profiles' => $profiles->user
    ]);

});

Route::get('home',[PostController::class, 'index'])->name('home') ;

Route::get('home/{category_id}',[PostController::class, 'findCategory'] ) ;


Route::get('/post/{post:id}', [PostController::class,'findPost'] );

Route::post('/post/{post:id}/comments', [PostCommentsController::class,'store'] );


Route::get('register',[RegisterController::class, 'create'] )->middleware('guest') ;
Route::post('register',[RegisterController::class, 'store'] )->middleware('guest') ;

Route::get('login',[SessionsController::class, 'create'] )->middleware('guest') ->name('login');
Route::post('login',[SessionsController::class, 'login'] )->middleware('guest') ;

// Route::post('login',[LoginController::class, 'authenticate'] )->middleware('guest') ;


Route::post('logout',[SessionsController::class, 'destroy'] )->middleware('auth') ;


Route::post('/addMail', [NewsLetterController::class, 'addEmail']) ;

Route::get('/createPost', [PostController::class, 'createPost'])->middleware('onlyAdmin') ;
Route::post('/createPost', [PostController::class, 'storePost'])->middleware('onlyAdmin') ;
