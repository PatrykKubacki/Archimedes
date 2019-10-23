@extends('layouts.app')

@section('content')
<div class="row">
    <h1>Edytowanie notki
    </h1>
</div>
<div class="col">
<form action="{{ route('notes.update', ['note' => $note]) }}" method="POST">
    @method('PUT')
    @include('note.fields')
    <div class="form-group row">
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Zapisz notkę</button>
        </div>
        <div class="col-sm-9">
            <a href="{{ route('home') }}" class="btn btn-secondary">Anuluj</a>
        </div>
    </div>
</form>
</div>
@endsection