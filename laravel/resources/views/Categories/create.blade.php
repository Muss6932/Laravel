@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('categories.index')}}">Catégories</a></li>
    <li class="active"><a href="{{route('categories.create')}}">Ajouter</a></li>
@endsection



@section('title')
    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter une nouvelle catégorie
@endsection



@section('content')

@endsection