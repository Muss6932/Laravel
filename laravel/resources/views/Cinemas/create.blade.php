@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('cinemas.index')}}">Cinéma</a></li>
    <li class="active"><a href="{{route('cinemas.create')}}">Ajouter</a></li>
@endsection



@section('title')
    <i class="fa fa-ticket"></i>&nbsp;&nbsp;Ajouter un nouveau cinéma
@endsection



@section('content')

@endsection