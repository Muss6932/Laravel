@extends('layout')


@section('js')

    @parent

    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script src="http://code.highcharts.com/modules/data.js"></script>
    <script src="http://code.highcharts.com/modules/drilldown.js"></script>
    <script src="{{asset('js/graph.js')}}"></script>


@endsection


@section('content')


    <div class="row" style="margin-bottom: 25px">
        <div class="col-sm-12">
            <div class="btn-group" role="group">
                <a class="btn" href="{{ route('welcome') }}">Simple</a>
                <a class="btn" href="{{ route('welcome.advanced') }}">Avancé</a>
                <button class="btn active" >Professionnel</button>
            </div>
        </div>

    </div>

    <div class="row">


        @foreach($bestcats as $bestcat)
            <bestcat data-title="{{ $bestcat->title }}" data-id="{{ $bestcat->categories_id }}"
                     data-janvier="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 1))->sum('movies.budget') }}"
                     data-fevrier="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 2))->sum('movies.budget') }}"
                     data-mars="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 3))->sum('movies.budget') }}"
                     data-avril="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 4))->sum('movies.budget') }}"
                     data-mai="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 5))->sum('movies.budget') }}"
                     data-juin="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 6))->sum('movies.budget') }}"
                     data-juillet="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 7))->sum('movies.budget') }}"
                     data-aout="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 8))->sum('movies.budget') }}"
                     data-septembre="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 9))->sum('movies.budget') }}"
                     data-octobre="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 10))->sum('movies.budget') }}"
                     data-novembre="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 11))->sum('movies.budget') }}"
                     data-decembre="{{ \App\Model\Movies::Bestcat($bestcat->categories_id, sprintf("%02d", 12))->sum('movies.budget') }}"></bestcat>
        @endforeach

        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Répartition des budgets des 4 meilleures catégories</span>
                </div>
                <div class="panel-body">
                    <div id="graph-categorie" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>



{{------------------------==================================================--------------------------}}
{{------------------------==================================================--------------------------}}

        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Répartition du nombre de commentaires par cinéma</span>
                </div>
                <div class="panel-body">
                    <div id="graph-cinema-comments"></div>
                </div>
            </div>
        </div>


        @foreach ( $bestcinema as $cinema)
        <bestcinema data-cinema="{{ $cinema->title }}" data-countcomments="{{ $cinema->nbcomments }}"></bestcinema>
        @endforeach
        <sumcomments data-sumcomments="{{ $sumcomments }}"></sumcomments>

        @foreach ($cinemasmovies as $cine)
            @foreach($cine->sessions as $session)
            <cinemasmovies data-cinema="{{ $cine->title }}"
                data-movies="{{ $session->movies['title'] }}"
               data-nbcomments="{{ $session->movies->comments->count() }}"
            ></cinemasmovies>
            @endforeach
        @endforeach

{{------------------------==================================================--------------------------}}
{{------------------------==================================================--------------------------}}


        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Historique du budget total par catégories de film</span>
                </div>
                <div class="panel-body">
                    <div id="graph-budget-categorie"></div>
                </div>
            </div>
        </div>




{{------------------------==================================================--------------------------}}
{{------------------------==================================================--------------------------}}


        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Répartition des films par catégories</span>
                </div>
                <div class="panel-body">
                    <div id="graph-film-categorie"></div>
                </div>
            </div>
        </div>

        @foreach( $categories as $categorie)
            <categoriemovie data-categorie="{{ $categorie->title }}" data-count="{{ $categorie->movies->count() }}"></categoriemovie>
        @endforeach
        <summovies data-sum="{{ $summovies }}"></summovies>

{{------------------------==================================================--------------------------}}
{{------------------------==================================================--------------------------}}




        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Répartition des catégories de film par acteur</span>
                </div>
                <div class="panel-body">
                    <div id="graph-categorie-acteur"></div>
                </div>
            </div>
        </div>


{{------------------------==================================================--------------------------}}
{{------------------------==================================================--------------------------}}




        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Répartition d'âge des acteur par sexe</span>
                </div>
                <div class="panel-body">
                    <div id="graph-age-sexe"></div>
                </div>
            </div>
        </div>


{{------------------------==================================================--------------------------}}
{{------------------------==================================================--------------------------}}


    </div>{{--FIN ROW PRINCIPALE--}}
















@endsection