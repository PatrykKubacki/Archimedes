<?php

namespace App\Http\Controllers;

Use App\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notes = Note::paginate(2);
        $count = count(Note::all());
        return view('home.index')
            ->with('notes', $notes)
            ->with('count',$count);
    }
    
}
