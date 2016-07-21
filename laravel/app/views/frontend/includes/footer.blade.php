<div class="row m0">
        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer">
                            <div class="container">
                                <div class="clearfix">
                                    <div class="col-md-3">
                                        <div class="footer-logo">
                                            <a href="{{URL::route ('getLanding') }}"><img class="logo-img" src="/img/frontend/loog.png"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <dl class="footer-nav">
                                            <dt class="nav-title">PRODAJEM DRVA</dt>
                                            <dd class="nav-item"><a href="{{URL::route ('getLanding') }}">Naslovna</a></dd>
                                            <dd class="nav-item"><a href="{{URL::route ('adsCreate') }}">Prodajem drva</a></dd>
                                            <dd class="nav-item"><a href="{{URL::route ('adList') }}">Kupujem drva</a></dd>
                                            <dd class="nav-item"><a href="{{URL::route ('contact') }}">Kontakt</a></dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-3">
                                        <dl class="footer-nav">
                                            <dt class="nav-title">POVEZNICE</dt>
                                            <dd class="nav-item"><a href="uvjeti_koristenja.html">Uvjeti korištenja</a></dd>
                                            <dd class="nav-item"><a href="izjava_o_sigurnosti.html">Izjava o sigurnosti</a></dd>
                                            <dd class="nav-item"><a href="izjava_o_privatnosti.html">Izjava o privatnosti</a></dd>
                                            <dd class="nav-item"><a href="pravila_uvjeti.html">Pravila i uvjeti korištenja</a></dd>
                                        </dl>
                                    </div>
                                    @if (Auth::guest())
                                    <div class="col-md-3">
                                        <dl class="footer-nav">
                                            <dt class="nav-title">ČLANSTVO</dt>
                                            <dd class="nav-item"><a href="{{URL::route ('about')}}">O nama</a></dd>
                                            <dd class="nav-item"><a href="{{URL::route ('getSignIn') }}">Prijava</a></dd>
                                            <dd class="nav-item"><a href="{{URL::route ('getRegistration') }}">Registracija</a></dd>
                                        </dl>
                                    </div>
                                    @elseif (Auth::user())
                                    <div class="col-md-3">
                                        <dl class="footer-nav">
                                            <dt class="nav-title">ČLANSTVO</dt>
                                            <dd class="nav-item"><a href="{{URL::route ('about')}}">O nama</a></dd> 
                                        </dl>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="row m0 bg-color-38281b">
        <div class="container bg-color-38281b">
            <div class="footer" id="footer">
                <ul class=" pull-right navbar-link footer-nav">
                    <li>© 2016, made with passion @ <a class="col-white" href="http://culex.hr/" target="_blank"> culex.hr </a></li>
                </ul>
            </div>
        </div>
    </div>