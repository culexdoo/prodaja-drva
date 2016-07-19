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
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="sign-in.html">Prijava</a>
                        </li>
                        <li>
                            <a href="{{ URL::route('getRegistration') }}">Registracija</a>
                        </li>
                        <li>
                            <a href="publish-ad.html" class="btn btn-primary btn-lg cta mt0"> <i class="fa fa-pencil-square stat-icon pull-left mt4 mr8"></i> Objavite oglas
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </div>