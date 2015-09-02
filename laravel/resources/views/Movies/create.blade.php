@extends('layout')



@section('title')
    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un film
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('movies.index')}}">Films</a></li>
    <li class="active"><a href="{{route('movies.create')}}">Ajouter</a></li>
@endsection



@section('content')


@endsection