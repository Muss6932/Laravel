@extends('layout')

@section('title')
    Contact
@endsection

@section('breadcrumb')
    <li><a href="#">Home</a></li>
    <li class="active"><a href="#">Contact</a></li>
@endsection

@section('content')

    <div class="content">
        <div class="title">Page de contact</div>
        <form action="">
            <label for="sujet">Sujet</label>     <input id="sujet" type="text"/>
            <label for="email">Email</label>     <input id="email" type="email"/>
            <label for="message">Message</label> <textarea id="message"></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </div>

@endsection
