@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('categories.index')}}">Catégories</a></li>
    <li class="active"><a href="{{route('categories.read')}}">Ma catégorie</a></li>
@endsection



@section('title')
    <i class="fa fa-book"></i>&nbsp;&nbsp;Ma catégories
@endsection




@section('content')

@endsection