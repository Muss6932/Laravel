@extends('layout')



@section('title')
    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un film
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('movies.index')}}">Films</a></li>
    <li class="active"><a href="{{route('movies.create')}}">Ajouter</a></li>
@endsection



@section('content')

<div class="row">
    <div class="col-sm-12">


        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="panel-title">Nouveau film</span>
            </div>
            <div class="panel-body">

                <form enctype="multipart/form-data" method="post" action="{{ route('movies.post') }}" class="formular-validate form-horizontal" novalidate="novalidate">

                    {{--IMPORTANT : CSRF--}}
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Titre</label>

                        <div class="col-sm-9">
                            <input type="text" value="{{ \Illuminate\Support\Facades\Input::old('title') }}"
                                   class="form-control" id="title" name="title" placeholder="">
                            @if ($errors->has('title')) <p
                                    class="help-block text-danger">{{ $errors->first('title') }}</p>@endif
                        </div>
                    </div>

{{---------------------TYPE------------------------------------------------------}}

                    <div class="form-group">
                        <label for="typefilm" class="col-sm-2 control-label">Type</label>

                        <div class="col-sm-9">
                            <select class="form-control" name="typefilm" id="typefilm">
                                <option></option>
                                <option value="Long-Metrage">Long-Metrage</option>
                                <option value="Court-Metrage">Court-Metrage</option>
                                <option value="Animation">Animation</option>
                            </select>
                            @if ($errors->has('type_film')) <p
                                    class="help-block text-danger">{{ $errors->first('type_film') }}</p>@endif

                        </div>
                    </div>

{{---------------------SYNOPSIS------------------------------------------------------}}

                    <div class="form-group">
                        <label for="synopsis" class="col-sm-2 control-label">Synopsis</label>

                        <div class="col-sm-9">
                            <textarea class="limit-textarea-200 form-control" name="synopsis"
                                      id="synopsis">{{ \Illuminate\Support\Facades\Input::old('synopsis') }}</textarea>

                            <div class="label-limit-textarea-label limiter-label">Characters left: <span
                                        class="limiter-count">100</span></div>
                            @if ($errors->has('synopsis')) <p
                                    class="help-block text-danger">{{ $errors->first('synopsis') }}</p>@endif
                        </div>
                    </div>

{{--------------------DESCRIPTION-------------------------------------------------------}}

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>

                        <div class="col-sm-9">
                            <textarea class="summernote form-control" name="description"
                                      id="description">{{ \Illuminate\Support\Facades\Input::old('description') }}</textarea>
                            @if ($errors->has('description')) <p
                                    class="help-block text-danger">{{ $errors->first('description') }}</p>@endif
                        </div>
                    </div>

{{-----------------------IMAGE----------------------------------------------------}}

                    <div class="form-group">
                        <label for="image" class="col-sm-2 control-label">Image</label>

                        <div class="col-sm-9">
                            <input type="file"
                                   class="lien form-control"
                                   id="image"
                                   name="image"
                                   placeholder="Url"
                                   accept="image/*"
                                   capture="capture">
                        </div>

                    </div>
                    @if ($errors->has('image')) <p
                            class="help-block text-danger">{{ $errors->first('image') }}</p>@endif

{{-----------------------IFRAME----------------------------------------------------}}

                    <div class="form-group">
                        <label for="trailer" class="col-sm-2 control-label">Trailer</label>

                        <div class="col-sm-9">
                            <input type="text"
                                   class="lien form-control"
                                   id="trailer"
                                   name="trailer"
                                   placeholder="Url">
                            @if ($errors->has('trailer')) <p
                                    class="help-block text-danger">{{ $errors->first('trailer') }}</p>@endif

                        </div>
                    </div>

{{-----------------------CATEGORIE----------------------------------------------------}}


                    <div class="form-group">
                        <label for="categories" class="col-sm-2 control-label">Catégorie</label>

                        <div class="col-sm-9">
                            <select class="form-control" name="categories" id="categories">
                                    <option>Choisir une catégorie</option>
                                @foreach( $categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('categories')) <p
                                    class="help-block text-danger">{{ $errors->first('categories') }}</p>@endif

                        </div>
                    </div>

{{-----------------------Language----------------------------------------------------}}


                    <div class="form-group">
                        <label for="languages" class="col-sm-2 control-label">Langue</label>

                        <div class="col-sm-9">
                            <select class="form-control" name="languages" id="languages">
                                <option>Choisir la langue</option>
                                <option value="fr">Francais</option>
                                <option value="en">Anglais</option>
                            </select>
                            @if ($errors->has('languages')) <p
                                    class="help-block text-danger">{{ $errors->first('languages') }}</p>@endif

                        </div>
                    </div>

{{-----------------------ACTEUR----------------------------------------------------}}

                    <div class="form-group">
                        <label for="moviesActors" class="col-sm-2 control-label">Acteurs</label>

                        <div class="col-sm-9">
                            <select class="select2-multiple form-control" multiple="multiple" name="moviesActors[]" id="moviesActors">
                                <option></option>
                                @foreach( $actors as $actor)
                                    <option value="{{ $actor->id }}">{{ $actor->firstname }} {{ $actor->lastname }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('moviesActors')) <p
                                    class="help-block text-danger">{{ $errors->first('moviesActors') }}</p>@endif

                        </div>
                    </div>

{{-----------------------REALISATEUR----------------------------------------------------}}

                    <div class="form-group">
                        <label for="moviesDirectors" class="col-sm-2 control-label">Réalisateur</label>

                        <div class="col-sm-9">
                            <select class="select2-multiple form-control" multiple="multiple"
                                    name="moviesDirectors[]" id="moviesDirectors">
                                <option></option>
                                @foreach( $directors as $director)
                                    <option value="{{ $director->id }}">{{ $director->firstname }} {{ $director->lastname }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('moviesDirectors')) <p
                                    class="help-block text-danger">{{ $errors->first('moviesDirectors') }}</p>@endif

                        </div>
                    </div>


{{-----------------------VISIBILITY----------------------------------------------------}}


                    <div class="form-group">
                        <label for="visible" class="col-sm-2 control-label">Visibilité</label>

                        <div class="col-sm-9">
                            <div class="switcher switcher-sm checked">
                                <input type="checkbox" name="visible" value="1"/>

                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>
                            @if ($errors->has('visible')) <p
                                    class="help-block text-danger">{{ $errors->first('visible') }}</p>@endif

                        </div>
                    </div>

{{-----------------------COVER----------------------------------------------------}}


                    <div class="form-group">
                        <label for="cover" class="col-sm-2 control-label">Couverture</label>

                        <div class="col-sm-9">

                            <div class="switcher switcher-sm checked">
                                <input type="checkbox" name="cover" value="1"/>

                                <div class="switcher-toggler"></div>
                                <div class="switcher-inner">
                                    <div class="switcher-state-on">ON</div>
                                    <div class="switcher-state-off">OFF</div>
                                </div>
                            </div>
                        @if ($errors->has('cover'))
                            <p class="help-block text-danger">{{ $errors->first('cover') }}</p>
                        @endif
                        </div>

                    </div>



{{-----------------------?----------------------------------------------------}}

                    <hr class="panel-wide">


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /5. $JQUERY_VALIDATION -->
    

@endsection