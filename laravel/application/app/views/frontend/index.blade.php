@include('frontend.includes.navbar')
<div class="row m0">
        <!-- Header Carousel -->
        <div class="mh400" style="background-image: url(img/frontend/main-banner.jpg);">
            <div class="container text-center ">
                <h1 class="text-white mt100"> Pretražite oglasnik </h1>
                <div class="row">
                    <div class="container posrel83l">
                    {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                        <div class="col-lg-4 p0">
                            <div class="col-lg-12 search-county h50">
                                <i class="fa fa-map-marker fa-2x bgw icon-append"></i>
                                {{ Form::select('region',  ['' => 'Odaberite županiju'] + $regionslist, null, array('class' => 'choose-county', 'style' => 'border:none; color:#999', 'id' => 'id')) }}
                            </div>
                        </div>
                        <div class="col-lg-4 p0">
                            <div class="col-lg-12 search-county bl1pxs h50">
                                <i class="fa fa-tree fa-2x bgw icon-append"></i>
                                {{ Form::select('wood', ['' => 'Vrsta drveta'] + $woodlist, isset($wood) ? $wood : null, array('class' => 'choose-category', 'style' => 'width:100%', 'id' => 'id')) }}
                            </div>
                        </div>
                        <div class="col-lg-2 mt4 p0">
                            <button class="btn btn-primary btn-block br0 h50 ml0"><i class="fa fa-search pull-left"></i><strong>Pretražite</strong></button>
                        </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kategorije start -->
    <div class="row m0 mtb120">
        <div class="container">
            <div class="row m0">
                <div class="col-lg-12">
                    <h2 class="page-header text-center fs40">Kategorije</h2>
                    <div class="text-center h2-separator"></div>
                    <div class="text-center mb35 fs18">
                        Izaberite optimalan ogrijevni materijal za vašu peć. Jednim klikom do toplijeg doma.
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-link-home">
                        <div class="row m0">
                            <div class="col-lg-12">
                                <img src="img/frontend/ogrjevno-drvo.png" class="img-reponsive" />
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5 class="category-title-homepage">Ogrjevno drvo</h5>
                                <a href="{{ URL::route('ListAdsByWoodCategory', array('woodcategory' => 'ogrjevno-drvo' )) }}" class="btn btn-primary btn-lg cta"> <i class="fa fa-eye pull-left mt2"></i>Pogledajte</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-link-home">
                        <div class="row m0">
                            <div class="col-lg-12">
                                <img src="img/frontend/briketi.png" class="img-reponsive" />
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5 class="category-title-homepage ">Briketi</h5>
                                <a href="{{ URL::route('ListAdsByWoodCategory', array('woodcategory' => 'briketi' )) }}" class="btn btn-primary btn-lg  cta"><i class="fa fa-eye pull-left mt2"></i>Pogledajte</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="category-link-home">
                        <div class="row m0">
                            <div class="col-lg-12">
                                <img src="img/frontend/pelet.png" class="img-reponsive" />
                            </div>
                            <div class="col-lg-12 text-center">
                                <h5 class="category-title-homepage">Pelet</h5>
                                <a href="{{ URL::route('ListAdsByWoodCategory', array('woodcategory' => 'pelet' )) }}" class="btn btn-primary btn-lg  cta"><i class="fa fa-eye pull-left mt2"></i>Pogledajte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kategorije end -->
    <!-- Google map start -->
    <div class="row m0 mtb120">
        <div class="col-lg-12 p0">
            <div id="googlemap" class="map">
            </div>
        </div>
    </div>
    <!-- Google map end -->
    <!-- Lista županija start -->
    <section id="locations">
        <div class="container">
            <h2 class="page-header text-center fs40">Izaberite županiju</h2>
            <div class="text-center h2-separator"></div>
            <div class="text-center mb35 fs18">
                U kojoj god županiji - gradu se nalazili, naša drva će pronaći put do vas.
            </div>
            <div class="h2-seprator"></div>
            <div class="location clearfix">
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{ URL::route('ListAdsByRegion', array('region' => 'dubrovacko-neretvanska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Dubrovačko-neretvanska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'krapinsko-zagorska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Krapinsko-zagorska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'sisacko-moslavacka-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Sisačko-moslavačka županija</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'karlovacka-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Karlovačka županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'varazdinska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Varaždinska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'licko-senjska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Ličko-senjska županija</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'bjelovarsko-bilogorska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Bjelovarsko-bilogorska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'viroviticko-podravska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Virovitičko-podravska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'koprivnicko-krizevacka-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Koprivničko-križevačka županija</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'osjecko-baranjska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Osječko-baranjska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'pozesko-slavonska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Požeško-slavonska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'brodsko-posavska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Brodsko-posavska županija</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'istarska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Zadarska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'istarska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Istarska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'sibensko-kninska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Šibensko-kninska županija</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'vukovarsko-srijemska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Vukovarsko-srijemska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'splitsko-dalmatinska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Splitsko-dalmatinska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'primorsko-goranska-županija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Primorsko-goranska županija</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'zagrebacka-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Zagrebačka županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'medimurska-zupanija' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Međimurska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-red">
                            <a href="{{URL::route('ListAdsByRegion', array('region' => 'grad-zagreb' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Grad Zagreb</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Lista županija end -->
    <!-- Paralax background & tipka za oglašavanje start -->
    <section class="callout-section mtb120" style="background:url(img/frontend/callout-bg1.jpg) center center fixed">
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
                        <a href="{{URL::route ('CreateAd')}}">
                            <span>Objavite oglas </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Paralax background & tipka za oglašavanje end -->
    <!-- Najnoviji oglasi start -->
    <div class="row m0">
        <div class="container">
            <div class="row m0 text-center mb25">
                <div class="col-lg-12">
                    <h2 class="page-header fs40">Najnoviji oglasi</h2>
                    <div class="text-center h2-separator"></div>
                </div>
                <div class="text-center mb35 fs18">
                    Pogledajte i pronađite upravo ono što vam treba za vaš dom.
                </div>
            </div>
            <div class="col-lg-12">
                <div class="customnavigation">
                    <a class="btn prev"><span class="glyphicon glyphicon-menu-left"></span></a>
                    <a class="btn next"><span class="glyphicon glyphicon-menu-right"></span></a>
                </div>
            </div>
            <div id="owl-demo" class="owl-carousel owl-theme mt50">
            @if (count($publishedads['entry']) > 0) 
                    @foreach($publishedads['entry'] as $publishedad)
                <div class="item">
                    <div class="col-md-12">
                        <a href="{{URL::route ('ShowAd', array('id' => $publishedad->permalink))}}">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/ads/thumbs/' . $publishedad->image, $publishedad->title) }}
                        </a>
                        <div class="panel mt10">
                            <div class="panel-body p0">
                                <a href="{{URL::route ('ShowAd', array('id' => $publishedad->permalink))}}">
                                    <p class="ad-title-homepage">{{ $publishedad->title }}</p>
                                </a>
                                <p class="ad-price-homepage">{{ $publishedad->price }} kn</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            </div>
        </div>
    </div>
    <div class="row m0">
        <div class="col-md-offset-4 col-md-4 text-center">
            <a class="btn btn-lg btn-default mt15 cta" href="{{URL::route ('AdList')}}"> <i class="fa fa-list pull-left mt4 mr8"></i>Svi oglasi</a>
        </div>
    </div>
    <!-- Najnoviji oglasi end -->
    <!-- Izdvojeni oglasi start -->
    <div class="row m0 mt120">
        <div class="container">
            <div class="col-lg-12">
                <h2 class="page-header text-center fs40">Izdvojeni oglasi</h2>
                <div class="text-center h2-separator"></div>
                <div class="text-center mb35 fs18">
                    Novi ste korisnik stranice? Pogledajte naše izdvojene oglase birane od strane starih korisnika.
                </div>
            </div>
            @if (count($featuredads['entry']) > 0) 
                @foreach($featuredads['entry'] as $featuredad)
                    <div class="col-md-3">
                        <a href="{{URL::route ('ShowAd', array('id' => $featuredad->permalink))}}">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/ads/thumbs/' . $featuredad->image, $featuredad->title) }}
                        </a>
                        <div class="panel mt10">
                            <div class="panel-body p0">
                                <a href="{{URL::route ('ShowAd', array('id' => $featuredad->permalink))}}">
                                    <p class="ad-title-homepage">{{ $featuredad->title }}</p>
                                </a>
                                <p class="ad-price-homepage">{{ $featuredad->price }} kn</p>
                            </div>
                        </div>
                    </div> 
                @endforeach
            @endif
        </div>
    </div>
    <!-- Izdvojeni oglasi end -->
    <!-- Testimonials start -->
    <div class="row m0 mt120">
        <div class="container">
            <div class="row m0">
                <div class="col-md-12">
                    <h2 class="page-header text-center fs40">Što korisnici kažu o nama</h2>
                    <div class="text-center h2-separator"></div>
                </div>
                <div class="col-md-12" data-wow-delay="0.2s">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive " src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="">
                            </li>
                            <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="https://s3.amazonaws.com/uifaces/faces/twitter/rssems/128.jpg" alt="">
                            </li>
                            <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg" alt="">
                            </li>
                        </ol>
                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner text-center">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row m0">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. !</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row m0">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row m0">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. .</p>
                                            <small>Someone famous</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <!-- Carousel Buttons Next/Prev -->
                        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials end -->
    <!-- Stats start -->
    <div class="row m0">
        <div class="stats-homepage">
            <div class="col-md-4">
                <div class="col-md-6">
                    <i class="fa fa-pencil-square fa-4x pull-right stat-icon"></i>
                </div>
                <div class="col-md-6 bl1pxw">
                    <h3 class="mt5 stat-title">Aktivnih oglasa:</h3>
                    <p style="font-size: 16px;">{{ $countactiveads }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-6">
                    <i class="fa fa-plus-square fa-4x pull-right stat-icon"></i>
                </div>
                <div class="col-md-6 bl1pxw">
                    <h3 class="mt5 stat-title">Novih oglasa:</h3>
                    <p style="font-size: 16px;">{{ $countnewads }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-6">
                    <i class="fa fa-user fa-4x pull-right stat-icon"></i>
                </div>
                <div class="col-md-6 bl1pxw">
                    <h3 class="mt5 stat-title">Aktivnih korisnika:</h3>
                    <p style="font-size: 16px;">{{ $countactiveusers }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Stats end -->
    <!-- tipka za poziv start -->
    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">
            <div class="page-bottom-info-content text-center">
                <h3>Ako imate bilo kakvih pitanja, komentara ili pritužbi, slobodno nas kontaktirajte na broj 09x/xxx - xx - xx, ili email: info@prodaja-drva.com.hr</h3>
                <a class="btn  btn-lg mt50 cta" href="tel:+000000000">
                    <i class="fa fa-phone mr8"></i> Nazovite nas 09x/xxx - xx - xx </a>
            </div>
        </div>
    </div> 
    <script>
    $(document).ready(function() {
        initMap();
        var owl = $("#owl-demo");

        owl.owlCarousel({
            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 4], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 3], // betweem 900px and 601px
            itemsTablet: [600, 2], //2 items between 600 and 0
            itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
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
    </script>
    <script>
    $(document).ready(function() {

        // you want to enable the pointer events only on click;

        $('#map_canvas1').addClass('scrolloff'); // set the pointer events to none on doc ready
        $('#canvas1').on('click', function() {
            $('#map_canvas1').removeClass('scrolloff'); // set the pointer events true on click
        });

        // you want to disable pointer events when the mouse leave the canvas area;

        $("#map_canvas1").mouseleave(function() {
            $('#map_canvas1').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
        });
    });
    </script>
    <script>
    function initMap() {
        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap',
            center: new google.maps.LatLng(51.605139, -2.918567),
            scrollwheel: false,
            draggable: true
        };

        // Display a map on the page
        map = new google.maps.Map(document.getElementById("googlemap"), mapOptions);
        map.setTilt(45);

        // Multiple Markers
        var markers = [
            ['Zagreb', 45.7888865, 16.0005137, 12]
        ];

        // Info Window Content
        var infoWindowContent = [
            ['<div class="info_content">' +
                '<h3>Zagreb</h3>' +
                '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' + '</div>'
            ]

        ];

        // Display multiple markers on a map
        var infoWindow = new google.maps.InfoWindow(),
            marker, i;

        // Loop through our array of markers & place each one on the map  
        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            var iconBase = 'https://maps.google.com/mapfiles/kml/pushpin/';
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0],
                icon: iconBase + 'purple-pushpin.png'
            });

            // Allow each marker to have an info window    
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            google.maps.event.addListener(map, 'click', function(event) {
                this.setOptions({
                    scrollwheel: true
                });
            });
            google.maps.event.addListener(map, 'mouseout', function(event) {
                this.setOptions({
                    scrollwheel: false
                });
            });

            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(11);
            google.maps.event.removeListener(boundsListener);
        });
    }
    </script>
    @include('frontend.includes.footer')