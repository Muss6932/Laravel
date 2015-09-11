@extends('layout_logout')




@section('content')

    <div class="signin-header">
        <a href="{{route('actors.index')}}" class="logo">
            <strong>Ciné</strong>3WA
        </a> <!-- / .logo -->
        <a href="{{ url('auth/register') }}" class="btn btn-primary">S'inscrire</a>
    </div>

    <h1 class="form-header">Connectez-vous à votre compte</h1>


    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            @if( count($errors) > 0 )
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="" method="post" class="panel form-horizontal">
                {{ csrf_field() }}

                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                        </div>
                        <div class="col-sm-offset-6">
                            <a href="">Mot de passe oublié?</a>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-info" style="width: 100%;">Connexion</button>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>








































@endsection