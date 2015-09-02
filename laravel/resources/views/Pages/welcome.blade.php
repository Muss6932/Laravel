@extends('layout')

<!--Écrire dans la section content-->
@section('content')
    <div class="title">Laravel 5</div>

    <ul>
        <li><a href="{{ route('actors.index', ['ville' => 'Lyon']) }}">Liste des acteurs</a></li>
        </br>
        <li><a href="{{ route('movies.search', ['langue' => 'fr', 'visibilite' => 1, 'duree' => 3]) }}">Films visibles en francais de 3h</a></li>
        <li><a href="{{ route('movies.search', ['visibilite' => 2, 'langue' => 'en']) }}">Films invisibles en anglais</a></li>
        <li><a href="{{ route('movies.search', ['langue' => 'fr', 'visibilite' => 1, 'duree' => 4]) }}">Films visibles de 4h</a></li>
        </br>
        <li><a href="{{ route('users.search', ['visible' => 1, 'ville' => "Lyon", 'zipcode' => 69]) }}">Users actifs de Lyon</a></li>
        <li><a href="{{ route('users.search', ['visible' => 0, 'zipcode' => 69]) }}">Users inactifs du Rhône</a></li>
        <li><a href="{{ route('users.search', ['visible' => 1]) }}">Users actifs</a></li>

    </ul>
@endsection