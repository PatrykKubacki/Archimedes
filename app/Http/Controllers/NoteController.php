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
            'user_id' => auth()->id(),
            'title' => request('title'),
            'content' => request('content'),
            'updated_at' => null,
        ]);
        
        return redirect()->action('HomeController@index');
    }

    public function edit(Note $note)
    {
        return view('note.edit')
            ->with('note', $note);;
    }

    public function update(Request $request, Note $note)
    {
        $note->fill($request->input());
        $note->updated_at = date("Y-m-d H:i:s");
        $note->save();
        return redirect()->action('HomeController@index');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->action('HomeController@index');
    }

}
