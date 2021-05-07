<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Only authenticated users can access the posts route
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(Auth::id());
        //$posts = $user->posts;

        $posts = $user->posts()->where('title','!=','')->get();
        $count = $user->posts()->where('title','!=','')->count();

        return view('posts.index', compact('posts', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required'
        ]);

        if($request->hasFile('img')){

            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('img')->storeAs('public/img', $filenameToStore);
        } else{
            $filenameToStore = '';
        }

      // dd($request);
        $post = new Post();
        $post->fill($request->all());
        $post->img = $filenameToStore;
        $post->user_id = auth()->user()->id;

        if ($post->save()){
            return redirect('/posts')->with('status','Sucessfully save');
        }

        return redirect('/posts')->with('message', $message);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::find($post->id);
        $comments = $post->comments;

        return view('posts.show', compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required'
        ]);

        if($request->hasFile('img')){

            $filenameWithExt = $request->file('img')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('img')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('img')->storeAs('public/img', $filenameToStore);
        } else{

            $filenameToStore = '';
        }

        $post = Post::find($post->id);
        $post->fill($request->all());
        $post->save();

        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect('/posts');
    }

    public function deleteBlank()
    {
        $delete = Post::where('title','=','')->delete();

        return redirect('/posts');
    }

    public function archive()
    {
        $posts = Post::onlyTrashed()->get();

        return view('posts.archive',compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->find($id)->restore();

        return redirect('/posts');
    }
}
