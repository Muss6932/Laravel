<!DOCTYPE html>
<html>
    <head>
        <title>Liste acteurs</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">


    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Pages index acteurs</h1>

                <h3>{{ $title }}</h3>

                <ul>
                    @foreach($noms as $nom)
                        <li>{{ $nom }}</li>
                    @endforeach
                </ul>

                @foreach($localite as $ville => $actors)
                <ul>
                    <li><b>{{ $ville }}</b></li>
                    @foreach($actors as $actor)
                    <ul>
                        <li>{{ $actor }}</li>
                    </ul>
                    @endforeach

                </ul>
                @endforeach

                @foreach($localite as $ville => $actors)
                    @if ($ville == 'Paris')
                    <ul>
                        <li><b>{{ $ville }}</b></li>
                        @foreach($actors as $actor)
                        <ul>
                            <li>{{ $actor }}</li>
                        </ul>
                        @endforeach

                    </ul>
                    @endif
                @endforeach

                @foreach ($acteurs as $clef => $tab)
                    <ul>
                        <li>
                            @foreach ($tab as $act => $info)
                            {{ $act . " : " . $info }}</br>
                            @endforeach
                        </li>
                    </ul>
                @endforeach

                <ul>
                    @foreach($acteurs as $acteur)
                    <li>{{ $acteur['nom'] . " " .  $acteur['prenom']}} a {{$acteur['age']}} ans </li>
                    @endforeach
                </ul>


            </div>
        </div>
    </body>
</html>
