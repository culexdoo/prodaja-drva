<div id="navigation8">
    <nav class="navbar navbar-default">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-sm" href="{{ URL::route('getLanding') }}"><img src="/img/frontend/loog.png" alt="Logo"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::route('getLanding') }}">Naslovna</a></li>
                <li><a href="{{ URL::route('ClassifiedList') }}">Oglasi</a></li>
                <li><a href="{{ URL::route('contact') }}">Kontakt</a></li>
            </ul>
            @if (Auth::Guest())
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::route('about') }}">O nama</a></li>
                <li><a href="{{ URL::route('getRegistration') }}">Registracija</a></li>
                <li><a href="{{ URL::route('getSignIn') }}">Prijava</a></li>
            </ul>
            @elseif(Auth::User())
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::route('about') }}">O nama</a></li>
                <li><a href="{{ URL::route('MyProfile') }}">Moj profil</a></li>
                <li><a href="{{ URL::route('SignOut') }}">Odjava</a></li>
            </ul>
            @endif
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</div> <!-- /#navigation8 -->
    