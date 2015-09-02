@extends('layout')



@section('title')
    <i class="fa fa-search"></i>&nbsp;&nbsp;Rechercher dans 'utilisateur'
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('users.index')}}">Utilisateurs</a></li>
    <li class="active"><a href="{{route('users.search')}}">Recherche</a></li>
@endsection



@section('content')

@endsection