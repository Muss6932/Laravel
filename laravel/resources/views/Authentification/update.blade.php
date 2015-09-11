@extends('layout')




@section('title')
    <i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier profil
@endsection




@section('breadcrumb')
    {{--<li><a href="{{route('welcome')}}">Home</a></li>--}}
    {{--<li><a href="{{route('actors.index')}}">Mon profil</a></li>--}}
    {{--<li class="active"><a href="{{route('actors.create')}}">Modifier</a></li>--}}
@endsection




@section('content')

    <div class="row">
        <div class="col-sm-12">


            <div class="panel">
                <div class="panel-heading">
                    {{--<span class="panel-title">Nouvel acteur</span>--}}
                </div>
                <div class="panel-body">

                    <form enctype="multipart/form-data" method="post" action="{{ route('profil.maj') }}" class="form-horizontal formular-validate" novalidate="novalidate">

                    {{--IMPORTANT : CSRF--}}
                    {{ csrf_field() }}


                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nom</label>

                            <div class="col-sm-9">
                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" id="name" name="name" placeholder="{{ Auth::user()->name }}">
                                @if ($errors->has('name')) <p class="help-block text-danger">{{ $errors->first('name') }}</p>@endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">Prénom</label>

                            <div class="col-sm-9">
                                <input type="text" value="{{ Auth::user()->firstname }}" class="form-control" id="firstname" name="firstname" placeholder="{{ Auth::user()->firstname }}">
                                @if ($errors->has('firstname')) <p class="help-block text-danger">{{ $errors->first('firstname') }}</p>@endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-9">
                                <input type="text" value="{{ Auth::user()->email }}" class="form-control" id="email" name="email"
                                       placeholder="{{ Auth::user()->email }}">
                                @if ($errors->has('email')) <p
                                        class="help-block text-danger">{{ $errors->first('email') }}</p>@endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Mot de passe</label>

                            <div class="col-sm-9">
                                <input type="text" value="" class="form-control" id="password"
                                       name="password"
                                       placeholder="">
                                @if ($errors->has('password')) <p
                                        class="help-block text-danger">{{ $errors->first('password') }}</p>@endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="ville" class="col-sm-2 control-label">Ville</label>

                            <div class="col-sm-9">
                                <input type="text" value="{{ Auth::user()->ville }}"
                                       class="form-control" id="ville" name="ville"
                                       placeholder="{{ Auth::user()->ville }}">
                                @if ($errors->has('ville')) <p
                                        class="help-block text-danger">{{ $errors->first('ville') }}</p>@endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="imageurl" class="col-sm-2 control-label">Image</label>

                            <div class="col-sm-7">
                                <input type="text" value="{{ Auth::user()->image }}"
                                       class="form-control" id="imageurl" name="image"
                                       placeholder="{{ Auth::user()->image }}">
                                @if ($errors->has('image')) <p
                                        class="help-block text-danger">{{ $errors->first('image') }}</p>@endif

                            </div>
                            <div class="col-sm-2">
                                <img style="width: 100%;" src="{{ Auth::user()->image }}" alt="">

                            </div>
                        </div>



                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>

                            <div class="col-sm-9">
                                <textarea class="summernote form-control" name="description" id="description">{{ Auth::user()->description }}</textarea>
                                @if ($errors->has('description')) <p class="help-block text-danger">{{ $errors->first('description') }}</p>@endif
                            </div>

                        </div>






                        <hr class="panel-wide">



                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /5. $JQUERY_VALIDATION -->




        </div>
    </div>


@endsection