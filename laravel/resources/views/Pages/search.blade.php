@extends('layout')

@section('title')
    <i class="fa fa-search" xmlns="http://www.w3.org/1999/html"></i>&nbsp;&nbsp;Recherche
@endsection

@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('contact')}}">Recherche</a></li>
@endsection

@section('content')

    <div class="content">
        <div class="title">Page de recherche</div>
        <form method="GET" action="{{route('search')}}">
            <label for="title">Titre</label>
                <input class="form-control" name="title" id="title" type="text"/></br>
            <label for="email">Email</label>
                <input class="form-control" name="email" id="email" type="email"/></br>
            <label for="message">Message</label>
                <textarea class="form-control" name="message" id="message"></textarea></br>
            <select class="form-control" name="language">
                <option>FR</option>
                <option>EN</option>
            </select></br>
            <select multiple class="form-control" name="bo[]">
                <option>VO</option>
                <option>VF</option>
                <option>VOST</option>
                <option>VOSTFR</option>
            </select></br>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="10" name="checkbox[]">
                    Cover
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="25" name="checkbox[]">
                    Uncover
                </label>
            </div></br>

            <button class="btn btn-primary" type="submit">Envoyer</button>
        </form>
    </div>

@endsection
