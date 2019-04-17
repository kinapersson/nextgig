<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Post;

class GetGigsController extends Controller
{
    public function allGigs() {
        $client = new Client();
        $res = $client->get('http://api.songkick.com/api/3.0/metro_areas/32252/calendar.json?apikey=LApbzUV8HRASF1Sv');
        //echo $res->getStatusCode(); // 200
        //echo $res->getBody(); // { "type": "User", ....

        $gigs = json_decode( $res->getBody(), true);

        $posts = [];


        foreach ($gigs["resultsPage"]["results"]['event'] as $gig) {
            $post = new Post;
            $post->title = $gig["performance"][0]["displayName"];
            $post->date = $gig["start"]["date"];
            $post->location = $gig["venue"]["displayName"];
            $post->skid = $gig["id"];         
            
            $post->uri = $gig["venue"]["uri"];

            array_push($posts, $post);
        }

        // echo "<pre>";
        // var_dump($posts);
        // echo "</pre>";
        return $posts; // view('posts.index')->with('posts', $posts);
    }
    public function singleGig($id) {
        $client = new Client();
        $res = $client->get('http://api.songkick.com/api/3.0/events/' . $id . '.json?apikey=LApbzUV8HRASF1Sv');
        $post = new Post;
        $gig = json_decode( $res->getBody(), true);
        $post->title = $gig["resultsPage"]["results"]['event']["performance"][0]["displayName"];// $gig["resultsPage"]["results"]["event"]["displayName"];
        
        $post->location = $gig["resultsPage"]["results"]["event"]["venue"]["displayName"];
        $post->street = $gig["resultsPage"]["results"]["event"]["venue"]["street"];
        $post->zip = $gig["resultsPage"]["results"]["event"]["venue"]["zip"];
        $post->city = $gig["resultsPage"]["results"]["event"]["venue"]["city"]["displayName"];


        // echo "<pre>";
        // var_dump ($gig);
        // echo "</pre>";

        return $post;
    }
}
