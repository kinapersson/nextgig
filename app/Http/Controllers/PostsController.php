<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

//Om man vill använda vanliga sql-frågor istället för eloquent:
//use DB; SAMT,  i rätt funktion:
//$posts = DB::select('SELECT * from posts'); 

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Hämtar all data i Post model och dess tabell:
        //$posts = Post::all();  
        //Om vi vill hämta ut en specifik post utifrån given parameter:
        //$posts = Post::where('title', 'Post 1')->get(); 
        //$posts = Post::paginate(30);
        
        $posts = Post::orderBy('created_at', 'desc')->get(); 

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        //Skapa post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        
        //OBS tillfälligt, input-data ska skickas till mig för godkännande
        return redirect('/spelningar')->with('success', 'Spelning uppladdad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if($post == null) {
            return view('pages.404');
        }
        
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        //Uppdatera post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        
        //OBS tillfälligt, input-data ska skickas till mig för godkännande
        return redirect('/spelningar')->with('success', 'Spelning redigerad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/spelningar')->with('success', 'Spelning borttagen');

    }
}
