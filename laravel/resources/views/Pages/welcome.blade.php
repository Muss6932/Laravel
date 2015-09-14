@extends('layout')





<!--Écrire dans la section content-->
@section('content')




    <div class="row">

        <div class="col-sm-12">
            <div class="btn-group" role="group">
                <a class="btn" href="">Simple</a>
                <a class="btn" href="">Avancé</a>
                <a class="btn" href="">Professionnel</a>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="stat-panel">
                <div class="stat-cell col-xs-5 bg-success bordered no-border-vr no-border-l no-padding valign-middle text-center">
                    <p>Moyenne d'âge des acteurs </p>
                    <p class="text-lg"><strong >{{ $ageMoyen->ageMoyen }}</strong> ans</p>
                </div> <!-- /.stat-cell -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <div class="stat-rows">
                        <div class="stat-row">
                            <div class="stat-cell bg-success padding-sm valign-middle">
                                {{ $lyon }} à Lyon
                            </div>
                        </div>
                        <div class="stat-row">
                            <div class="stat-cell bg-success darken padding-sm valign-middle">
                                {{ $birmingham }} à Birmingham
                            </div>
                        </div>
                        <div class="stat-row">
                            <div class="stat-cell bg-success darker padding-sm valign-middle">
                                {{ $newyork }} à New York
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="stat-panel">
                <div class="stat-cell col-xs-5 bg-warning bordered no-border-vr no-border-l no-padding valign-middle text-center">
                    <p>Nombre de commentaires </p>

                    <p class="text-lg"><b>{{ $comments->count() }}</b></p>
                </div>
                <!-- /.stat-cell -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <div class="stat-rows">
                        <div class="stat-row">
                            <div class="stat-cell bg-warning padding-sm valign-middle">
                                {{ $comments->where('state', '2')->count() }} actifs
                                <i class="fa fa-envelope-o pull-right"></i>
                            </div>
                        </div>
                        <div class="stat-row">
                            <div class="stat-cell bg-warning darken padding-sm valign-middle">
                                {{ $comments->where('state', '1')->count() }} en cours de validation
                                <i class="fa fa-bug pull-right"></i>
                            </div>
                        </div>
                        <div class="stat-row">
                            <div class="stat-cell bg-warning darker padding-sm valign-middle">
                                {{ $comments->where('state', '0')->count() }} inactifs
                                <i class="fa fa-users pull-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-sm-4">
            <!-- Centered text -->
            <div class="stat-panel text-center">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-comments"></i>&nbsp;&nbsp;Taux de commentaires actifs
                    </div>
                </div>
                <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Bordered, without top border, without horizontal padding -->
                    <div class="stat-cell bordered no-border-t no-padding-hr">
                        <div class="pie-chart easy-pie-chart-1" data-percent="{{ $tauxCommentairesActifs }}">
                            <div class="pie-chart-label">{{ $tauxCommentairesActifs }} %</div>
                        </div>
                    </div>
                </div>
                <!-- /.stat-row -->
            </div>
            <!-- /.stat-panel -->
        </div>
        <div class="col-sm-4">
            <div class="stat-panel text-center">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-star"></i>&nbsp;&nbsp;Taux de films en favoris
                    </div>
                </div>
                <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Bordered, without top border, without horizontal padding -->
                    <div class="stat-cell bordered no-border-t no-padding-hr ">
                        <div class="pie-chart easy-pie-chart-1" data-percent="{{ $tauxFilmsFavoris }}" >
                            <div class="pie-chart-label ">{{ $tauxFilmsFavoris }} %</div>
                        </div>
                    </div>
                </div>
                <!-- /.stat-row -->
            </div>
            <!-- /.stat-panel -->
        </div>
        <div class="col-sm-4">
            <div class="stat-panel text-center">
                <div class="stat-row">
                    <!-- Dark gray background, small padding, extra small text, semibold text -->
                    <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                        <i class="fa fa-film"></i>&nbsp;&nbsp;Taux de films diffusés
                    </div>
                </div>
                <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Bordered, without top border, without horizontal padding -->
                    <div class="stat-cell bordered no-border-t no-padding-hr">
                        <div class="pie-chart easy-pie-chart-1" data-percent="{{ $tauxFilmsDiffuses }}" >
                            <div class="pie-chart-label">{{ $tauxFilmsDiffuses }} %</div>
                        </div>
                    </div>
                </div>
                <!-- /.stat-row -->
            </div>
            <!-- /.stat-panel -->
        </div>

        <div class="col-sm-6">

            <div class="panel">
                <form method="post" action="{{ route('welcome.post.movie') }}" class="panel form-horizontal">

                    {{ csrf_field() }}

                    <div class="panel-heading">
                        <span class="panel-title">Ajouter un film</span>
                    </div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Titre</label>

                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control">
                                @if ($errors->has('title'))
                                    <p class="help-block text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categories" class="col-sm-2 control-label">Catégorie</label>

                            <div class="col-sm-10">
                                <select class="form-control" name="categories" id="categories">
                                    <option>Choisir une catégorie</option>
                                    @foreach( $categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categories'))
                                    <p class="help-block text-danger">{{ $errors->first('categories') }}</p>
                                @endif


                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-2 control-label">Synopsis</label>

                            <div class="col-sm-10">
                                <textarea type="text" name="synopsis" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <span class="panel-title"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Prochaines séances</span>
                    <a href="#" class=" pull-right"><b>{{ $seanceavenir }}</b> séance à venir</a>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-sm-10">
                                <a href="">Resident evil</a>

                                <p><span style="color: grey; font-style: italic ">Diffusé à</span> Pathé Bellecour</p>
                            </div>
                            <div class="col-sm-2">
                                <span class="label label-primary pull-right">Sortis dans 5 jours</span>
                            </div>
                        </div>

                    </li>

                </ul>

            </div>

        </div>




    </div>{{--Fin Row--}}














@endsection