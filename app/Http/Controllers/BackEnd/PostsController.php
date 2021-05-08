<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('BackEnd.posts.index',compact('posts'));
    }


    public function create()
    {
       return view('BackEnd.posts.create');
    }


    public function store(Request $request)
    {
    //   dd($request->all());

        $this->validate($request,[
            'title'=> 'required | max:12 | min:3',
            'content'=> 'required | max:50',
            'photo'=> 'required |',
        ]);

        if ($request->hasfile("photo")) {
            $file= $request->photo;
            $new_file = time().$file->getClientOriginalName();
            $file ->move('storage/post/',$new_file);
        }


        Post::create([
            "title"=> $request->title,
            "content"=> $request->content,
            "photo"=> 'storage/post/' . $new_file,
        ]);

        return redirect()->back();
        // return view('BackEnd.posts.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
       $posts = Post::find($id);
       return view('BackEnd.posts.edit',compact('posts'));
    }


    public function update(Request $request, $id)
    {
        $posts = Post::find($id);

        if ($request->hasfile("photo")) {
            $file= $request->photo;
            $new_file = time().$file->getClientOriginalName();
            $file ->move('storage/post',$new_file);

            $posts->photo = 'storage/post'. $new_file;
            $posts->photo ->update();
        }

        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->update();
        return redirect()->route('posts.index');
    }


    public function destroy($id)
    {

        $posts = Post::find($id);
       $posts->destroy($id);

       return redirect()->route('posts.index');
    }
}
