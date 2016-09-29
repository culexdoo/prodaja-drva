@include('frontend.includes.navbar')
    <!-- Image Header -->
    <div class="row m0">
        <div class="col-lg-12 p0">
            <div class="mh400" style="background-image: url(/img/frontend/classified-list-banner.jpg);">
                <div class="container text-center ">

                    @if ($pagetitle == null)
                    <h1 class="text-white mt100 fs65">Jednostavno do ogrijeva! </h1>
                    @else
                    <h1 class="text-white mt100 fs50"> {{ $pagetitle}}! </h1>
                    @endif
                    <h2 class="text-white fs33"> Pronađite drva za ogrijev u svojoj blizini i u svom cijenovnom rangu! </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->
    <div class="lspacer"></div>
    <div class="row m0">
        <div class="container">
        <section id="shop-1-6" class="content-block shop-1-6 p0">
            <div class="col-lg-3 sidebar">
                <div class="widget">
                    <h4 class="mt0" style="font-size: 21px;">Pretraga po kriterijima:</h4>
                    <div class="panel-body pl0">
                        {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                        <div class="row"> 
                            <div class="form-group mb5 col-xs-12 arrow">
                                {{ Form::select('packaging', ['' => 'Vrsta pakiranja'] + $packaginglist, isset($packaging) ? $packaging : null, array('class' => 'form-control selectpicker hoverme', 'style' => 'width:100%', 'background-image' => 'url(/img/frontend/dropdown-icon.png)', 'id' => 'id')) }}
                            </div>
                            <div class="form-group mb5 col-xs-12 arrow">
                                {{ Form::select('wood', ['' => 'Vrsta drveta'] + $woodlist, isset($wood) ? $wood : null, array('class' => 'form-control selectpicker hoverme', 'style' => 'width:100%', 'id' => 'id')) }}
                            </div>
                            <div class="form-group mb5 col-xs-12 arrow">
                                {{ Form::select('region',  ['' => 'Županije'] + $regionslist, null, array('class' => 'form-control selectpicker hoverme', 'style' => 'width:100%', 'id' => 'id')) }}                   
                            </div> 
                        </div>
                        <div class="button-group">
                            <div class="action-buttons">
                               <button type="submit" style="width: 100%; margin: 0px;" class="btn btn-lg cta btn-primary"><i class="fa fa-search"></i> Pretraži</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <div class="widget">
                    <h4 style="font-size: 21px;">Izdvojeni oglasi</h4>
                     @if (count($featuredclassifieds['entry']) > 0) 
                        @foreach($featuredclassifieds['entry'] as $featuredclassified)

                        <div class="widget-body">
                            <div class="col-lg-12">
                                <div class="col-lg-4 p0">
                                <a href="{{ URL::route( 'ShowClassified', array('id' => $featuredclassified->permalink) )}}">
                                    <div class="widget-image">
                                        {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $featuredclassified->image, $featuredclassified->title, array('style' => 'width: 70px')) }}
                                    </div>
                                </a>
                                </div>
                                <div class="col-lg-8 p0">
                                    <div class="widget-title">
                                        <h4><a href="{{ URL::route( 'ShowClassified', array('id' => $featuredclassified->permalink) )}}">{{ ucfirst($featuredclassified->title) }}</a></h4>
                                    </div>
                                    <div class="widget-region">
                                    <a href="{{ URL::route('ListClassifiedsByRegion', array('region' => $featuredclassified->regionpermalink)) }}">
                                        <h5>{{ $featuredclassified->regionname }}</h5>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-9 pl50">
                <div class="listing-container">
                @if (count($entries) > 0) 
                    @foreach($entries as $entry)
                    <!-- single classified listing start -->
                    <div class="row greyb mb20">
                        <div class="single-classified">
                            <div class="col-lg-4 col-xs-4 p0">
                                <a href="{{ URL::route('ShowClassified', array('permalink' => $entry->permalink)) }}">
                                    <div class="classified-image">
                                        {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $entry->image, $entry->title, array('style' => 'border-radius: 5px 0px 0px 5px')) }}
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-xs-8">
                                <div class="classified-content">
                                    <div class="col-lg-12 p0 mb15">
                                        <a href="{{ URL::route('ShowClassified', array('permalink' => $entry->permalink)) }}">
                                            <h3 class="classified-title">{{ ucfirst($entry->title) }}</h3>
                                        </a>
                                    </div>
                                    <div class="classified-description">
                                        <span>{{ ucfirst($entry->description) }}</span>
                                    </div>
                                    <div class="spacer"></div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                                <p class="classified-category" style="margin: 0px;">Vrsta drveta: <a href="{{ URL::route('ListClassifiedsByWoodCategory', array('woodcategory' => $entry->woodpermalink)) }}">{{$entry->woodname}}</a></p>
                                        </div>
                                        <div class="col-lg-5">
                                            <p class="classified-category" style="margin: 0px;">Vrsta pakiranja: <a href="{{ URL::route('ListClassifiedsByPackagingCategory', array('packagingcategory' => $entry->packagingpermalink)) }}">{{$entry->packagingname}}</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="classified-footer">
                                    <div class="row">
                                        <div class="col-lg-5 col-xs-7">
                                            <div class="spacer"></div>
                                            <div class="county">
                                                    <p class="mt2"><i class="fa fa-map-marker"></i> <a href="{{ URL::route('ListClassifiedsByRegion', array('region' => $entry->regionpermalink)) }}">{{$entry->regionname}}</a></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="spacer"></div>
                                            <div class="timestamp">
                                                <p class="mt2"><i class="fa fa-clock-o"></i> Objavljeno: {{ date('d. m. Y.', strtotime( $entry->created_at )) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-xs-5 p0">
                                            <div class="spacer"></div>
                                            <div class="price">
                                            <p class="mt2">{{$entry->price}} kn</p>
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
                        {{ $entries->appends(Request::except('page'))->links() }}
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