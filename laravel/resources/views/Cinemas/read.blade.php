@extends('layout')



@section('title')
    <i class="fa fa-ticket"></i>&nbsp;&nbsp;Information sur le cinéma
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('cinemas.index')}}">Cinémas</a></li>
    <li class="active"><a href="{{route('cinemas.read')}}">Information</a></li>
@endsection



@section('content')

@endsection