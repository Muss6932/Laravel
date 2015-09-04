@extends('layout')



@section('title')
    <i class="fa fa-film"></i>&nbsp;&nbsp;Information sur l'utilisateur
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('users.index')}}">Utilisateurs</a></li>
    <li class="active"><a href="{{route('users.read')}}">Information</a></li>
@endsection



@section('content')

@endsection