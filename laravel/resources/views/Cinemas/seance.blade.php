@extends('layout')



@section('title')
    <i class="fa fa-ticket"></i>&nbsp;&nbsp;Ajouter une séance
@endsection



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('cinemas.seance')}}">Cinémas</a></li>
    <li class="active"><a href="{{route('cinemas.seance')}}">Ajouter une séance</a></li>
@endsection



@section('content')

    <div class="row">
        <div class="col-sm-12">


            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title" style="font-size: 2rem; font-weight: bolder">{{ $cinema->title }}</span>
                </div>
                <div class="panel-body">

                    <form method="post" action="{{ route('cinemas.post', [ 'id' => $cinema->id ]) }}"
                          class="form-horizontal" novalidate="novalidate">

                        {{--IMPORTANT : CSRF--}}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="movies" class="col-sm-2 control-label">Film</label>

                            <div class="col-sm-9">
                                <select class="select2-multiple form-control"  name="movies"
                                        id="movies">
                                    <option></option>
                                    @foreach( $movies as $movie)
                                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('movies')) <p class="help-block text-danger">{{ $errors->first('movies') }}</p>@endif

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dateSession" class="col-sm-2 control-label">Date de la séance</label>

                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <input type="text"
                                           value="{{ \Illuminate\Support\Facades\Input::old('dateSession') }}"
                                           name="dateSession"
                                           id="dateSession"
                                           class="date form-control">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                                @if ($errors->has('dateSession')) <p
                                        class="help-block text-danger">{{ $errors->first('dateSession') }}</p>@endif

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="heureSession" class="col-sm-2 control-label">Heure de la séance</label>

                            <div class="col-sm-9">
                                <div class="input-group date">
                                    <input type="text" class="form-control" name ="heureSession" id="timepicker2">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                                @if ($errors->has('heureSession')) <p
                                        class="help-block text-danger">{{ $errors->first('heureSession') }}</p>@endif

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter</button>
                            </div>
                        </div>







                    </form>
                </div>
            </div>
            <!-- /5. $JQUERY_VALIDATION -->


        </div>
    </div>



@endsection