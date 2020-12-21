<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Route::get("/post/{id}/{name?}",function ($id,$name=null){
//
//    return "ای دی این پست برابر است:"." ".$id." $name";
//});


//Route::get("admin/posts/example",function (){
//
//    $url=route('admin');
//    return "این ادرس برای صفحه مدیریت می باشدو url برابر است:".$url;
//})->name('admin');

//Route::get("admin/login",function (){
//   return "صفحه مدیریت";
//});

//Route::redirect('admin/login','admin/posts/example',301);


//Route::get('/posts',[\App\Http\Controllers\PostsController::class,'index']);
//
//Route::post('/posts',[\App\Http\Controllers\PostsController::class,'create']);

Route::resource('/posts', \App\Http\Controllers\PostsController::class);

//Route::get('/posts/{id?}',[\App\Http\Controllers\PostsController::class,'index']);

//Route::get('/show-view/{id}/{name}/{password}', [\App\Http\Controllers\PostsController::class, 'showMyView']);
//
//Route::get('/contact',[\App\Http\Controllers\PostsController::class,'contact']);
//Route::get('/insert',[\App\Http\Controllers\PostsController::class,'insert']);
//Route::get('/select',[\App\Http\Controllers\PostsController::class,'select']);
//Route::get('/update',[\App\Http\Controllers\PostsController::class,'updatePost']);
//Route::get('/delete',[\App\Http\Controllers\PostsController::class,'deletePost']);
//
//Route::get('getallpost',[\App\Http\Controllers\PostsController::class,'getAllPost']);
//Route::get('savepost',[\App\Http\Controllers\PostsController::class,'savePost']);
//Route::get('updatepost',[\App\Http\Controllers\PostsController::class,'newUpdatePost']);
//Route::get('/deletepost',[\App\Http\Controllers\PostsController::class,'newDeletePost']);
//Route::get('trash',[\App\Http\Controllers\PostsController::class,'workWithTrash']);
//Route::get('restorepost',[\App\Http\Controllers\PostsController::class,'restorePost']);
//Route::get('forcedelete',[\App\Http\Controllers\PostsController::class,'forceDelete']);


/////Eloquent Relationship

//one to one
//Route::get('user/{id}/posts',function ($id){
//    $user_post=\App\Models\User::find($id)->post->content;
//    return $user_post;
//});
//
//Route::get('post/{id}/user',function ($id){
//   $post_user= \App\Models\Post::find($id)->user->email;
//   return $post_user;
//});

///one to many

//Route::get('user/{id}/posts',function ($id){
////   return \App\Models\User::find($id)->posts;
//    $userPost=\App\Models\User::find($id)->posts;
//    foreach ($userPost as $post)
//    {
//        echo $post->title;
//        echo "<br>";
//    }
//});

// Many to Many

//Route::get('user/{id}/roles',function ($id){
//   $user=\App\Models\User::find($id);
//   foreach ($user->roles as $role)
//   {
//       echo $role->name;
//       echo "<br>";
//   }
//});

//Route::get('user/pivot',function (){
//    $user = \App\Models\User::find(1);
//    foreach ($user->roles as $role)
//    {
//        echo $role->pivot->created_at;
//        echo "<br>";
//    }
//});

// Many has Through

//Route::get('user/country',function (){
//    $usercountry= \App\Models\Country::find(1);
//    foreach ($usercountry->posts as $post)
//    {
//        echo $post->title;
//        echo "<br>";
//    }
//});

// polymorphic Relationship
//
//Route::get('user/photos',function (){
//    $user = \App\Models\User::find(1);
//    foreach ($user->photos as $photo){
//        echo $photo->path;
//
//    }
//});
//
//Route::get('photo/{id}/post',function ($id){
//    $photo = \App\Models\Photo::find($id);
//    return $photo->imageable;
//});
//
//Route::get('post/tags',function (){
//    $post = \App\Models\Post::find(1);
//    foreach ($post->tags as $tag){
//        echo $tag->name;
//    }
//});
//
//Route::get('video/tags',function (){
//    $video = \App\Models\Video::find(1);
//    foreach ($video->tags as $tag){
//        echo $tag->name;
//    }
//});
//
//Route::get('tag/{id}/post',function ($id){
//    $tag = \App\Models\Tag::find($id);
//    foreach ($tag->posts as $post){
//        echo $post->title;
//    }
//});


/// CRUD onr to Many Relationship
//Route::get('/create',function (){
//    $user=\App\Models\User::find(1);
//    $post=new \App\Models\Post();
//    $post->title='یک پست جدید با رابط one to Many';
//    $post->content='توضیحات کاتنت';
//    $user->posts()->save($post);
//});
//
//Route::get('/read',function (){
//   $user=\App\Models\User::find(1);
//   foreach ($user->posts as $post){
//       echo $post->title;
//       echo "<br>";
//   }
//});
//
//Route::get('update',function (){
//    $user = \App\Models\User::find(1);
//    $user->posts()->whereId(2)->update(['title'=>'update crud','content'=>'content new']);
//});
//
//Route::get('delete',function (){
//   $user = \App\Models\User::find(1);
//   $user->posts()->whereId(10)->delete();
//});
//// CRUD Many to Many Relationship

//Route::get('/create',function (){
//   $user = \App\Models\User::find(1);
//   $role = new \App\Models\Role();
//   $role->name = 'نویسنده';
//   $user->roles()->save($role);
//});
//
//Route::get('read',function (){
//   $user = \App\Models\User::find(1);
//   foreach ($user->roles as $role){
//       echo $role->name;
//       echo "<br>";
//   }
//});
//
//Route::get('update',function (){
//    $user = \App\Models\User::find(1);
//    if ($user->has('roles')){
//        foreach ($user->roles as $role){
//            if ($role->name == 'نویسنده'){
//                $role->name = 'Author';
//                $role->save();
//            }
//        }
//    }
//});
//
//Route::get('delete',function (){
//    $user = \App\Models\User::find(1);
//    foreach ($user->roles as $role){
//        if ($role->name == 'Author'){
//            $role->delete();
//        }
//    }
//});
//
//Route::get('detach',function (){
//    $user = \App\Models\User::find(1);
//    $user->roles()->detach();
//});
//
//Route::get('attach',function (){
//   $user = \App\Models\User::find(1);
//   $user->roles()->attach(1);
//});
//
//Route::get('sync',function (){
//   $user = \App\Models\User::find(1);
//   $user->roles()->sync([1,2,3]);
//});

/// CRUD polymorph Relationship
//Route::get('create',function (){
//    $video=\App\Models\Video::find(1);
//    $video->tags()->create(['name'=>'morph videos']);
//});

//Route::get('read',function (){
//    $video = \App\Models\Video::find(1);
//    foreach ($video->tags as $tag){
//        echo $tag->name;
//        echo "<br>";
//    }
//});
//
//Route::get('update',function (){
//    $video = \App\Models\Video::find(1);
////    $tag = $video->tags;
////    $newTag =$tag->where('id',3)->first();
//    $newTag=$video->tags->where('id',3)->first();
////    dd($newTag);
//    $newTag->name = 'تگ جدید';
//    $newTag->save();
//});
//
//Route::get('delete',function (){
//   $video = \App\Models\Video::find(1);
//   $deleteTag=$video->tags->where('id',3)->first();
//   $deleteTag->delete();
//});
//
//Route::get('detach',function (){
//    $video = \App\Models\Video::find(1);
//    $video->tags()->detach();
//});
//
//Route::get('attach',function (){
//    $video = \App\Models\Video::find(1);
//    $video->tags()->attach(1);
//});
//
//Route::get('sync',function (){
//   $video = \App\Models\Video::find(1);
//   $video->tags()->sync([1,2]);
//});

//Form Route




Route::get('file',function (){
//   $file = \Illuminate\Support\Facades\Storage::disk('files')->get('images/12.png');
//   echo $file;
//    echo "<img src=\"$file\" />";
//    echo \Illuminate\Support\Facades\Storage::url('images/hero.png');
//    $path = storage_path('images/hero.png');
//    echo $path;
//    \Illuminate\Support\Facades\Storage::copy('images/glknsdn.png','file/kksdhks.png');
//    \Illuminate\Support\Facades\Storage::move('images/glknsdn.png','file/kksdhks.png');
//    return \Illuminate\Support\Facades\Storage::disk('files')->download('hero.png');

//echo public_path('images');
//echo  '<br><br>';
//echo storage_path('images');

//    $file=\Illuminate\Support\Facades\Storage::disk('files')->url('hero.png');
//    $file=\Illuminate\Support\Facades\Storage::disk('files')->get('hero.png');
//    echo $file.'<br>';
//    echo "<img src=\"$file\"/>";
    $disk3=\Illuminate\Support\Facades\Storage::disk('files')->get("hero.png");
    $src="data:image/png;base64,".base64_encode($disk3);
    echo "<img src=\"$src\"/>";
});


Auth::routes(['verify'=>true]);
//Auth::routes();



Route::get('chekuser',function (){

//    $user=\Illuminate\Support\Facades\Auth::user();
////    return $user;
////    dd($user);
//    $userCheck=\Illuminate\Support\Facades\Auth::check();
////    dd($userCheck);
//    $id=\Illuminate\Support\Facades\Auth::id();
//
//    if ($userCheck){
//        echo 'Hello:'.$user->name;
//        echo '<br>';
//        echo 'user id:'.$id;
//    }else{
//        return redirect()->to('home');
//    }

//    $email='ali@gmail.com';
//    $password='12345678';
//    $auth = \Illuminate\Support\Facades\Auth::attempt(['email'=>$email,'password'=>$password]);
//    $auth = \Illuminate\Support\Facades\Auth::once(['email'=>$email,'password'=>$password]);
//    dd($auth);
//    $user=\App\Models\User::findOrFail(1);
//    $login=\Illuminate\Support\Facades\Auth::login($user);
//    dd($login);
});

//Route::get('/',function (){
////   \Illuminate\Support\Facades\Auth::logout();
//    $user=\Illuminate\Support\Facades\Auth::loginUsingId(1);
//    dd($user);
//});

//Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->middleware(['auth','verified'])->name('home');

Route::middleware(['auth','verified'])->group(function (){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts',\App\Http\Controllers\PostsController::class);

});

//Route::get('/');

Route::get('/test',function (){

    $user=\App\Models\User::find(1);
    $user_role=$user->isAdmin;
    dd($user_role);

});

Route::get('/admin',function (){
    echo "Hello to Admin page ";
})->middleware('isAdmin:ادمین');

Route::get('session',function (\Illuminate\Http\Request $request){
//  $request->session()->put(['username'=>'reza']);
//   return $request->session()->all();
//    return $request->session()->get('username');
//    session(['email'=>'reza@gmail.com']);
//    $request->session()->forget('username');
//    $request->session()->flush();
//    $request->session()->flash('message','post has been created!');
//    $request->session()->reflash();
//    return $request->session()->get('message');
//    $request->session()->keep('message');
//    return $request->session()->all();
});
