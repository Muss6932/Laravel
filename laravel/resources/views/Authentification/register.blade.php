@extends('layout_logout')




@section('content')

    <div class="signin-header">
        <a href="" class="logo">
            <strong>Ciné</strong>3WA
        </a> <!-- / .logo -->
    </div>

    <h1 class="form-header">Inscription</h1>


    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">


            <form action="" method="post" class="panel form-horizontal">

                {{ csrf_field() }}


                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="text" name="name" class="form-control" value="{{ \Illuminate\Support\Facades\Input::old('name') }}" placeholder="Nom">
                            @if ($errors->has('name')) <p class="help-block text-danger">{{ $errors->first('name') }}</p>@endif

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="email" name="email" class="form-control"
                                   value="{{ \Illuminate\Support\Facades\Input::old('email') }}" placeholder="Email">
                            @if ($errors->has('email')) <p
                                    class="help-block text-danger">{{ $errors->first('email') }}</p>@endif

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                            @if ($errors->has('password')) <p
                                    class="help-block text-danger">{{ $errors->first('password') }}</p>@endif

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmer mot de passe">
                        </div>
                    </div>
                    <div class="row form-group text-center">
                        <p><i style="color: grey">Facultatif</i></p>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="text" name="firstname" class="form-control"
                                   value="{{ \Illuminate\Support\Facades\Input::old('firstname') }}"
                                   placeholder="Prénom">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="text" name="ville" class="form-control"
                                   value="{{ \Illuminate\Support\Facades\Input::old('ville') }}"
                                   placeholder="Ville">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <textarea type="text" name="description" class="form-control"
                                   placeholder="Description">{{ \Illuminate\Support\Facades\Input::old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="text" name="image" class="form-control" value="{{ \Illuminate\Support\Facades\Input::old('image') }}"
                                      placeholder="Url">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-info" style="width: 100%;">S'inscrire</button>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>








































@endsection