@extends('layout')



@section('title')
    <i class="fa fa-film"></i>&nbsp;&nbsp;Information sur le film
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('movies.index')}}">Film</a></li>
    <li class="active"><a href="{{route('movies.read')}}">Information</a></li>
@endsection



@section('content')

@endsection