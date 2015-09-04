@extends('layout')



@section('title')
    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un utilisateur
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('users.index')}}">Utilisateurs</a></li>
    <li class="active"><a href="{{route('users.create')}}">Ajouter</a></li>
@endsection



@section('content')


@endsection