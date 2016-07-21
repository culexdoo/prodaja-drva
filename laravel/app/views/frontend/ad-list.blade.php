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
                    <h1 class="text-white mt100 fs65"> Jednostavno do ogrijeva! </h1>
                    <h2 class="text-white fs33"> Pronađite drva za ogrijev u svojoj blizini i u svom cijenovnom rangu! </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->
    <div class="row m0">
        <div class="container mt80">
            <div class="col-lg-3">
                <div class="sidebar-listing-page">
                    <div class="col-lg-12 p0">
                        <!--- single widget start -->
                        <div class="panel panel-default m0">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">FILTER PO ŽUPANIJAMA</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body p0">
                                    <div class="widget-body">
                                        <div class="col-lg-4 p0">
                                            <div class="col-lg-12 search-county h50">
                                                <select class="choose-county">
                                                    <option value="">
                                                    </option>
                                                    <option value="zagrebacka-zupanija">
                                                        Zagrebačka županija
                                                    </option>
                                                    <option value="krapinsko-zagorska-zupanija">
                                                        Krapinsko-zagorska županija
                                                    </option>
                                                    <option value="sisacko-moslavacka-zupanija">
                                                        Sisačko-moslavačka županija
                                                    </option>
                                                    <option value="karlovacka-zupanija">
                                                        Karlovačka županija
                                                    </option>
                                                    <option value="varazdinska-zupanija">
                                                        Varaždinska županija
                                                    </option>
                                                    <option value="koprivnicko-krizevacka-zupanija">
                                                        Koprivničko-križevačka županija
                                                    </option>
                                                    <option value="bjelovarsko-bilogorska-zupanija">
                                                        Bjelovarsko-bilogorska županija
                                                    </option>
                                                    <option value="primorsko-goranska-županija">
                                                        Primorsko-goranska županija
                                                    </option>
                                                    <option value="licko-senjska-zupanija">
                                                        Ličko-senjska županija
                                                    </option>
                                                    <option value="viroviticko-podravska-zupanija">
                                                        Virovitičko-podravska županija
                                                    </option>
                                                    <option value="pozesko-slavonska-zupanija">
                                                        Požeško-slavonska županija
                                                    </option>
                                                    <option value="brodsko-posavska-zupanija">
                                                        Brodsko-posavska županija
                                                    </option>
                                                    <option value="zadarska-zupanija">
                                                        Zadarska županija
                                                    </option>
                                                    <option value="osjecko-baranjska-zupanija">
                                                        Osječko-baranjska županija
                                                    </option>
                                                    <option value="sibensko-kninska-zupanija">
                                                        Šibensko-kninska županija
                                                    </option>
                                                    <option value="vukovarsko-srijemska-zupanija">
                                                        Vukovarsko-srijemska županija
                                                    </option>
                                                    <option value="splitsko-dalmatinska-zupanija">
                                                        Splitsko-dalmatinska županija
                                                    </option>
                                                    <option value="istarska-zupanija">
                                                        Istarska županija
                                                    </option>
                                                    <option value="dubrovacko-neretvanska-zupanija">
                                                        Dubrovačko-neretvanska županija
                                                    </option>
                                                    <option value="medimurska-zupanija">
                                                        Međimurska županija
                                                    </option>
                                                    <option value="grad-zagreb">
                                                        Grad Zagreb
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- single widget end -->
                        <!--- single widget start -->
                        <div class="panel panel-default m0">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">FILTER PO VRSTI DRVETA</a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body p0">
                                    <div class="widget-body">
                                        <div class="col-lg-4 p0">
                                            <div class="col-lg-12 search-county h50">
                                                <i class="bgw icon-append"></i>
                                                <select class="choose-category">
                                                    <option value="">
                                                    </option>
                                                    <option value="ogrjevno-drvo">
                                                        Ogrjevno drvo
                                                    </option>
                                                    <option value="briketi">
                                                        Briketi
                                                    </option>
                                                    <option value="pelet">
                                                        Pelet
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- single widget end -->
                        <!--- single widget start -->
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default m0">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">FILTER PO PAKIRANJU</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body p0">
                                        <div class="widget-body">
                                            <div class="widget-body">
                                                <div class="col-lg-4 p0">
                                                    <div class="col-lg-12 search-county h50">
                                                        <i class="bgw icon-append"></i>
                                                        <select class="choose-package">
                                                            <option value="">
                                                            </option>
                                                            <option value="palete">
                                                                Palete
                                                            </option>
                                                            <option value="rinfuze">
                                                                Rinfuze
                                                            </option>
                                                            <option value="metrice">
                                                                Metrice
                                                            </option>
                                                            <option value="vrece">
                                                                Vreće
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- single widget end -->
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-lg cta btn-search" href="ad-list.html">Obriši</a>
                    <a class="btn btn-lg cta btn-search" href="ad-list.html">Traži</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="listing-container">
                @if (count($entry) > 0) 
                    @foreach($entry as $entry)
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
                                        <a href="{{ URL::route('showad', array('id' => $entry->id)) }}">
                                            <h3 class="ad-title">{{$entry->title}}</h3>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 p0">
                                        <a href="{{URL::route ('singleAd') }}">
                                            <i class="fa fa-eye fa-2x pull-right mt5"></i>
                                        </a>
                                    </div>
                                    <p class="ad-description">{{$entry->description}}</p>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="ad-category">{{$entry->wood}}</h5> 
                                        </div>
                                    </div>
                                </div>
                                <div class="ad-footer">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="county">
                                                <h5>{{$entry->region}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="timestamp">
                                                <h5>Objavljeno {{$entry->created_at}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="price">
                                                <h5><span class="price-eur">{{$entry->price}}</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single ad listing end -->
                    @endforeach
                        @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
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
    $('.choose-county').select2({
        placeholder: "Odaberite županiju",
        allowClear: true
    });
    $('.choose-category').select2({
        placeholder: "Odaberite kategoriju",
        allowClear: true
    });
    $('.choose-package').select2({
        placeholder: "Odaberite pakiranje",
        allowClear: true
    });
    </script>
    
@include('frontend.includes.footer')