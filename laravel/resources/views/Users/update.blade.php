@extends('layout')



@section('title')
    <i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier l'utilisateur
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('users.index')}}">Utilisateurs</a></li>
    <li class="active"><a href="{{route('users.update')}}">Modifier</a></li>
@endsection



@section('content')

@endsection