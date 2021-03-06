<!-- 2. $MAIN_NAVIGATION ===========================================================================

	Main navigation
-->
<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
    <!-- Main menu toggle -->
    <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>

    <div class="navbar-inner">
        <!-- Main navbar header -->
        <div class="navbar-header">

            <!-- Logo -->
            <a href="index.html" class="navbar-brand">
                <div><img alt="Pixel Admin" src="{{asset('images/pixel-admin/main-navbar-logo.png')}}"></div>
                PixelAdmin
            </a>

            <!-- Main navbar toggle -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

        </div> <!-- / .navbar-header -->

        <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
            <div>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('welcome') }}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-film"></i>&nbsp;&nbsp;Films</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('movies.index')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;Voir les films</a></li>
                            <li><a href="{{route('movies.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un film</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book"></i>&nbsp;&nbsp;Catégories</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('categories.index')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;Voir les catégories</a></li>
                            <li><a href="{{route('categories.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter une catégorie</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-star"></i>&nbsp;&nbsp;Acteurs</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('actors.index')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;Voir les acteurs</a></li>
                            <li><a href="{{route('actors.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un acteur</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-video-camera"></i>&nbsp;&nbsp;Réalisateurs</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('directors.index')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;Voir les réalisateurs</a></li>
                            <li><a href="{{route('directors.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un réalisateur</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ticket"></i>&nbsp;&nbsp;Cinémas</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('cinemas.index')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;Voir les
                                    cinémas</a></li>
                            <li><a href="{{route('cinemas.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un cinéma</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;&nbsp;Utilisateurs</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('users.index')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;Voir les utilisateurs</a></li>
                            <li><a href="{{route('users.create')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un utilisateur</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comment"></i>&nbsp;&nbsp;Commentaires</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('comments.index')}}"><i class="fa fa-search"></i>&nbsp;&nbsp;Voir les
                                    commentaires</a></li>
                            {{--<li><a href="{{route('comments.index')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter un--}}
                                    {{--utilisateur</a></li>--}}
                        </ul>
                    </li>
                    <li>
                        <form method="post" action="{{ route('search.tweet') }}" class="navbar-form pull-left">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" name="searchTweet" placeholder="Search">
                        </form>
                    </li>
                </ul> <!-- / .navbar-nav -->

                <div class="right clearfix">
                    <ul class="nav navbar-nav pull-right right-navbar-nav">

                        <!-- 3. $NAVBAR_ICON_BUTTONS =======================================================================

                                                    Navbar Icon Buttons

                                                    NOTE: .nav-icon-btn triggers a dropdown menu on desktop screens only. On small screens .nav-icon-btn acts like a hyperlink.

                                                    Classes:
                                                    * 'nav-icon-btn-info'
                                                    * 'nav-icon-btn-success'
                                                    * 'nav-icon-btn-warning'
                                                    * 'nav-icon-btn-danger'
                        -->
                        <li class="nav-icon-btn nav-icon-btn-danger dropdown">
                            <a href="#notifications" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="label">
                                    {{ \App\Model\Notifications::all()->count() }}
                                </span>
                                <i class="nav-icon fa fa-bullhorn"></i>
                                <span class="small-screen-text">Notifications</span>
                            </a>

                            <!-- NOTIFICATIONS -->

                            <!-- Javascript -->
                            <script>
                                init.push(function () {
                                    $('#main-navbar-notifications').slimScroll({ height: 250 });
                                });
                            </script>
                            <!-- / Javascript -->

                            <div class="dropdown-menu widget-notifications no-padding" style="width: 300px">
                                <div class="notifications-list" id="main-navbar-notifications">

                                    @forelse ( \App\Model\Notifications::orderBy('created_at','desc')->take(10)->get() as $notif)
                                    <div class="notification">
                                        @if($notif->category)
                                            <div class="notification-title text-{{ $notif->criticity or 'info' }}">CATÉGORIE : {{ $notif->category['title'] }}</div>
                                            <div class="notification-description">{{ $notif->message }} .</div>
                                        @elseif($notif->movie)
                                            <div class="notification-title text-{{ $notif->criticity or 'info' }}">FILM : {{ $notif->movie['title'] }}</div>
                                            <div class="notification-description">{{ $notif->message }} .
                                            </div>

                                        @endif
                                        <div class="notification-ago">{{ \Carbon\Carbon::createFromTimestamp(strtotime($notif->created_at))->diffForHumans() }}</div>
                                        <div class="notification-icon fa fa-hdd-o bg-{{ $notif->criticity or 'info' }}"></div>
                                    </div> <!-- / .notification -->
                                    @empty
                                    @endforelse


                                </div> <!-- / .notifications-list -->
                                <a href="#" class="notifications-link">MORE NOTIFICATIONS</a>
                            </div> <!-- / .dropdown-menu -->
                        </li>
                        <li class="nav-icon-btn nav-icon-btn-success dropdown">
                            <a href="#messages" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="label">
                                    {{ count(session('moviesLiked')) }}
                                </span>
                                <i class="nav-icon fa fa-envelope"></i>
                                <span class="small-screen-text">Income messages</span>
                            </a>

                            <!-- MESSAGES -->

                            <!-- Javascript -->
                            <script>
                                init.push(function () {
                                    $('#main-navbar-messages').slimScroll({ height: 250 });
                                });
                            </script>
                            <!-- / Javascript -->

                            <div class="dropdown-menu widget-messages-alt no-padding" style="width: 300px;">
                                <div class="messages-list" id="main-navbar-messages">

                                    @foreach ( session('moviesLiked', []) as $id)
                                    <div class="message">
                                        <img src="" alt="" class="message-avatar">
                                        <a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                                        <div class="message-description">
                                            from <a href="#">Robert Jang</a>
                                            &nbsp;&nbsp;·&nbsp;&nbsp;
                                            2h ago
                                        </div>
                                    </div> <!-- / .message -->
                                    @endforeach

                                </div> <!-- / .messages-list -->
                                <a href="#" class="messages-link">MORE MESSAGES</a>
                            </div> <!-- / .dropdown-menu -->
                        </li>
                        <!-- /3. $END_NAVBAR_ICON_BUTTONS -->

                        {{--<li>--}}
                            {{--<form class="navbar-form pull-left">--}}
                                {{--<input type="text" class="form-control" placeholder="Search">--}}
                            {{--</form>--}}
                        {{--</li>--}}

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                                <img src="{{ Auth::user()->image }}" alt="">
                                <span><b>{{ Auth::user()->name }}</b></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href=""><span class="label label-warning pull-right">New</span>Profil</a></li>
                                <li><a href="{{ route('profil.update') }}"><span class="badge badge-primary pull-right">New</span>Modifier</a></li>
                                <li><a href="#"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('auth/logout') }}"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                            </ul>
                        </li>
                    </ul> <!-- / .navbar-nav -->
                </div> <!-- / .right -->
            </div>
        </div> <!-- / #main-navbar-collapse -->
    </div> <!-- / .navbar-inner -->
</div> <!-- / #main-navbar -->
<!-- /2. $END_MAIN_NAVIGATION -->