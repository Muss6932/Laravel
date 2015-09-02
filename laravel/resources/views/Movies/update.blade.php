@extends('layout')



@section('title')
    <i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier le film
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('movies.index')}}">Films</a></li>
    <li class="active"><a href="{{route('movies.update')}}">Modifier</a></li>
@endsection



@section('content')

@endsection