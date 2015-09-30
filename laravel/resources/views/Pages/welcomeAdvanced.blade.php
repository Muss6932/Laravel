@extends('layout')


@section('js')

    @parent

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{asset('js/pageadvanced.js')}}"></script>


@endsection


@section('content')


    <div class="row" style="margin-bottom: 25px">
        <div class="col-sm-12">
            <div class="btn-group" role="group">
                <a class="btn" href="{{ route('welcome') }}">Simple</a>
                <button class="btn active" >Avancé</button>
                <a class="btn" href="{{ route('welcome.professional') }}">Professionnel</a>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-sm-12">
            <div id="map" style="width: 100%; height: 350px; margin-bottom: 50px"></div>

            @foreach($cinemas as $cinema)
            <marker style="display: none" class='cinemap' data-session="{{ $cinema->sessions->count() }}" data-title="{{ $cinema->title }}" id="{{ $cinema->id }}" data-adresse="{{ $cinema->adresse }} {{ $cinema->cp }} {{ $cinema->ville }}"></marker>
            @endforeach
        </div>

        <div class="col-sm-12">
            <div class="panel widget-threads">
                <div class="panel-heading">
                    <span class="panel-title"><i class="panel-title-icon fa fa-comments-o"></i>Recommandations cinémas</span>
                </div>
                <!-- / .panel-heading -->
                <div class="panel-body" style="height: 400px; overflow: scroll">

                    @foreach( $recommandations as $recommandation)
                    <div class="thread">
                        <img src="{{ $recommandation->cinema->logo }}" alt="{{ $recommandation->cinema->title }}" class="thread-avatar">

                        <div class="thread-body">
                            <span class="thread-time">{{ $recommandation->date_created }}</span>
                            <a href="#" class="thread-title">{{ $recommandation->accroche }}</a>
                            <p>{{ $recommandation->content }}</p>

                            <div class="thread-info">Rédigé par <a href="#" title="">{{ $recommandation->cinema->title }}</a> sur le film <a href="{{ route('movies.read', [ 'id' => $recommandation->movies->id ]) }}"
                                                                                                             title="">{{ $recommandation->movies->title }}</a></div>
                        </div>
                        <!-- / .thread-body -->
                    </div>
                    <!-- / .thread -->
                    @endforeach
                </div>
                <!-- / .panel-body -->
            </div>
        </div>


        <div class="row">
            <!-- 12. $NEW_USERS_TABLE ==========================================================================

                        New users table
            -->
            <div class="col-sm-5">
                <div class="panel panel-dark panel-light-green">
                    <div class="panel-heading">
                        <span class="panel-title"><i class="panel-title-icon fa fa-smile-o"></i>New users</span>
                        <!-- / .panel-heading-controls -->
                    </div>
                    <!-- / .panel-heading -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>

                        <tbody class="valign-middle">
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <img src="{{ $user->image }}" alt="" style="width:26px;height:26px;" class="rounded">&nbsp;&nbsp;
                                </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- / .panel -->
            </div>
            <!-- /12. $NEW_USERS_TABLE -->

            <!-- 13. $RECENT_TASKS =============================================================================

                        Recent tasks
            -->
            <div class="col-sm-7">
                <!-- Javascript -->
                <script>
                    init.push(function () {
                        $('.widget-tasks .panel-body').pixelTasks().sortable({
                            axis: "y",
                            handle: ".task-sort-icon",
                            stop: function (event, ui) {
                                // IE doesn't register the blur when sorting
                                // so trigger focusout handlers to remove .ui-state-focus
                                ui.item.children(".task-sort-icon").triggerHandler("focusout");
                            }
                        });
                        $('#clear-completed-tasks').click(function () {
                            $('.widget-tasks .panel-body').pixelTasks('clearCompletedTasks');
                        });
                    });
                </script>
                <!-- / Javascript -->


                {!! Form::open(array('action' => 'PagesController@selectTasks', 'method' => 'get', 'id' => 'deleteTasks')) !!}

                <div class="panel widget-tasks panel-dark-gray">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="panel-title-icon fa fa-tasks"></i>Taches</span>

                            <div class="panel-heading-controls">
                                <button type="submit" class="btn btn-xs btn-primary btn-outline dark" id="clear-completed-tasks"><i
                                            class="fa fa-eraser text-success"></i> Effacer les taches accomplies
                                </button>
                            </div>
                        </div>
                        <div class="panel-body no-padding-vr ui-sortable">

                            @foreach($tasks as $task)
                            <div class="task">
                                @if($task->level == 1)
                                    <span class="label label-warning pull-right">Haute</span>
                                @elseif($task->level == 3)
                                    <span class="label pull-right">Basse</span>
                                @endif
                                    <div class="fa fa-arrows-v task-sort-icon"></div>
                                <div class="action-checkbox">
                                    <label class="px-single"><input type="checkbox" name="selectTasks[]" value="{{ $task->id }}" class="px"><span
                                                class="lbl"></span></label>
                                </div>
                                <a href="#" class="task-title">{{ $task->movies->title }} - {{ $task->task }}<span>il y a {{ date_diff(date_create_from_format('Y-m-d H:i:s', $task->created_at), date_create())->format('%a') }} jours</span></a>
                            </div>
                            @endforeach

                        </div>
                    </div>

                {!! Form::close() !!}


            </div>

        </div>

        <div class="row">

            @foreach($actorpercity as $detail)
            <actorpercity style="display: none" data-count="{{ $detail->nombre }}" data-city="{{ $detail->city }}"></actorpercity>
            @endforeach

            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Répartition des acteurs par ville</span>
                    </div>
                    <div class="panel-body">

                        <div class="graph-container">
                            <div id="hero-bar" class="graph">

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            @foreach($actorAge as $age)
                <actorage style="display: none" data-age="{{ $age->age }}"></actorage>
            @endforeach

            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Répartition des acteurs par âge</span>
                    </div>
                    <div class="panel-body">
                        <div class="graph-container">
                            <div id="jq-flot-pie" class="pa-flot-graph"
                                 style="width: 522px; height: 205px; padding: 0px; position: relative;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Répartition des films par les 4 meilleurs réalisateurs</span>
                    </div>
                    <div class="panel-body">

                        <div class="graph-container">
                            <div id="hero-area" class="graph" style="position: relative;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        @foreach($directors as $director)
            <bestdirectors data-name="{{ $director->firstname }} {{ $director->lastname }}"></bestdirectors>
            @foreach($director->movies as $movie)
                <bestdirectorsmovies data-name="{{ $director->firstname }} {{ $director->lastname }}"
                                     data-datesortie="{{ $movie->date_release }}"></bestdirectorsmovies>
            @endforeach
        @endforeach


        <div class="row">

            <div class="panel widget-threads">
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Tweets</span>
                        </div>
                        <div class="panel-body">
                            @foreach( $mentions as $mention)
                                <div class="thread">
                                    <img src="{{ $mention->user->profile_image_url }}" alt="" class="thread-avatar">

                                    <div class="thread-body">
                                        <span class="thread-time">
                                            {{--On utilise la classe Twitter avec son alias (provider) pour l'avoir directement en timestamp--}}
                                            {{--Et non celle du dump car on a une chaine de caractere de la date ;)--}}
                                            {{ Twitter::ago($mention->created_at) }}
                                        </span>

                                        {!! $mention->source !!}
                                        <p>
                                            {!! Twitter::linkify($mention->text) !!}
                                        </p>
                                        {{--@foreach($mention->entities->hashtags as $tag)--}}
                                            {{--<a href="">#{{  $tag->text }}</a>--}}
                                        {{--@enforeach--}}

                                        <div class="thread-info">
                                            Commenté par
                                            <a href="{{ Twitter::linkUser($mention->user->name) }}" title="">{{ $mention->user->name }}</a>
                                        </div>
                                    </div>
                                    <!-- / .thread-body -->
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Tweets</span>
                        </div>
                        <div class="panel-body">
                            @foreach( $tweetallocine as $mention)
                                <div class="thread">
                                    <img src="{{ $mention->user->profile_image_url }}" alt="" class="thread-avatar">

                                    <div class="thread-body">
                                        <span class="thread-time">
                                            {{--On utilise la classe Twitter avec son alias (provider) pour l'avoir directement en timestamp--}}
                                            {{--Et non celle du dump car on a une chaine de caractere de la date ;)--}}
                                            {{ Twitter::ago($mention->created_at) }}
                                        </span>

                                        {!! $mention->source !!}
                                        <p>
                                            {!! Twitter::linkify($mention->text) !!}
                                        </p>
                                        {{--@foreach($mention->entities->hashtags as $tag)--}}
                                        {{--<a href="">#{{  $tag->text }}</a>--}}
                                        {{--@enforeach--}}

                                        <div class="thread-info">
                                            Commenté par
                                            <a href="{{ Twitter::linkUser($mention->user->name) }}"
                                               title="">{{ $mention->user->name }}</a>
                                        </div>
                                    </div>
                                    <!-- / .thread-body -->
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Mes derniers messages sur twitter</span>
                    </div>
                    <div class="panel-body">
                        @foreach( $messagesontwitter as $message)
                            <div class="thread">
                                <img src="{{ $message->sender->profile_image_url }}" alt="" class="thread-avatar">

                                <div class="thread-body">
                                    <span class="thread-time">
                                        {{--On utilise la classe Twitter avec son alias (provider) pour l'avoir directement en timestamp--}}
                                        {{--Et non celle du dump car on a une chaine de caractere de la date ;)--}}
                                        {{ Twitter::ago($message->created_at) }}
                                    </span>

                                    <p>{!! Twitter::linkify($message->text) !!}</p>


                                </div>
                                <!-- / .thread-body -->
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>








        <div style="margin-bottom: 100px"> </div>
    </div>{{--FIN ROW PRINCIPALE--}}




    {{--//Exemple api json ect--}}

    <script>
        init.push(function () {

            $.getJSON( $('#hero-areaza').data('url'), function (data) {
                var items = [];

                $.each( data, function( key, value ) {
                    items.push(value.firstname );
                });
                console.log(items);
            });
        })
    </script>

    <div class="graph-container">
        <div data-url="{{ url('admin/api/best-directors') }}" id="hero-areaza"></div>
    </div>







@endsection