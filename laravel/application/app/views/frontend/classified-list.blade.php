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
    <!-- header end -->
    <div class="container custom-position">
    <h3 style="font-size: 28px;">Rezultati pretrage:</h3>
    </div>
    <div class="row m0">
        <div class="container">
        <section id="shop-1-6" class="content-block shop-1-6 p0">
            <div class="col-lg-3 sidebar">
                <div class="widget">
                    <h4 class="mt0" style="font-size: 21px;">Pretraga po kriterijima:</h4>
                    <div class="panel-body pl0">
                        {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                        <div class="row"> 
                            <div class="form-group mb5 col-xs-12 ">
                                {{ Form::select('packaging', ['' => 'Vrsta pakiranja'] + $packaginglist, isset($packaging) ? $packaging : null, array('class' => 'form-control selectpicker hoverme', 'style' => 'width:100%', 'id' => 'id')) }}
                            </div>
                            <div class="form-group mb5 col-xs-12">
                                {{ Form::select('wood', ['' => 'Vrsta drveta'] + $woodlist, isset($wood) ? $wood : null, array('class' => 'form-control selectpicker hoverme', 'style' => 'width:100%', 'id' => 'id')) }}
                            </div>
                            <div class="form-group mb5 col-xs-12">
                                {{ Form::select('region',  ['' => 'Županije'] + $regionslist, null, array('class' => 'form-control selectpicker hoverme', 'style' => 'width:100%', 'id' => 'id')) }}                   
                            </div> 
                        </div>
                        <div class="button-group">
                            <div class="action-buttons">
                               <button type="submit" style="margin-left: 0px; " class="btn btn-lg cta btn-primary">Pretraži</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="widget">
                    <h4 style="font-size: 21px;">Izdvojeni oglasi</h4>
                     @if (count($featuredclassifieds['entry']) > 0) 
                        @foreach($featuredclassifieds['entry'] as $featuredclassified)
                        <div id="popular-items">
                            <div class="sml-item">
                                <div class="entry-image">
                                    {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $featuredclassified->image, $featuredclassified->title) }}
                                </div>
                                <div class="editContent">
                                    <h4><a href="{{ URL::route( 'ShowClassified', array('id' => $featuredclassified->permalink) )}}">{{ ucfirst($featuredclassified->title) }}</a></h4>
                                </div>
                                <div class="editContent">
                                    <h5>Cijena: {{ $featuredclassified->price }} kn</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
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
                                            <h3 class="classified-title">{{ ucfirst($entry->title) }}</h3>
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
                                                <h5 class="mb0">Županija:<br></h5><p class="mt2">{{$entry->regionname}}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="timestamp">
                                                <h5 class="mb0">Objavljeno:<br></h5><p class="mt2">{{ date('d. m. Y.', strtotime( $entry->created_at )) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="price">
                                                <h5 class="mb0">Cijena:<br></h5><p class="mt2">{{$entry->price}} kn</p>
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
                <div class="row mb70">
                    <div class="col-md-12 text-center">
                        {{ $entries->links() }}
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
    <!-- /.row -->

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