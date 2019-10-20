<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() 
    {
        return view('note.create');
    }

    public function store(Request $request)
    {
        return redirect()->action('HomeController@index');
    }

}
