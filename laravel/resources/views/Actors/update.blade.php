@extends('layout')



@section('title')
    <i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier l'acteur
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('actors.index')}}">Acteurs</a></li>
    <li class="active"><a href="{{route('actors.update')}}">Modifier</a></li>
@endsection



@section('content')

@endsection