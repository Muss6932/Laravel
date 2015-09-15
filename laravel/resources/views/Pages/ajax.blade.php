        <div class="panel-heading">
            <span class="panel-title"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Prochaines séances</span>
            <a href="#" class=" pull-right"><b>{{ count($seanceavenir) }}</b> séance à venir</a>
        </div>

        <ul class="list-group">
            @foreach( $seanceavenir as $seance)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-sm-10">
                            <a href="">{{ $seance->movie }}</a>

                            <p><span style="color: grey; font-style: italic ">Diffusé à</span> {{ $seance->cinema }}</p>
                        </div>
                        <div class="col-sm-2">
                            <?php $jourrestant = date_diff(date_create_from_format('Y-m-d H:i:s', $seance->date), date_create())->format('%a') ?>
                            @if( $jourrestant < 2)
                                <span class="label label-warning pull-right">Sortis dans {{ $jourrestant }}
                                    jours</span>
                            @elseif($jourrestant < 11)
                                <span class="label label-success pull-right">Sortis dans {{ $jourrestant }} jours</span>
                            @elseif($jourrestant > 10)
                                <span class="label label-primary pull-right">Sortis dans {{ $jourrestant }}
                                    jours</span>
                            @endif

                        </div>
                    </div>

                </li>
            @endforeach
        </ul>


