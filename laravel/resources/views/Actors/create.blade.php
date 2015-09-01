@extends('layout')




@section('title')
    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un acteur
@endsection




@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('actors.index')}}">Acteurs</a></li>
    <li class="active"><a href="{{route('actors.create')}}">Ajouter</a></li>
@endsection




@section('content')

@endsection