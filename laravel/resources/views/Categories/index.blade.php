@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('categories.index')}}">Catégories</a></li>
@endsection



@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des catégories
@endsection




@section('content')

@endsection