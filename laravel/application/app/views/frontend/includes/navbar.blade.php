<div class="row m0 mh45">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top mh95" role="navigation">
            <div class="container mt25">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::route('getLanding') }}">
                        <img class="logo-img" src="/img/frontend/loog.png">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if (Auth::guest())
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ URL::route('getLanding') }}">Naslovna</a>
                        </li>
                        <li>
                            <a href="{{URL::route ('ClassifiedList') }}">Oglasi</a>
                        </li>
                        <li>
                            <a href="{{URL::route ('about')}}">O nama</a>
                        </li>
                        <li>
                            <a href="{{URL::route ('contact')}}">Kontakt</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('getSignIn') }}" class="bl1pxw">Prijava</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('getRegistration') }}">Registracija</a>
                        </li>
                        <li>
                            <a href="{{URL::route('CreateClassified') }}" class="btn btn-primary btn-lg cta mt0"> <i class="fa fa-pencil-square stat-icon pull-left mt4 mr8"></i> Objavite oglas
                            </a>
                        </li>
                    </ul>
                    @elseif (Auth::user())
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ URL::route('getLanding') }}">Naslovna</a>
                        </li>
                        <li>
                            <a href="{{URL::route ('ClassifiedList') }}">Oglasi</a>
                        </li>
                        <li>
                            <a href="{{URL::route ('about')}}">O nama</a>
                        </li>
                        <li>
                            <a href="{{URL::route ('contact')}}">Kontakt</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('MyProfile', array('id' => Auth::user()->id )) }}" class="bl1pxw">Moj profil</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('SignOut') }}">Odjava</a>
                        </li>
                        <li>
                            <a href="{{URL::route('CreateClassified') }}" class="btn btn-primary btn-lg cta mt0"> <i class="fa fa-pencil-square stat-icon pull-left mt4 mr8"></i> Objavite oglas
                            </a>
                        </li>
                    </ul>
                      @endif
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </div>
    