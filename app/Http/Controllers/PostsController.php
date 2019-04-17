<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\GetGigsController;

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

        $gigs = new GetGigsController();

        $other_posts = $gigs->allGigs();
            
        //Visar bara kommande datum från Post model
        $posts = Post::select('*')->where('date', '>', date('Y-m-d'))->orderBy('date', 'desc')->get();

        //Pushar in externt api
        foreach($posts as $post) {
            array_push($other_posts, $post);
        }

        //Sorterar i datumordning
        usort($other_posts, function($post1, $post2) {
            return $post1["date"] <=> $post2["date"];
        });

        return view('posts.index')->with('posts', $other_posts);
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
            'location' => 'required',
            'date' => 'required',
        ]);

        //Skapa post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->location = $request->input('location');
        $post->date = $request->input('date');

        $post->save();

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
        $gigs = new GetGigsController();

        //Lösning pga olika url:er mellan apier
        if (isset($_GET["src"]) && $_GET["src"] == "songkick") {
            $post = $gigs->singleGig($id);
        }
        else {
            $post = Post::find($id); 
        }

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
            'location' => 'required',
            'date' => 'required'
        ]);

        //Uppdatera (redigera) post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->location = $request->input('location');
        $post->date = $request->input('date');
        $post->save();

        return redirect('/dashboard')->with('success', 'Spelning redigerad!');
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

        return redirect('/dashboard')->with('success', 'Spelning borttagen!');

    }
}
