@include('frontend.includes.navbar')
    <!-- Image Header -->
    <div class="row m0">
        <div class="col-lg-12 p0">
            <div class="mh400" style="background-image: url(/img/frontend/classified-list-banner.jpg);">
                <div class="container text-center ">
                    <h1 class="text-white mt100 fs65"> Jednostavno do ogrijeva! </h1>
                    <h2 class="text-white fs33"> Pronađite drva za ogrijev u svojoj blizini i u svom cijenovnom rangu! </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container custom-position">
    <h3>Rezultati pretrage:</h3>
    </div>
    <!-- banner end -->
    <div class="row m0">
        <div class="container">
            <div class="col-lg-3">
                <div class="sidebar-listing-page">
                        <!--- single widget start -->
                    <div class="panel panel-default m0">
                        <div class="panel-heading">
                            <h4 class="panel-title"> PRETRAGA PO KRITERIJIMA:</h4>
                        </div>
                        <div class="panel-body">
                            {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                                <div class="row"> 
                                    <div class="form-group  col-xs-12">
                                        {{ Form::select('packaging', ['' => 'Vrsta pakiranja'] + $packaginglist, null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                    </div>
                                    <div class="form-group  col-xs-12">
                                        {{ Form::select('wood', ['' => 'Vrsta drveta'] + $woodlist, null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                    </div>
                                    <div class="form-group  col-xs-12">
                                        {{ Form::select('region',  ['' => 'Županije'] + $regionslist, null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}                   
                                    </div> 
                                </div>
                                <div class="button-group">
                                    <div class="action-buttons">
                                       <button type="submit" style="margin-top: 10px; " class="btn btn-lg cta btn-search btn-primary">Pretraži</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                        <!--- single widget end -->
                </div>
            </div>
            <div class="col-lg-9">
                <div class="listing-container">
                @if (count($entries) > 0) 
                    @foreach($entries as $entry)
                    <!-- single classified listing start -->
                    <div class="row box">
                        <div class="single-classified">
                            <div class="col-lg-4 p0">
                                <div class="classified-image">
                                    {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $entry->image, $entry->title) }}
                                </div>
                            </div>
                            <div class="col-lg-8 mb20">
                                <div class="classified-content">
                                    <div class="col-lg-10 p0">
                                        <a href="{{ URL::route('ShowClassified', array('permalink' => $entry->permalink)) }}">
                                            <h3 class="classified-title">{{$entry->title}}</h3>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 p0">
                                        <a href="{{ URL::route('ShowClassified', array('permalink' => $entry->permalink)) }}">
                                            <i class="fa fa-eye fa-2x pull-right mt5"></i>
                                        </a>
                                    </div>
                                    <p class="classified-description">{{$entry->description}}</p>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <h5 style="margin-top: 15px; margin-bottom: 0px;">Vrsta drveta:</h5>
                                            <p class="classified-category" style="margin: 0px;">{{$entry->woodname}}</p> 
                                        </div>
                                        <div class="col-lg-6">
                                            <h5 style="margin-top: 15px; margin-bottom: 0px;">Vrsta pakiranja:</h5>
                                            <p class="classified-category" style="margin: 0px;">{{$entry->packagingname}}</p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="classified-footer">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="county">
                                                <h5>{{$entry->regionname}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="timestamp">
                                                <h5>Objavljeno: {{ date('d. m. Y.', strtotime( $entry->created_at )) }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="price">
                                                <h5><span class="price-eur">{{$entry->price}} kn</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single classified listing end -->
                    @endforeach
                @else
                    <div class="listing-container">
                        <div class="row box text-center">
                            <h3>Nema rezultata po traženim kriterijima. Pokušajte ponovno!</h3>
                        </div>
                    </div>
                @endif
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{ $entries->links() }}
                    </div>
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
            @if (count($featuredclassifieds['entry']) > 0) 
                @foreach($featuredclassifieds['entry'] as $featuredclassified)
                    <div class="col-md-3">
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