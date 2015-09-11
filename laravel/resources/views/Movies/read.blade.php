@extends('layout')



@section('title')
    <i class="fa fa-film"></i>&nbsp;&nbsp;Information sur le film
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('movies.index')}}">Film</a></li>
    <li class="active"><a href="{{route('movies.read')}}">Information</a></li>
@endsection



@section('content')

    <h1>{{ $movie->title }}</h1>
    <p>Synopsis</p>
    <p>{!! $movie->synopsis  !!} </p>
    {!! $movie->trailer  !!}

    <h3><i class="fa fa-comments"></i>&nbsp;&nbsp;Commentaires</h3>
    <ul>
    @foreach($movie->comments as $comment)
    <li><b>{{ $comment->user->username }}</b> : {{ $comment->content }}</li>
    @endforeach
    </ul>

    <form id="addcomment" action="{{ route('movies.comments', [ 'id' => $movie->id ]) }}" method="post">
        {{ csrf_field() }}

        <textarea class="form-control" name="content" id="content" placeholder="Écrire un commentaire" cols="30" rows="10"></textarea>
        <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i>Commenter</button>
    </form>

    <div style="height: 100px"></div>

@endsection