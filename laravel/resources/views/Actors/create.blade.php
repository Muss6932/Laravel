@extends('layout')




@section('title')
    <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un acteur
@endsection




@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('actors.index')}}">Acteurs</a></li>
    <li class="active"><a href="{{route('actors.create')}}">Ajouter</a></li>
@endsection




@section('content')

    <div class="row">
        <div class="col-sm-12">


            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Nouvel acteur</span>
                </div>
                <div class="panel-body">

                    <form enctype="multipart/form-data" method="post" action="{{ route('actors.post') }}" class="form-horizontal formular-validate" novalidate="novalidate">

                    {{--IMPORTANT : CSRF--}}
                    {{ csrf_field() }}


                        <div class="form-group">
                            <label for="firstname" class="col-sm-3 control-label">Nom</label>

                            <div class="col-sm-9">
                                <input type="text" value="{{ \Illuminate\Support\Facades\Input::old('firstname') }}" class="form-control" id="firstname" name="firstname" placeholder="">
                                @if ($errors->has('firstname')) <p class="help-block text-danger">{{ $errors->first('firstname') }}</p>@endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">Prénom</label>

                            <div class="col-sm-9">
                                <input type="text" value="{{ \Illuminate\Support\Facades\Input::old('lastname') }}" class="form-control" id="lastname" name="lastname" placeholder="">
                                @if ($errors->has('lastname')) <p class="help-block text-danger">{{ $errors->first('lastname') }}</p>@endif
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="dob" class="col-sm-3 control-label">Date de naissance</label>

                            <div class="col-sm-9">
                                <div class="input-group date" id="bs-datepicker-component">
                                    <input type="text" value="{{ \Illuminate\Support\Facades\Input::old('dob') }}" name="dob" id="dob" class="date form-control"><span class="input-group-addon"><i
                                                class="fa fa-calendar"></i></span>

                                </div>
                                @if ($errors->has('dob')) <p class="help-block text-danger">{{ $errors->first('dob') }}</p>@endif

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="image" class="col-sm-3 control-label">Image</label>

                            <div class="col-sm-9">
                                <input type="file"
                                       class="lien form-control"
                                       id="image"
                                       name="image"
                                       placeholder="Url"
                                       accept="image/*"
                                       capture="capture" >
                                @if ($errors->has('image')) <p class="help-block text-danger">{{ $errors->first('image') }}</p>@endif

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nationality" class="col-sm-3 control-label">Nationalité</label>

                            <div class="col-sm-9">
                                <select class="form-control" name="nationality" id="nationality">
                                    <option></option>
                                    <option value="francaise">Française</option>
                                    <option value="anglaise">Anglaise</option>
                                    <option value="américaine">Américaine</option>
                                    <option value="italienne">Italienne</option>
                                </select>
                                @if ($errors->has('nationality')) <p class="help-block text-danger">{{ $errors->first('nationality') }}</p>@endif

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="roles" class="col-sm-3 control-label">Rôles</label>

                            <div class="col-sm-9">

                                <select class="form-control" name="roles" id="roles">
                                    <option></option>
                                    <option value="acteurs">Acteurs</option>
                                    <option value="compositeurs">Compositeurs</option>
                                    <option value="realisateurs">Réalisateurs</option>
                                </select>
                                @if ($errors->has('roles')) <p class="help-block text-danger">{{ $errors->first('roles') }}</p>@endif

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recompenses" class="col-sm-3 control-label">Récompense</label>

                            <div class="col-sm-9">
                                <textarea class="form-control" name="recompenses" id="recompenses">{{ \Illuminate\Support\Facades\Input::old('recompenses') }}</textarea>
                                @if ($errors->has('recompenses')) <p class="help-block text-danger">{{ $errors->first('recompenses') }}</p>@endif
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="biography" class="col-sm-3 control-label">Biographie</label>

                            <div class="col-sm-9">
                                <textarea class="summernote form-control" name="biography" id="biography">{{ \Illuminate\Support\Facades\Input::old('biography') }}</textarea>
                                @if ($errors->has('biography')) <p class="help-block text-danger">{{ $errors->first('biography') }}</p>@endif
                            </div>

                        </div>






                        <hr class="panel-wide">



                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /5. $JQUERY_VALIDATION -->




        </div>
    </div>


@endsection