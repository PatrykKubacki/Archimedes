@extends('layouts.app')

@section('content')
<h1>Witaj w Archimedes - CMS</h1>
    @isset($notes)
    <div class="row">
    <div class="col-lg-4">
        <h2>Ilość notatek: {{ count($notes) }}</h2>
        </div>
        @auth
        <div class="col-lg-2 offset-lg-6">
        <a class="btn btn-primary" href="{{ route('notes.create') }}" role="button">Dodaj Notatkę</a>
        </div>
        @endauth 
    </div>
        @foreach($notes as $note)
            <div class="card">
            <div class="card-header">
            <b>{{$note->title}}</b>
            </div>
                <div class="card-body">
                    <p class="card-text">{{$note->content}}</p>
                    @auth
                    <a href="{{ action('NoteController@edit', ['note' => $note->id]) }}" class="card-link">
                    Edytuj
                    </a>
                    <form class="btn btn-link card-link" action="{{ action('NoteController@destroy', ['note' => $note->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-link card-link" title="Delete" value="DELETE">Usuń</button>
                    </form>
                    @endauth
                </div>
                <div class="card-footer text-muted">
                Autor: {{$note->user->name}}<br/>
                Utworzono: {{$note->created_at ? $note->created_at->format('Y-m-d') : ''}}<br/>
                Ostatnia modyfikacja: {{$note->updated_at ?? 'nie modyfikowano'}}
                </div>
            </div>
            <br/><br/>
        @endforeach
    @endisset
    @empty($notes)
    <div>nic tu nie ma</div>
    @endempty
@endsection
