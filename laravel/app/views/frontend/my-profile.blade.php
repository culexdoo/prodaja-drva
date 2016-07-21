@include('frontend.includes.navbar')
    <!-- banner start -->
    <div class="row m0 bg-whitesmoke">
        <div class="container">
            <div class="col-lg-12 p0">
                <ol class="breadcrumb mb0 fs16">
                    <li><a href="{{URL::route ('getLanding')}}">Naslovna</a>
                    </li>
                    <li class="active">Oglasi</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Image Header -->
    <div class="row m0">
        <div class="col-lg-12 p0">
            <div class="mh400" style="background-image: url(img/frontend/ad-list-banner.jpg);">
                <div class="container text-center ">
                    <h1 class="text-white mt100 fs65"> Korisnikov profil! </h1>
                    <h2 class="text-white fs33"> Pogledajte ostale oglase ovog korisnika! </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->
    <!-- profile start -->
    <div class="row m0 mt80">
        <div class="container">
            <div class="col-lg-3">
                <div class="row">
                    <div class="profile-picture">
                        <img src="img/frontend/profile-picture.jpg" class="img-responsive">
                        <a href="#" class="text-center btn-default btn-block pt11 fs16">Uredi sliku</a>
                    </div>
                    <div class="user-info pl10">
                        <h3>Ime i prezime</h3>
                    </div>
                    <div class="user-short-desc pl10">
                        <p>Lorem ipsum dolor sit amet, an vim dicant tempor deterruisset. Eos omnes dignissim ex, per te modo dictas.</p>
                    </div>
                    <div class="user-status pl10">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td style="width:80%">Status</td>
                                    <td><span class="label label-success">Aktivan</span></td>
                                </tr>
                                <tr>
                                    <td style="width:80%">Registriran od</td>
                                    <td>15.1.2016</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tabs widget" id="tabs">
                    <ul class="nav nav-tabs widget mt0">
                        <li class="active">
                            <a data-toogle="tab" href="#profile-tab">Profil </a>
                        </li>
                        <li>
                            <a data-toogle="tab" href="#ad-tab">Oglasi </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="profile-tab" class="tab-pane active">
                            <div class="p20">
                                <a href="#" class="btn-default custom-button"> Uredi </a>
                                <i class="fa fa-user fa-2x"></i>
                                <h3>Informacije o korisniku</h3>
                                <div class="row mt25">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Ime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">Ivana </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Prezime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">Ivanić </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Korisničko ime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">Ivana123 </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Email: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">ivana.ivanic@gmail.com </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Grad: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">Dubrovnik </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Primarni kontakt: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">09x / xxx - xx - xx </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Regija: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">Dubrovačko - neretvanska </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Sekundarni kontakt: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">09x / xxx - xx - xx </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Datum rođenja: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">02.06.1987. </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="ad-tab" class="tab-pane">
                            <div class="p20">
                                <a href="#" class="btn-default custom-button"> Objavi oglas </a>
                                <!-- single ad listing start -->
                                <div class="row box mt65">
                                    <div class="single-ad">
                                        <div class="col-lg-4 p0">
                                            <div class="ad-image">
                                                <img src="http://www.njuskalo.hr/image-w920x690/grijanje-hladenje-ostalo/drva-ogrijev-pilanski-odpat-brikete-slika-58707772.jpg" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mb20">
                                            <div class="ad-content">
                                                <div class="col-lg-10 p0">
                                                    <a href="single-ad-view.html">
                                                        <h3 class="ad-title">Lorem ipsum dolor sit amet</h3>
                                                    </a>
                                                </div>
                                                <div class="col-lg-2 p0">
                                                    <a href="single-ad-view.html">
                                                        <i class="fa fa-eye fa-2x pull-right mt5"></i>
                                                    </a>
                                                </div>
                                                <p class="ad-description">Lorem ipsum dolor sit amet....</p>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5 class="ad-category">Hrast</h5>
                                                        <h5 class="ad-category">Bukva</h5>
                                                        <h5 class="ad-category">Jasen</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ad-footer">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="county">
                                                            <h5>Zagrebačka</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="timestamp">
                                                            <h5>Objavljeno 21. 05. 2016.</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="price">
                                                            <h5><span class="price-eur">467 €</span> ~ 3500kn</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single ad listing end -->
                                <!-- single ad listing start -->
                                <div class="row box">
                                    <div class="single-ad">
                                        <div class="col-lg-4 p0">
                                            <div class="ad-image">
                                                <img src="http://www.njuskalo.hr/image-w920x690/grijanje-hladenje-ostalo/drva-ogrijev-pilanski-odpat-brikete-slika-58707772.jpg" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mb20">
                                            <div class="ad-content">
                                                <div class="col-lg-10 p0">
                                                    <a href="single-ad-view.html">
                                                        <h3 class="ad-title">Lorem ipsum dolor sit amet</h3>
                                                    </a>
                                                </div>
                                                <div class="col-lg-2 p0">
                                                    <a href="single-ad-view.html">
                                                        <i class="fa fa-eye fa-2x pull-right mt5"></i>
                                                    </a>
                                                </div>
                                                <p class="ad-description">Lorem ipsum dolor sit amet....</p>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5 class="ad-category">Hrast</h5>
                                                        <h5 class="ad-category">Bukva</h5>
                                                        <h5 class="ad-category">Jasen</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ad-footer">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="county">
                                                            <h5>Zagrebačka</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="timestamp">
                                                            <h5>Objavljeno 21. 05. 2016.</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="price">
                                                            <h5><span class="price-eur">467 €</span> ~ 3500kn</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single ad listing end -->
                                <!-- single ad listing start -->
                                <div class="row box">
                                    <div class="single-ad">
                                        <div class="col-lg-4 p0">
                                            <div class="ad-image">
                                                <img src="http://www.njuskalo.hr/image-w920x690/grijanje-hladenje-ostalo/drva-ogrijev-pilanski-odpat-brikete-slika-58707772.jpg" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mb20">
                                            <div class="ad-content">
                                                <div class="col-lg-10 p0">
                                                    <a href="single-ad-view.html">
                                                        <h3 class="ad-title">Lorem ipsum dolor sit amet</h3>
                                                    </a>
                                                </div>
                                                <div class="col-lg-2 p0">
                                                    <a href="single-ad-view.html">
                                                        <i class="fa fa-eye fa-2x pull-right mt5"></i>
                                                    </a>
                                                </div>
                                                <p class="ad-description">Lorem ipsum dolor sit amet....</p>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5 class="ad-category">Hrast</h5>
                                                        <h5 class="ad-category">Bukva</h5>
                                                        <h5 class="ad-category">Jasen</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ad-footer">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="county">
                                                            <h5>Zagrebačka</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="timestamp">
                                                            <h5>Objavljeno 21. 05. 2016.</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="price">
                                                            <h5><span class="price-eur">467 €</span> ~ 3500kn</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single ad listing end -->
                                <!-- single ad listing start -->
                                <div class="row box">
                                    <div class="single-ad">
                                        <div class="col-lg-4 p0">
                                            <div class="ad-image">
                                                <img src="http://www.njuskalo.hr/image-w920x690/grijanje-hladenje-ostalo/drva-ogrijev-pilanski-odpat-brikete-slika-58707772.jpg" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mb20">
                                            <div class="ad-content">
                                                <div class="col-lg-10 p0">
                                                    <a href="single-ad-view.html">
                                                        <h3 class="ad-title">Lorem ipsum dolor sit amet</h3>
                                                    </a>
                                                </div>
                                                <div class="col-lg-2 p0">
                                                    <a href="single-ad-view.html">
                                                        <i class="fa fa-eye fa-2x pull-right mt5"></i>
                                                    </a>
                                                </div>
                                                <p class="ad-description">Lorem ipsum dolor sit amet....</p>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5 class="ad-category">Hrast</h5>
                                                        <h5 class="ad-category">Bukva</h5>
                                                        <h5 class="ad-category">Jasen</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ad-footer">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="county">
                                                            <h5>Zagrebačka</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="timestamp">
                                                            <h5>Objavljeno 21. 05. 2016.</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="price">
                                                            <h5><span class="price-eur">467 €</span> ~ 3500kn</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single ad listing end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile end -->
        <!-- Izdvojeni oglasi start -->
        <div class="row m0">
            <div class="container">
                <div class="col-lg-12">
                    <h2 class="page-header text-center fs35">Izdvojeni oglasi</h2>
                    <div class="text-center h2-separator"></div>
                    <div class="text-center mb35 fs18">
                        Novi ste korisnik stranice? Pogledajte naše izdvojene oglase birane od strane starih korisnika.
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="featured-ad-view.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                    <div class="panel">
                        <div class="panel-body p0">
                            <a href="featured-ad-view.html">
                                <p class="featured-ad-title-homepage">Naslov 1</p>
                            </a>
                            <p class="featured-ad-price-homepage">100 kn </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="featured-ad-view.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                    <div class="panel">
                        <div class="panel-body p0">
                            <a href="featured-ad-view.html">
                                <p class="featured-ad-title-homepage">Naslov 2</p>
                            </a>
                            <p class="featured-ad-price-homepage">100 kn </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="featured-ad-view.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                    <div class="panel">
                        <div class="panel-body p0">
                            <a href="featured-ad-view.html">
                                <p class="featured-ad-title-homepage">Naslov 3</p>
                            </a>
                            <p class="featured-ad-price-homepage">100 kn </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="featured-ad-view.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                    <div class="panel">
                        <div class="panel-body p0">
                            <a href="featured-ad-view.html">
                                <p class="featured-ad-title-homepage">Naslov 4</p>
                            </a>
                            <p class="featured-ad-price-homepage">100 kn </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Izdvojeni oglasi end -->
        <!-- Featured list button start -->
        <div class="row m0 mb35">
            <div class="col-md-offset-4 col-md-4 text-center">
                <a class="btn btn-lg btn-default mt15 cta" href="featured-ad-list.html">Još izdvojenih oglasa</a>
            </div>
</div>

<script type="text/javascript">
        $('#tabs a').click(function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
        </script>

@include('frontend.includes.footer')