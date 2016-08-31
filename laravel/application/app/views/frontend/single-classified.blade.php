@include('frontend.includes.navbar')
    <div class="row m0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $entry->title }}
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
            @if($entry->published == 1 OR Auth::User())
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="add-classified-image">
                                {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/' . $entry->image, $entry->title) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-horizontal">
                                <div id="us3" style="width: 400px; height: 300px;"></div>
                                <div>
                                    <input type="hidden" name="latitude" class="form-control" style="width: 110px" id="us3-lat" />
                                    <input type="hidden" name="longitude" class="form-control" style="width: 110px" id="us3-lon" />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row p0 mt25">
                        <div class="col-lg-12">
                            <table class="table table-reflow table-hover">
                                <thead>
                                    <tr>
                                        <th>Detalji:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Datum dodavanja</th>
                                        <td>{{ date('d. m. Y.', strtotime( $entry->created_at )) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lokacija</th>
                                        <td>{{ $region->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Cijena</th>
                                        <td>{{ $entry->price }} kn</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Vrsta drveta</th>
                                        <td>{{ $entry->woodname }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Vrsta pakiranja</th>
                                        <td>{{ $entry->packagingname }}</td>
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
                        {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'autocomplete' => 'off', 'files' => true)) }}
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <h3 class="mtb30 pl15">Za dodatne informacije javite se autoru</h3>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Vaše ime:</label>
                                        {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Vaše ime']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Vaše prezime:</label>
                                        {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Vaše prezime']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kontakt broj:</label>
                                        {{ Form::text('contact', isset($entry->contact) ? $entry->contact : null, ['class' => 'form-control', 'id' => 'contact', 'placeholder' => 'Kontakt broj']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Vaš email:</label>
                                        {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Vaš email']) }}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Sadržaj:</label>
                                        {{ Form::textarea('additional_notes', isset($entry->additional_notes) ? $entry->additional_notes : null, ['id' => 'additional_notes', 'placeholder' => 'Sadržaj', 'cols' => '118', 'rows' => '10', 'style' => 'border: 1px solid #CCC; border-radius: 5px']) }} 
                                    </div>
                                    <div id="success"></div>
                                    <!-- For success/fail messages -->
                                    <button type="submit" class="btn btn-lg btn-default mt15 cta ml0">Pošaljite</button>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                        <!-- Kontakt forma end -->
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row m0 mb35">
                        <div class="avatar">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/users/thumbs/' . $user->image, $user->first_name, array('class' => 'img-circle', 'style' => 'max-height: 100px;')) }}
                        </div>
                        <div class="user-data">
                            <h4 class="mb20">{{ $user->username }}</h4>
                            <p>Registriran od: {{ date('d. m. Y.', strtotime( $entry->created_at )) }}</p> 
                            <p>Kontakt: {{ $user->contact1 }}</p>
                        </div>
                        <i class="fa fa-arrow-right pull-left"></i><a href="{{ URL::route('UserProfile', array('permalink' => $user->permalink)) }}"> Detaljnije o oglašivaču </a>
                        <div class="mt30">
                            <p>Imate pitanje vezano za oglašavanje?</p>
                            <a class=" btn btn-lg cta mb35 ml0" href="{{URL::route ('contact') }}">Javite nam se</a> 
                        </div>
                    </div>
                    <div class="row m0">
                        <div class="col-md-12 mb20">
                            <h3>Podijelite sa prijateljima </h3>
                            <div class="likely">
                              <div class="fb-like" data-href="{{{ url('/') }}}/oglas/{{ $entry->permalink }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                              <div class="facebook">Share</div>
                              <div class="twitter">Tweet</div>
                              <div class="gplus">Plus</div>
                            </div> 
                        </div>
                    </div>
                    <div class="sidebar-listing-page">
                        <div class="col-lg-12 p0">
                            <!--- single widget start -->
                            <div class="panel panel-default m0">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> PRETRAGA PO KRITERIJIMA:</h4>
                                </div>
                                <div class="panel-body">
                                    {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                                    <div class="row"> 
                                        <div class="form-group  col-xs-12">
                                            {{ Form::select('packaging', ['' => 'Vrsta pakiranja'] + $packaginglist, isset($packaging) ? $packaging : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                        </div>
                                        <div class="form-group  col-xs-12">
                                            {{ Form::select('wood', ['' => 'Vrsta drveta'] + $woodlist, isset($wood) ? $wood : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                        </div>
                                        <div class="form-group  col-xs-12">
                                            {{ Form::select('region',  ['' => 'Županije'] + $regionslist, null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}                   
                                        </div> 
                                    </div>
                                    <div class="button-group">
                                        <div class="action-buttons">
                                           <button type="submit" style="margin-top: 10px; " class="btn btn-lg cta btn-search">Pretraži</button>
                                        </div>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                            <!--- single widget end -->
                        </div>
                    </div>
                </div>
            </div>
            @else
            @return {{Redirect::route('getLanding')->with('error_message', Lang::get('messages.error_acces_denied'))}};
            @endif
        </div>
    </div>

    <!-- Near classifieds start -->
    <div class="row m0">
        <div class="container">
            <div class="row m0 text-center mb35">
                <div class="col-lg-12">
                    <h2 class="page-header fs35">Oglasi u blizini</h2>
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
            @if (count($nearclassifieds) > 0) 
                    @foreach($nearclassifieds as $nearclassified)
                <div class="item">
                    <div class="col-md-12">
                        <a href="{{URL::route ('ShowClassified', array('id' => $nearclassified->permalink))}}">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $nearclassified->image, $nearclassified->title) }}
                        </a>
                        <div class="panel mt10">
                            <div class="panel-body p0">
                                <a href="{{URL::route ('ShowClassified', array('id' => $nearclassified->permalink))}}">
                                    <p class="classified-title-homepage">{{ $nearclassified->title }}</p>
                                </a>
                                <p class="classified-price-homepage">{{ $nearclassified->price }} kn</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            </div>
        </div>
    </div>
    <!-- Near classifieds end -->
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
                        <a href="{{URL::route ('CreateClassified')}}">
                            <span>Objavite oglas </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="/js/frontend/locationpicker.jquery.min.js"></script>
<script>
    $('#us3').locationpicker({
        location: {
            latitude: {{ $entry->latitude }},
            longitude: {{ $entry->longitude }}
        },
        radius: 300,
        zoom: 7,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
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