@extends('layout')



@section('title')
    <i class="fa fa-star"></i>&nbsp;&nbsp;Information sur l'acteur
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('actors.index')}}">Acteurs</a></li>
    <li class="active"><a href="{{route('actors.read')}}">Information</a></li>
@endsection



@section('content')

@endsection