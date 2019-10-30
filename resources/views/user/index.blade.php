@extends('layouts.app')
@section('content')
<style>
.action-row{
    display:flex;
}
.edit-button {
    margin-right: 10px;
}
</style>

    <h1>Witaj w Archimedes - CMS</h1>
    <div class="row">
        <div class="col-lg-5">
            <h2>Zarządzaj użytkownikami</h2>
        </div>
        <div class="col-lg-2 offset-lg-5">
            <a class="btn btn-success" href="{{ route('users.create') }}" role="button">Dodaj użytkownika</a>
        </div>
    </div>
    @isset($users)
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Email</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class="action-row">
                    <a href="{{ action('UserController@edit', ['user' => $user->id]) }}" class="btn btn-primary edit-button">
                        Edytuj
                    </a>
                    <form action="{{ action('UserController@destroy', ['user' => $user->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" title="Delete" value="DELETE">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    @endisset
@endsection