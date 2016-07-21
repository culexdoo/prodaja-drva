@include('frontend.includes.navbar')
    <!-- Page Content -->
    <div class="row m0 bg-whitesmoke">
        <div class="container">
            <div class="col-lg-12 p0">
                <ol class="breadcrumb mb0 fs16 pl0">
                    <li><a href="{{URL::route ('getLanding')}}">Naslovna</a>
                    </li>
                    <li class="active">Oglas xy</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row m0">
        <!-- Page Heading/Breadcrumbs -->
        <!-- Intro Content -->
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Oglas xy
                </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row m0">
        <div class="container">
            <!-- /.row -->
            <!-- Portfolio Item Row -->
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="add-ad-image">
                                <img class="img-responsive" src="{{ $entry->image }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div style='overflow:hidden;height:300px;width:400px;'>
                                <div id='gmap_canvas' style='height:300px;width:400px;'></div>
                                <div><small><a href="http://embedgooglemaps.com">                                   embed google maps                           </a></small></div>
                                <div><small><a href="https://privacypolicytemplate.net">privacy policy template</a></small></div>
                                <style>
                                #gmap_canvas img {
                                    max-width: none!important;
                                    background: none!important
                                }
                                </style>
                            </div>
                        </div>
                    </div>
                    <div class="row p0 mt25">
                        <div class="col-lg-12">
                            <table class="table table-reflow table-hover">
                                <thead>
                                    <tr>
                                        <th>Podaci o korisniku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Datum dodavanja</th>
                                        <td>{{ $entry->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lokacija</th>
                                        <td>{{ $region->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cijena</th>
                                        <td>{{ $entry->price }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kontakt</th>
                                        <td>{{ $user->contact1 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <h2 class="page-header">Sadržaj oglasa</h2>
                        </div>
                        <div class="col-lg-12">
                            {{ $entry->description }}
                        </div>
                        <!-- Kontakt forma start -->
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <h3 class="mtb30 pl15">Za dodatne informacije javite se autoru</h3>
                                <form name="sentMessage" id="contactForm" novalidate="">
                                    <div class="col-lg-6">
                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <label>Vaše ime:</label>
                                                <input type="text" class="form-control" id="name" required="" data-validation-required-message="Unesite vaše ime.">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <label>Vaše prezime:</label>
                                                <input type="text" class="form-control" id="last-name" required="" data-validation-required-message="Unesite vaše prezime.">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <label>Kontakt broj:</label>
                                                <input type="tel" class="form-control" id="phone" required="" data-validation-required-message="Unesite vaš kontakt.">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <label>Email:</label>
                                                <input type="email" class="form-control" id="email" required="" data-validation-required-message="Unesite vaš email.">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <label>Poruka:</label>
                                                <textarea rows="10" cols="100" class="form-control" id="message" required="" data-validation-required-message="Unesite svoju poruku" maxlength="999" style="resize:none" aria-invalid="false"></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div id="success"></div>
                                        <!-- For success/fail messages -->
                                        <button type="submit" class="btn btn-lg btn-default mt15 cta ml0">Pošaljite</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Kontakt forma end -->
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row m0 mb35">
                        <div class="avatar">
                            <img src="http://www.index.hr/oglasi/img/avatar-default.jpg" style="width: 100px;">
                        </div>
                        <div class="user-data">
                            <h4 class="mb20">{{ $user->username }}</h4>
                            <p>Registriran od: {{ $user->created_at }}</p> 
                            <p>Kontakt: {{ $user->contact1 }}</p>
                        </div>
                        <i class="fa fa-arrow-right pull-left"></i><a href="#"> Detaljnije o oglašivaču </a>
                        <div class="mt30">
                            <p>Imate pitanje vezano za oglašavanje?</p>
                            <a class=" btn btn-lg cta mb35 ml0" href="{{URL::route ('contact') }}">Pošaljite mail</a> 
                        </div>
                        
                    </div>
                    <div class="row m0">
                        <h3 class="m0 mb35">Podijelite s prijateljima</h3>
                        <div class="text-center mb35">
                            <a href="#">
                                <img class="m5" src="/img/frontend/facebook.jpg">
                            </a>
                            <a href="#">
                                <img class="m5" src="/img/frontend/twitter.jpg">
                            </a>
                            <a href="#">
                                <img class="m5" src="/img/frontend/print.jpg">
                            </a>
                        </div>
                    </div>
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
            </div>
        </div>
    </div>
    <div class="row m0">
        <div class="container">
            <div class="row m0 text-center mb35">
                <div class="col-lg-12">
                    <h2 class="page-header fs35">Slični oglasi</h2>
                    <div class="text-center h2-separator"></div>
                </div>
                <div class="text-center mb35">
                    Niste našli ono što tražite? Potražite u ovoj sekciji oglas koji vam odgovara, možda ga baš ovdje pronađete.
                </div>
            </div>
            <div class="col-lg-12">
                <div class="customnavigation">
                    <a class="btn prev"><span class="glyphicon glyphicon-menu-left"></span></a>
                    <a class="btn next"><span class="glyphicon glyphicon-menu-right"></span></a>
                </div>
            </div>
            <div id="owl-demo" class="owl-carousel owl-theme mt65">
                <div class="item">
                    <div class="col-lg-12">
                        <a href="#">
                            <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                        </a>
                        <div class="panel">
                            <div class="panel-body p0">
                                <a href="#">
                                    <p class="ad-title-homepage">Naslov 1</p>
                                </a>
                                <p class="ad-price-homepage">200 kn </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-12">
                        <a href="#">
                            <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                        </a>
                        <div class="panel">
                            <div class="panel-body p0">
                                <a href="#.html">
                                    <p class="ad-title-homepage">Naslov 2</p>
                                </a>
                                <p class="ad-price-homepage">200 kn </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-12">
                        <a href="#.html">
                            <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                        </a>
                        <div class="panel">
                            <div class="panel-body p0">
                                <a href="#.html">
                                    <p class="ad-title-homepage">Naslov 3</p>
                                </a>
                                <p class="ad-price-homepage">200 kn </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-12">
                        <a href="#.html">
                            <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                        </a>
                        <div class="panel">
                            <div class="panel-body p0">
                                <a href="#.html">
                                    <p class="ad-title-homepage">Naslov 4</p>
                                </a>
                                <p class="ad-price-homepage">200 kn </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-12">
                        <a href="#.html">
                            <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                        </a>
                        <div class="panel">
                            <div class="panel-body p0">
                                <a href="#.html">
                                    <p class="ad-title-homepage">Naslov 5</p>
                                </a>
                                <p class="ad-price-homepage">200 kn </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-12">
                        <a href="#.html">
                            <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                        </a>
                        <div class="panel">
                            <div class="panel-body p0">
                                <a href="#.html">
                                    <p class="ad-title-homepage">Naslov 6</p>
                                </a>
                                <p class="ad-price-homepage">200 kn </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-12">
                        <a href="#.html">
                            <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                        </a>
                        <div class="panel">
                            <div class="panel-body p0">
                                <a href="#">
                                    <p class="ad-title-homepage">Naslov 7</p>
                                </a>
                                <p class="ad-price-homepage">200 kn </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Projects Row end -->
    <!-- Paralax background & tipka za oglašavanje start -->
    <section class="callout-section mt65" style="background:url(/img/frontend/callout-bg1.jpg) center center fixed">
        <div class="container ">
            <div class="callout clearfix">
                <div class="callout-inner">
                    <div class="callout-title">
                        <h4>ŽELITE OBJAVITI OGLAS?</h4></div>
                    <div class="callout-desc">
                        <p>BRZ I JEDNOSTAVAN NAČIN ZA PRODAJU VAŠEG MATERIJALA.</p>
                    </div>
                </div>
                <div class="view-more-btn">
                    <div class="more-btn-inner">
                        <a href="{{URL::route ('adsCreate')}}">
                            <span>Objavite oglas </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type='text/javascript'>
    function init_map() {
        var myOptions = {
            zoom: 14,
            center: new google.maps.LatLng(45.5560347, 18.675236100000006),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(45.5560347, 18.675236100000006)
        });
        infowindow = new google.maps.InfoWindow({
            content: '<strong>Title</strong><br>gunduliceva ulica, osijek<br>'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
    }
    google.maps.event.addDomListener(window, 'load', init_map);
    </script>
    <script>
    $(document).ready(function() {
        var owl = $("#owl-demo");

        owl.owlCarousel({
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 4], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            dotsContainer: false
        });

        $(".next").click(function() {
            owl.trigger('owl.next');
        })
        $(".prev").click(function() {
            owl.trigger('owl.prev');
        })

    });
    </script>
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