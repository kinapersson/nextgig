<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\SavedGigsController;

class SavedGigsController extends Controller
{
    public function index() {
        
        return view('posts.saved')->with('posts');
    }
}
