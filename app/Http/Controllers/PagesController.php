<?php
//Denna fil (controller) skapades genom terminalen: $ php artisan make:controller PagesController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Välkommen';
        //Ett annat sätt att ladda innehåll på: return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = 'Om mitt exjobb';
        return view('pages.about')->with('title', $title);

    }

    public function services() {
        $data = array (
            'title' => 'Services',
            'services' => ['Stad', 'Spelningar', 'Lägg till spelning']
        );
        return view('pages.services')->with($data);
    }
}
