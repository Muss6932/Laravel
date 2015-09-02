@extends('layout')



@section('title')
    <i class="fa fa-video-camera"></i>&nbsp;&nbsp;Information sur le réalisateur
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('directors.index')}}">Réalisateurs</a></li>
    <li class="active"><a href="{{route('directors.read')}}">Information</a></li>
@endsection



@section('content')

@endsection