@extends('layout')



@section('title')
    <i class="fa fa-search"></i>&nbsp;&nbsp;Rechercher dans 'film'
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('movies.index')}}">Films</a></li>
    <li class="active"><a href="{{route('movies.search')}}">Recherche</a></li>
@endsection



@section('content')

@endsection