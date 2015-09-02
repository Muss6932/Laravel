@extends('layout')



@section('title')
    <i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier le réalisateur
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('directors.index')}}">Réalisateur</a></li>
    <li class="active"><a href="{{route('directors.update')}}">Modifier</a></li>
@endsection



@section('content')

@endsection