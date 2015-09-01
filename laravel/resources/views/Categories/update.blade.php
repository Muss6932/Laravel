@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('categories.index')}}">Catégories</a></li>
    <li class="active"><a href="{{route('categories.update')}}">Modifier</a></li>
@endsection




@section('title')
    Modifier la catégorie
@endsection




@section('content')



@endsection