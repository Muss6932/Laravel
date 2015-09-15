@extends('layout')


@section('js')

    @parent

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{asset('js/gmap.js')}}"></script>


@endsection


@section('content')


    <div class="row" style="margin-bottom: 25px">
        <div class="col-sm-12">
            <div class="btn-group" role="group">
                <a class="btn" href="{{ route('welcome') }}">Simple</a>
                <a class="btn" href="{{ route('welcome.advanced') }}">Avancé</a>
                <a class="btn" href="">Professionnel</a>
            </div>
        </div>

    </div>

    <div class="row">

        <div id="map" style="width: 100%; height: 350px; margin-bottom: 50px"></div>


        @foreach($cinemas as $cinema)
        <marker style="display: none" class='cinemap' data-session="{{ $cinema->sessions->count() }}" data-title="{{ $cinema->title }}" id="{{ $cinema->id }}" data-adresse="{{ $cinema->adresse }} {{ $cinema->cp }} {{ $cinema->ville }}"></marker>
        @endforeach

    </div>{{--FIN ROW PRINCIPALE--}}











@endsection