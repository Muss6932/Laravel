@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('categories.index')}}">Catégories</a></li>
@endsection



@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des catégories
@endsection



@section('content')

    <div class="row">
        <div class="col-sm-7">
            <div class="alert alert-danger">
                <strong>  catégories</strong> qui ont aucun film.
            </div>
            <div class="alert alert-info">
                La catégorie<strong> {{ $categorieMaxMovies->title }}</strong> est la plus populaire <i>(<b>{{ $categorieMaxMovies->countmovies }} </b>films)</i>
            </div>
            <div class="alert alert-warning">
                La catégorie<strong> {{ $categorieMaxBudget->title }}</strong> a le plus gros budget de l'année <i>2015</i> : <b>{{ number_format($categorieMaxBudget->sumbudget, 0 , ",", " ") }} $</b>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="panel panel-info panel-dark widget-profile">
                <div class="panel-heading">
                    <div class="widget-profile-bg-icon"><i class="fa fa-film"></i></div>
                    <div class="widget-profile-header">
                        <span class="text-bg"><b>Catégories {{ $random['categorie']->title }}</b></span><br>
                    </div>
                </div>
                <!-- / .panel-heading -->
                <div class="widget-profile-counters">
                    <div class="col-xs-4"><span>{{ $random['categorie']->movies->count() }}</span><br>FILMS</div>
                    <div class="col-xs-4"><span>{{ $random['sumComments'] }}</span><br>COMMENTAIRES</div>
                    <div class="col-xs-4"><span>{{ $random['sumActors'] }}</span><br>ACTEURS</div>
                </div>

            </div>
        </div>
    </div>



    <div class="panel">
        <div class="panel-body">
            <div class="table-primary">
                <div role="grid" id="jq-datatables-example_wrapper" class="dataTables_wrapper form-inline no-footer">

                    <table cellpadding="0" cellspacing="0" border="0"
                           class="table table-striped table-bordered dataTable no-footer" id="jq-datatables-example"
                           aria-describedby="jq-datatables-example_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1"
                                aria-label="Browser: activate to sort column ascending" style="width: 10%;">Image
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column ascending" style="width: 193px;">
                                 Catégorie
                            </th>
                            <th style="width: 10%;">Films</th>
                            <th style="width: 10%;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $categorie)
                            <tr class="gradeA odd">
                                <td><img style="width: 100%; height: 70px" src="{{ $categorie->image }}" alt=""></td>
                                <td class="sorting_1"
                                    style="font-weight: bold; color: #090E0F">{{ $categorie->title }} </td>
                                <td class="sorting_1">  @if($categorie->movies->count() == 1){{ $categorie->movies->count() }} film
                                                        @else {{ $categorie->movies->count() }} films
                                                        @endif&nbsp;&nbsp;<i class="fa fa-film"></i></td>
                                <td>
                                    <a href="{{ route('categories.update', [ 'id' => $categorie->id ] ) }}" style="width: 100%;" class="btn btn-default"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier</a>
                                    <a href="{{ route('categories.delete', [ 'id' => $categorie->id ] ) }}" style="width: 100%;" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection