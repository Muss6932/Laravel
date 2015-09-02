@extends('layout')



@section('title')
    <i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier le cinéma
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('cinemas.index')}}">Cinémas</a></li>
    <li class="active"><a href="{{route('cinemas.update')}}">Modifier</a></li>
@endsection



@section('content')

@endsection