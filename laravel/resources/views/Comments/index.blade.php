@extends('layout')



@section('breadcrumb')
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li class="active"><a href="{{route('comments.index')}}">Commentaires</a></li>
@endsection



@section('title')
    <i class="fa fa-bars"></i>&nbsp;&nbsp;Liste des commentaires
@endsection



@section('content')

    {{--    OUVERTURE FORMULAIRE    --}}
    {!! Form::open(array('action' => 'CommentsController@getSelect', 'method' => 'get')) !!}


    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-10">
                    <span class="panel-title"><b>{{ $comments->count() }}</b> commentaires sur les films</span>
                </div>

                <div class="col-sm-2">
                    <div class="dropdown">
                        <button style="width: 100%" class="btn btn-default dropdown-toggle" type="button"
                                id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Action
                            <span class="caret"></span>
                        </button>
                        <ul style="width: 100%" class="dropdown-menu" id="actionslist" aria-labelledby="dropdownMenu1">
                            <li>
                                <button value="supprimer" name="submit" type="submit" style="width: 100%"
                                   class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i>&nbsp;&nbsp;Supprimer
                                </button>
                            </li>
                            <li>
                                <button value="activer" name="submit" type="submit" style="width: 100%"
                                   class="btn btn-default"><i class="fa fa-check"></i>&nbsp;&nbsp;En ligne
                                </button>
                            </li>
                            <li>
                                <button value="encours" name="submit" type="submit" style="width: 100%"
                                   class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;&nbsp;En cours de lecture
                                </button>
                            </li>
                            <li>
                                <button value="inactif" name="submit" type="submit" style="width: 100%"
                                   class="btn btn-default"><i class="fa fa-times"></i>&nbsp;&nbsp;Inactif
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-info">
                    <table cellpadding="0" cellspacing="0" border="0"
                           class="listComments table table-striped table-bordered dataTable no-footer" id="jq-datatables-example"
                           aria-describedby="jq-datatables-example_info">
                        <thead>
                        <tr>
                            <th style="width: 1rem">#</th>
                            <th>Contenu</th>
                            <th style="width: 25rem">Film</th>
                            <th style="width: 12rem">Utilisateur</th>
                            <th style="width: 4rem">Note</th>
                            <th style="width: 14rem">Status</th>
                            <th style="width: 8.5rem">Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ( $comments as $comment)

                            @if ( $comment->state == 2 )
                                <tr class="success">
                            @elseif( $comment->state == 1 )
                                <tr class="warning">
                            @elseif( $comment->state == 0 )
                                <tr class="danger">
                                    @endif
                                    <td>
                                        <label for="selectComments{{ $comment->id }}">{{ $comment->id }}</label>
                                        <input data-url="{{ route('comments.delete', [ 'id' => $comment->id ]) }}" type="checkbox" value="{{$comment->id}}"
                                               id="selectComments{{ $comment->id }}"
                                               name="selectComments[]">
                                    </td>
                                    <td>{{ $comment->content }}</td>
                                    <td>
                                        <a style="width: 100%" class="btn btn-info"
                                           href="{{ route('movies.read', [ 'id' => $comment->movies->id ] ) }}">
                                            {{ $comment->movies->title }}
                                        </a>

                                    </td>
                                    <td><b>{{ $comment->user->username }}</b></td>
                                    <td><span class="label label-primary">{{ $comment->note }}/5</span></td>
                                    <td>
                                        @if ( $comment->state == 2 )
                                            <span class="label label-success"><i class="fa fa-check"></i>&nbsp;&nbsp;En ligne</span>
                                        @elseif( $comment->state == 1 )
                                            <span class="label label-warning"><i class="fa fa-refresh"></i>&nbsp;&nbsp;En cours de lecture</span>
                                        @elseif( $comment->state == 0 )
                                            <span class="label label-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Inactif</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $comment->date_created != null)
                                            {{ (date_create_from_format('Y-m-d H:i:s', $comment->date_created)->format('d-m-Y H:i')) }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('comments.delete', [ 'id' => $comment->id ] ) }}"
                                           style="" class="btn btn-danger"><i class="fa fa-times"></i></a>

                                    </td>
                                </tr>

                                @endforeach

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>



    {!! Form::close() !!}







@endsection