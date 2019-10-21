<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        Note::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id(),
            'updated_at' => null,
        ]);
        
        return redirect()->action('HomeController@index');
    }

}
