<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Models\Post;
use Illuminate\Auth\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        echo asset('storage/IMG_7789.PNG');
//        $posts = Post::all();
        $posts = Post::with('user')->get();
        $posts[0];
        return view('post.index',compact(["posts"]));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');

//       echo $file->guessExtension();
//        echo $file->getMimeType();
//        echo $file->getClientMimeType();
//        echo $file->getClientOriginalExtension();
//        echo $file->getMaxFileSize();
        $post = new Post();
        if ($file=$request->file('file')){

            $name = $file->getClientOriginalName();
            $file->store('public/images');
//            $file->move('images',$name);

//            $input['path'] = $name;
//            $post->path = $name;
        }

//        $this->validate($request,
////      [
////           'title'=>'required|max:2',
////           'description'=>'required'
////        ],
////        [
////            'title.required'=>'عنوان ضروری',
////            'title.max'=>'کاراکتر بیش از 2 تا باشد',
////            'description.required'=>'لطفا توضیح'
////        ]);


        $post->title = $request->title;
        $post->content = $request->description;
        $post->user_id =1;
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        event(new PostViewEvent($post));
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);
        $user = Auth::user();
        return  view('post.edit',compact('post'));
//        if($user->can('update',$post)){
//            return view('post.edit',compact('post'));
//        }else{
//            return "شما اجازه ویرایش این مطلب نداری";
//        }



//        if (\Illuminate\Support\Facades\Gate::allows('edit-post',$post)){
//            return view('post.edit',compact('post'));
//        }
//        else{
//           return "شما اجازه ویرایش این مطلب نداری";
//        }
//        if (\Illuminate\Support\Facades\Gate::denies('edit-post',$post)){
//            return "شما اجازه ویرایش این مطلب نداری";
//        }
//        else{
//            return view('post.edit',compact('post'));
//        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->description;
        $post->save();
//        $post->update($request->all());
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts');
    }

//    public function showMyView($id, $name, $password)
//    {
////        return view('pages.myView')->with('id',$id);
//        return view('pages.myView', compact(['id', 'name', 'password']));
//    }
//
//    public function contact()
//    {
//        $people = ['مسعود','مروارید','روکسو','علی','ماریا'];
//        return view('pages.contact',compact('people'));
//    }
//
//    public function insert()
//    {
//        DB::insert('insert into posts(title,content) values(?,?)',['پست insert','پست با استفاده از insert درج شد.']);
//    }
//
//    public function select()
//    {
//        $allPosts=DB::select('select * from posts');
//
//        return $allPosts;
//    }
//
//    public function updatePost()
//    {
//        $updatePosts=DB::update('update posts set title="title updated" where id=?',[1]);
//        return $updatePosts;
//    }
//
//    public function deletePost()
//    {
//        $deletePosts=DB::delete('delete from posts where id=?',[4]);
//        return $deletePosts;
//    }
//
//    public function getAllPost()
//    {
////        $post = Post::find(4);
////        $post= Post::where('title','پست insert')->orderby('id','asc')->get();
////        $post = Post::findorfail(1);
//        $post = Post::all();
//        return $post;
//    }
//
//    public function savePost()
//    {
////        $post = new Post();
////        $post->title="پست شماره 1";
////        $post->content="تیم هم یک نوضیح تست برای این کانت میباشد.";
////        $post->save();
//
//        $post= Post::create(['title'=>'پست شماره 2','content'=>'این هم یک پست جدید']);
//    }
//
//    public function newUpdatePost()
//    {
////        $post=Post::where('id',6)->update(['title'=>'Updated Post','content'=>'Updated content']);
//        $post = Post::findOrFail(6);
//        $post->title=' یک پست جدید';
//        $post->content='کانت جدید';
//        $post->save();
//        return $post;
//    }
//
//    public function newDeletePost()
//    {
////        $post= Post::where('id',8)->first();
////        $post->delete();
//        $post = Post::where('id',3)->delete();
////        $post = Post::destroy(7);
////        $post = Post::destroy([6,5]);
//    }
//
//    public function workWithTrash()
//    {
////        $post = Post::withTrashed()->get();
//        $post = Post::onlyTrashed()->get();
//        return $post;
//    }
//
//    public function restorePost()
//    {
//        $post = Post::onlyTrashed()->where('id',4)->restore();
//    }
//
//    public function forceDelete()
//    {
//        $post = Post::onlyTrashed()->where('id',3)->forceDelete();
//    }
}
