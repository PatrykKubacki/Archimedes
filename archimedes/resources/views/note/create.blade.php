@extends('layouts.app')

@section('content')
<div class="col">
<form action="ds" method="POST">
    @include('note.fields')

    <div class="form-group row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Dodaj notkę</button>
        </div>
        <div class="col-sm-9">
            <a href="{{ route('home') }}" class="btn btn-secondary">Anuluj</a>
        </div>
    </div>
</form>
</div>
@endsection