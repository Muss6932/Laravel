@extends('layout')




@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des films
@endsection




@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('movies.index')}}">Films</a></li>
@endsection




@section('content')

    <div class="row">
        <div class="col-sm-8">
            <div class="stat-panel">
                <a href="#"
                   class="stat-cell col-xs-5 bg-info bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                    <i class="fa fa-film"></i>&nbsp;&nbsp;<strong>{{$countMovies}} films</strong>
                </a> <!-- /.stat-cell -->
                <!-- Without padding, extra small text -->
                <div class="stat-cell col-xs-7 no-padding valign-middle">
                    <!-- Add parent div.stat-rows if you want build nested rows -->
                    <div class="stat-rows">
                        <div class="stat-row">
                            <!-- Success background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-info padding-sm valign-middle">
                                {{ $countMoviesInCover }} films en avant
                                <i class="fa fa-star pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darken background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-info darken padding-sm valign-middle">
                                @if($countMoviesTomorrow == 1){{ $countMoviesTomorrow }} film pas encore sorti
                                @else {{ $countMoviesTomorrow }} films pas encore sortis
                                @endif
                                <i class="fa fa-bug pull-right"></i>
                            </a>
                        </div>
                        <div class="stat-row">
                            <!-- Success darker background, small padding, vertically aligned text -->
                            <a href="#" class="stat-cell bg-info darker padding-sm valign-middle">
                                @if ($countMoviesInactive == 1){{ $countMoviesInactive }} film inactif
                                @else {{ $countMoviesInactive }} films inactifs
                                @endif
                                <i class="fa fa-eye-slash pull-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- /.stat-rows -->
                </div>
                <!-- /.stat-cell -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="stat-panel">
                <!-- Success background. vertically centered text -->
                <div class="stat-cell bg-danger valign-middle">
                    <!-- Stat panel bg icon -->
                    <i class="fa fa-usd bg-icon"></i>
                    <!-- Extra large text -->
                    <span class="text-xlg"><strong>{{ $budgetAnnee['budget'] }} $</strong></span><br>
                    <!-- Big text -->
                    <span class="text-bg">Budget</span><br>
                    <!-- Small text -->
                    <span class="text-sm">Total de l'année {{ $budgetAnnee['year'] }}</span>
                </div>
                <!-- /.stat-cell -->
            </div>
        </div>
    </div>


{{--    OUVERTURE FORMULAIRE    --}}
    {!! Form::open(array('action' => 'MoviesController@select', 'method' => 'get')) !!}



    <div class="panel">
        <div class="panel-heading">

            <div class="row">
                <div class="col-sm-3">
                    <a style="width: 100%" class=" btn btn-success" href="{{ route('movies.create') }}">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un film
                    </a>

                    <div class="dropdown">
                        <button style="width: 100%" class="btn btn-default dropdown-toggle" type="button"
                                id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Action
                            <span class="caret"></span>
                        </button>
                        <ul style="width: 50%" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li>
                                <button value="supprimer" name="submit" type="submit" style="width: 100%"
                                        class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer
                                </button>
                            </li>
                            <li>
                                <button value="activer" name="submit" type="submit" style="width: 100%"
                                        class="btn btn-defaut"><i class="fa fa-eye"></i>&nbsp;&nbsp;Activer
                                </button>
                            </li>
                            <li>
                                <button value="desactiver" name="submit" type="submit" style="width: 100%"
                                        class="btn btn-defaut"><i class="fa fa-eye-slash"></i>&nbsp;&nbsp;Désactiver
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="btn-toolbar btn-group-sm pull-right" role="toolbar">

                    <div class="btn-group" role="group">
                        <a class="btn btn-primary @if( $column == null && $value == null)active @endif" href="{{route('movies.index')}}"><i class="fa fa-bars"></i>&nbsp;&nbsp;Tous</a>
                    </div>

                    <div class="btn-group" role="group">
                        <a class="btn btn-primary @if( $column == 'bo' && $value == "VO")active @endif" href="{{ route('movies.index', [ 'column' => 'bo' , 'value' => "VO" ] ) }}"><i class="fa fa-search"></i>&nbsp;&nbsp;VO</a>
                        <a class="btn btn-primary @if( $column == 'bo' && $value == "VF")active @endif" href="{{ route('movies.index', [ 'column' => 'bo' , 'value' => "VF" ] ) }}"><i class="fa fa-search"></i>&nbsp;&nbsp;VF</a>
                        <a class="btn btn-primary @if( $column == 'bo' && $value == "VOST")active @endif" href="{{ route('movies.index', [ 'column' => 'bo' , 'value' => "VOST" ] ) }}"><i class="fa fa-search"></i>&nbsp;&nbsp;VOST</a>
                        <a class="btn btn-primary @if( $column == 'bo' && $value == "VOSTFR")active @endif" href="{{ route('movies.index', [ 'column' => 'bo' , 'value' => "VOSTFR" ] ) }}"><i class="fa fa-search"></i>&nbsp;&nbsp;VOSTFR</a>
                    </div>

                    <div class="btn-group" role="group">
                        <a class="btn btn-primary @if( $column == 'visible' && $value == 1 )active @endif" href="{{ route('movies.index', [ 'column' => 'visible' , 'value' => 1 ] ) }}"><i class="fa fa-eye"></i>&nbsp;&nbsp;Visible</a>
                        <a class="btn btn-primary @if( $column == 'visible' && $value == 0 )active @endif" href="{{ route('movies.index', [ 'column' => 'visible' , 'value' => 0 ] ) }}"><i class="fa fa-eye-slash"></i>&nbsp;&nbsp;Invisible</a>
                    </div>

                    <div class="btn-group" role="group">
                        <a class="btn btn-primary @if( $column == 'distributeur' && $value == 'Warner_Bros')active @endif" href="{{ route('movies.index', [ 'column' => 'distributeur' , 'value' => 'Warner_Bros' ] ) }}"><i class="fa fa-eye"></i>&nbsp;&nbsp;Warner Bros</a>
                        <a class="btn btn-primary @if( $column == 'distributeur' && $value == 'HBO')active @endif" href="{{ route('movies.index', [ 'column' => 'distributeur' , 'value' => 'HBO' ] ) }}"><i class="fa fa-eye"></i>&nbsp;&nbsp;HBO</a>
                    </div>
                </div>
            </div>
        </div>




        </div>

        <div class="panel-body">
            <div class="table-primary">
                <div role="grid" id="jq-datatables-example_wrapper" class="dataTables_wrapper form-inline no-footer">



                    <table cellpadding="0" cellspacing="0" border="0"
                           class="table table-striped table-bordered dataTable no-footer" id="jq-datatables-example"
                           aria-describedby="jq-datatables-example_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 2%;">
                                ID
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 10%;">
                                Image
                            </th>
                            <th style="width: 10%;">Activation</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column ascending" style="width: 15%;">
                                Film
                            </th>
                            <th style="width: 15%;">Catégorie
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 80px;">Synopsis
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="jq-datatables-example" rowspan="1"
                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                style="width: 8%;">Année
                            </th>
                            <th style="width: 10%;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($movies as $movie)
                            <tr class="gradeA odd">
                                <td>
                                    <label for="selectFilm{{ $movie->id }}">{{ $movie->id }}</label>
                                    <input type="checkbox" value="{{$movie->id}}" id="selectFilm{{ $movie->id }}" name="selectFilm[]">
                                </td>
                                <td><a href="{{ route('movies.read', [ 'id' => $movie->id ] ) }}"><img
                                                style="width: 100%" src="{{ $movie->image }}" alt=""></a></td>
                                <td>
                                    <div>
                                        @if ( $movie->visible == 1)
                                            <a href="{{ route('movies.activate', [ 'id' => $movie->id , 'activate' => 'visible' , 'value' => 0 ] ) }}">
                                            <i class="fa fa-check-square"></i> Visibilité
                                            </a>
                                        @else
                                            <a href="{{ route('movies.activate', [ 'id' => $movie->id , 'activate' => 'visible' , 'value' => 1 ] ) }}">
                                            <i class="fa fa-square-o"></i> Visibilité
                                            </a>
                                        @endif
                                    </div>
                                    <div>
                                        @if ( $movie->cover == 1)
                                            <a href="{{ route('movies.activate', [ 'id' => $movie->id , 'activate' => 'cover' , 'value' => 0 ] ) }}">
                                                <i class="fa fa-star"></i> Couverture
                                            </a>
                                        @else
                                            <a href="{{ route('movies.activate', [ 'id' => $movie->id , 'activate' => 'cover' , 'value' => 1 ] ) }}">
                                                <i class="fa fa-star-o"></i> Couverture
                                            </a>
                                        @endif
                                    </div>


                                </td>
                                <td  style="font-weight: bold; color: #090E0F"><a
                                            href="{{ route('movies.read', [ 'id' => $movie->id ] ) }}">{{ $movie->title }}</a>
                                </td>
                                <td><i>{{ $movie->categories->title }}</i> </td>
                                <td>{{\Illuminate\Support\Str::limit($movie->synopsis, 100) }}</td>
                                <td>{{$movie->annee}}</td>
                                <td>
                                    <a style="width: 100%" class="btn btn-default" href="{{ route('movies.update', [ 'id' => $movie->id ] ) }}">
                                        <i class="fa fa-wrench"></i>&nbsp;&nbsp;Modifier
                                    </a>
                                    <a style="width: 100%" class="btn btn-danger" href="{{ route('movies.delete', [ 'id' => $movie->id ] ) }}">
                                    <i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        {!! Form::close() !!}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
