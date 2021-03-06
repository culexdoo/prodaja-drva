@include('frontend.includes.navbar')
<header id="header11" style="background-image: url('img/frontend/header.jpg');">
<div class="container">
    <div class="content">
        <div class="top">
            <h1 class="editContent" style="font-weight: 300; font-size: 50px;">Dobrodošli na stranicu za prodaju drva</h1>
            <p class="editContent">Pronađite sve što vam treba za topliji i ugodniji dom!</p>
            <div class="text-center">
                <a href="{{ URL::route('ClassifiedList')}}" class="btn btn-default-white-transparent"><span class="fa fa-eye" aria-hidden="true"></span> Oglasi</a>
            </div>
        </div>
        <div class="hr-register">
            <span class="editContent">ili pretražite po kriterijima</span>
        </div>
        <div class="bottom">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                    <div class="col-md-4 nopaddingleft">
                        <div class="col-lg-12 search-county h50">
                            {{ Form::select('region',  ['' => 'Odaberite županiju'] + $regionslist, null, array('class' => 'choose-county', 'style' => 'border:none; color:#999', 'id' => 'id')) }}
                        </div>
                    </div>
                    <div class="col-md-4 nopaddingright">
                        <div class="col-lg-12 search-county h50">
                            {{ Form::select('wood', ['' => 'Vrsta drveta'] + $woodlist, isset($wood) ? $wood : null, array('class' => 'choose-category', 'style' => 'width:100%', 'id' => 'id')) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="text-center mt4 ml15">
                        <button class="btn btn-primary btn-block br0 h50 ml0"><i class="fa fa-search" style="margin-right: 15px;"></i>Pretražite</button>
                    </div>
                </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
</header>
    <!-- Kategorije start -->
    <div class="row m0 mtb120">
        <div class="container">
            <div class="row m0">
                <div class="col-lg-12">
                    <h2 class="page-header text-center fs50 pb2">Kategorije</h2>
                    <div class="text-center h2-separator"></div>
                    <div class="text-center mb35 fs14">
                        Izaberite optimalan ogrijevni materijal za vašu peć. Jednim klikom do toplijeg doma.
                    </div>
                </div>
                <div id="page" class="page">
                    <div id="services6">
                        <div class="container">
                            <div class="row">
                            <a href="{{ URL::route('ListClassifiedsByWoodCategory', array('woodcategory' => 'ogrjevno-drvo' )) }}">
                                <div class="col-lg-4">
                                    <div class="services-box">
                                        <div class="icon">
                                            <span class="fa fa-tree"></span>
                                        </div>
                                        <h3 class="editContent">Ogrjevno drvo</h3>
                                        <p class="editContent">Drvo je tradicionalan i ekonomičan način grijanja. Za razliku od zemnog plina i loživog ulja drvo je obnovljiv izvor energije. Za grijanje se najčešće koristi bukva i grab jer je poznato da bukvino drvo proizvodi jaki žar te zbog toga ujednačeno i dugotrajno emitira toplinu i uz atraktivni plamen gori gotovo bez iskri.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ URL::route('ListClassifiedsByWoodCategory', array('woodcategory' => 'briketi' )) }}">
                                <div class="col-lg-4">
                                    <div class="services-box">
                                        <div class="icon">
                                            <span class="fa fa-tree"></span>
                                        </div>
                                        <h3 class="editContent">Briketi</h3>
                                        <p class="editContent">Briket za razliku od ostalih proizvoda iste namijene ima izvrsnu moć zagrijavanja te toplinu unutar peći zadržava iznimno dugo. Zbog svojih prirodnih karakteristika i zahvaljujući svojoj visokoj gustoći i niskom sadržaju vlage, sagorijevaju mnogo sporije i uz manje dima od primjerice drva.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ URL::route('ListClassifiedsByWoodCategory', array('woodcategory' => 'pelet' )) }}">
                                <div class="col-lg-4">
                                    <div class="services-box">
                                        <div class="icon">
                                            <span class="fa fa-tree"></span>
                                        </div>
                                        <h3 class="editContent">Pelet</h3>
                                        <p class="editContent">Drveni pelet se proizvodi iz usitnjenog drveta, prešanog pod velikim pritiskom koji omogućava prirodno vezanje drveta. Peleti su ekstremno gusti i imaju mali udio vlage. Pri izgaranju peleti proizvode znatno manje emisije NOx, SOx, te CO od dozvoljenih graničnih vrijednosti.</p>
                                    </div>
                                </div>
                            </a>
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
            <div id="map" class="map"></div>
        </div>
    </div>
    <!-- Google map end -->
    <!-- Lista županija start -->
    <section id="locations">
        <div class="container">
            <h2 class="page-header text-center fs50 pb2">Izaberite županiju</h2>
            <div class="text-center h2-separator"></div>
            <div class="text-center mb35 fs14">
                U kojoj god županiji - gradu se nalazili, naša drva će pronaći put do vas.
            </div>
            <div class="h2-seprator"></div>
            <div class="location clearfix">
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{ URL::route('ListClassifiedsByRegion', array('region' => 'dubrovacko-neretvanska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Dubrovačko-neretvanska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'krapinsko-zagorska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Krapinsko-zagorska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'sisacko-moslavacka' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Sisačko-moslavačka <span class="move-text">županija</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'karlovacka' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Karlovačka županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'varazdinska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Varaždinska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'licko-senjska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Ličko-senjska županija</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'bjelovarsko-bilogorska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Bjelovarsko-bilogorska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'viroviticko-podravska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Virovitičko-podravska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'koprivnicko-krizevacka' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Koprivničko-križevačka <span class="move-text">županija</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'osjecko-baranjska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Osječko-baranjska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'pozesko-slavonska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Požeško-slavonska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'brodsko-posavska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Brodsko-posavska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'istarska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Zadarska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'istarska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Istarska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'sibensko-kninska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Šibensko-kninska županija</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'vukovarsko-srijemska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Vukovarsko-srijemska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'splitsko-dalmatinska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Splitsko-dalmatinska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'primorsko-goranska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Primorsko-goranska <span class="move-text">županija</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'zagrebacka' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Zagrebačka županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'medimurska' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Međimurska županija</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="span3 border-black-green">
                            <a href="{{URL::route('ListClassifiedsByRegion', array('region' => 'grad-zagreb' )) }}"><i class="fa fa-map-marker"></i>&nbsp; Grad Zagreb</a>
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
                        <a href="{{URL::route ('CreateClassified')}}">
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
                    <h2 class="page-header fs50 pb2">Najnoviji oglasi</h2>
                    <div class="text-center h2-separator"></div>
                </div>
                <div class="text-center mb35 fs14">
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
            @if (count($publishedclassifieds['entry']) > 0) 
                @foreach($publishedclassifieds['entry'] as $publishedclassified)
                <div class="item">
                    <div class="col-md-12">
                        <a href="{{URL::route ('ShowClassified', array('id' => $publishedclassified->permalink))}}">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $publishedclassified->image, $publishedclassified->title) }}
                        </a>
                        <div class="panel mt10">
                            <div class="panel-body p0">
                                <a href="{{URL::route ('ShowClassified', array('id' => $publishedclassified->permalink))}}">
                                    <p class="classified-title-homepage">{{ $publishedclassified->title }}</p>
                                </a>
                                <p class="classified-price-homepage">{{ $publishedclassified->price }} kn</p>
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
            <a class="btn btn-lg btn-primary mt15 cta" href="{{URL::route ('ClassifiedList')}}"> <i class="fa fa-list pull-left mt2 mr8"></i>Svi oglasi</a>
        </div>
    </div>
    <!-- Najnoviji oglasi end -->
    <!-- Izdvojeni oglasi start -->
    <div class="row m0 mt120">
        <div class="container mb120">
            <div class="col-lg-12">
                <h2 class="page-header text-center fs50 pb2">Izdvojeni oglasi</h2>
                <div class="text-center h2-separator"></div>
                <div class="text-center mb35 fs14">
                    Novi ste korisnik stranice? Pogledajte naše izdvojene oglase birane od strane starih korisnika.
                </div>
            </div>
            @if (count($featuredclassifieds['entry']) > 0) 
                @foreach($featuredclassifieds['entry'] as $featuredclassified)
                    <div class="col-md-3 img-position">
                        <a href="{{URL::route ('ShowClassified', array('id' => $featuredclassified->permalink))}}">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $featuredclassified->image, $featuredclassified->title) }}
                        </a>
                        <div class="panel mt10">
                            <div class="panel-body p0">
                                <a href="{{URL::route ('ShowClassified', array('id' => $featuredclassified->permalink))}}">
                                    <p class="classified-title-homepage">{{ $featuredclassified->title }}</p>
                                </a>
                                <p class="classified-price-homepage">{{ $featuredclassified->price }} kn</p>
                            </div>
                        </div>
                    </div> 
                @endforeach
            @endif
        </div>
    </div>
    <!-- Izdvojeni oglasi end -->
    <!-- Testimonials start -->
    <div id="content22" style="height: 450px;">
    <div class="container">
        <h2 class="page-header text-center fs50 pb2">Što korisnici kažu o nama</h2>
        <div id="testimonials" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
            <div class="item">
                <div class="box" style="border:0px; min-height: 160px;">
                    <div class="icon">
                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="Team">
                    </div>
                    <p class="editContent">Super pregledna stranica. Odmah sam naletio na oglas koji trebam i riješio drva za ovu zimu!</p>
                </div>
                <div class="arrow-down"></div>
                <div class="editContent">
                    <h3>Mirko J.</h3>
                </div>
            </div>
            <div class="item">
                <div class="box" style="border:0px; min-height: 160px;">
                    <div class="icon">
                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/rssems/128.jpg" alt="Team">
                    </div>
                    <p class="editContent">Mogao bih započeti s prodajom drva preko vas. Jednostavno je za koristiti i preporučam svima koji žele započeti sa prodajom drva preko interneta. Svaka čast!</p>
                </div>
                <div class="arrow-down"></div>
                <div class="editContent">
                    <h3>Davor S.</h3>
                </div>
            </div>
            <div class="item">
                <div class="box" style="border:0px; min-height: 160px;">
                    <div class="icon">
                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg" alt="Team">
                    </div>
                    <p class="editContent">Prijatelj mi vas je preporučio i ja ću vas isto dalje preporučiti. Super jednostavna stranica i lagano sam našla sve što sam trebala.</p>
                </div>
                <div class="arrow-down"></div>
                <div class="editContent">
                    <h3>Mirna M.</h3>
                </div>
            </div>
            <div class="item">
                <div class="box" style="border:0px; min-height: 160px;">
                    <div class="icon">
                        <img src="https://s3.amazonaws.com/uifaces/faces/twitter/rssems/128.jpg" alt="Team">
                    </div>
                    <p class="editContent">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock.</p>
                </div>
                <div class="arrow-down"></div>
                <div class="editContent">
                    <h3>Johnatan Doe</h3>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Testimonials end -->
    <!-- Stats start -->
<section id="content-2-7" class="content-block content-2-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="underlined-title">
                    <div class="editContent">
                        <h1 class="lora-font">Malo zanimljivih brojki sa stranice</h1>
                    </div>
                    <hr>
                    <div class="editContent">
                        <h2 class="lora-font">Svidjet će vam se prodaja-drva </h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 text-center">
                <div class="counter-icon">
                    <span class="fa fa-magic"></span>
                </div>
                <div class="counter-text">
                    <div class="editContent">
                        <h3 class="counter" style="font-family: 'Lora', serif">{{ $countactiveclassifieds }}</h3>
                    </div>
                    <div class="editContent">
                        <p>Aktivni oglasi</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 text-center">
                <div class="counter-icon">
                    <span class="fa fa-coffee"></span>
                </div>
                <div class="counter-text">
                    <div class="editContent">
                        <h3 class="counter" style="font-family: 'Lora', serif">{{ $countnewclassifieds }}</h3>
                    </div>
                    <div class="editContent">
                        <p>Novi oglasi</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 text-center">
                <div class="counter-icon">
                    <span class="fa fa-lightbulb-o"></span>
                </div>
                <div class="counter-text">
                    <div class="editContent">
                        <h3 class="counter" style="font-family: 'Lora', serif">{{ $countactiveusers }}</h3>
                    </div>
                    <div class="editContent">
                        <p>Aktivni korisnici</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 text-center">
                <div class="counter-icon">
                    <span class="fa fa-clock-o"></span>
                </div>
                <div class="counter-text">
                    <div class="editContent">
                        <h3 class="counter" style="font-family: 'Lora', serif">{{ $countnewusers }}</h3>
                    </div>
                    <div class="editContent">
                        <p>Novi korisnici</p>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12 text-center pad45">
                <div class="editContent">
                    <strong class="white lora-font">Niti jedan pustinjski skočimiš nije ozljeđen prilikom razvoja <a href="{{ URL::route('getLanding')}}" class="text-white">prodaje-drva.</a></strong>
                </div>
            </div>
            
        </div><!-- /.row -->

    </div><!-- /.container -->
</section>
    <!-- Stats end -->
    <!-- tipka za poziv start -->
<section id="content-2-6" class="content-block content-2-6 bg-green">
    <div class="container text-center">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="editContent">
                <h3 class="info-section">Ako imate bilo kakvih pitanja, <strong>komentara ili pritužbi,</strong> slobodno nas kontaktirajte na broj 09x/xxx - xx - xx, ili email: info@prodaja-drva.com.hr</h3>
            <a href="{{ URL::route('getRegistration') }}" class="btn btn-outline btn-outline-xl outline-light">REGISTRACIJA</a>
            </div>
        </div>
    </div>
</section>
<script>
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
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyAGZyUPlcENH-4yfK4IzBvnclrAO-M5cCo&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        center: new google.maps.LatLng(),
        zoom: 8,
        scrollwheel: false,
        mapTypeId: 'roadmap'

    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map"), mapOptions);

            
    // Multiple Markers
        var markers = [
            @if(count($pins) > 0)
            @foreach($pins as $pin)

            ['{{$pin->regionname}}', {{$pin->latitude}}, {{$pin->longitude}}, {{ $pin->id }}],

            @endforeach
            @endif
        ];
                        
    // Info Window Content
        var infoWindowContent = [
            @if(count($pins) > 0)
            @foreach($pins as $pin)

            ['<div class="info_content">' +
                '<div class="content_body">' +
                    '<div class="content_title">' +
                        '<a href="{{URL::route ('ShowClassified', array('id' => $pin->permalink))}}">' +
                        '<h3>{{ ucfirst($pin->title) }}</h3>' +
                        '</a>' +
                    '</div>' +
                    '<div class="content_image">' +
                        '<img src="/uploads/frontend/classifieds/thumbs/{{$pin->image}}" style="width:140px;" >' +
                    '</div>' +
                    '<div class="content_descrtiption mt10">' +
                        '<p>{{ $pin->description }}</p>' +
                    '</div>' +
                '</div>' +
            '</div>'
            ],

            @endforeach
            @endif
        ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });

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
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        var latLng = marker.getPosition(); // returns LatLng object
        map.setCenter(latLng); // setCenter takes a LatLng object
    }



    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(8);
        google.maps.event.removeListener(boundsListener);
    });
    
}
</script>
@include('frontend.includes.footer')