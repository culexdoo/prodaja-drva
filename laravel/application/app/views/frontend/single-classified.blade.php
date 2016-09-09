@include('frontend.includes.navbar')
<div id="page" class="page">
        <section id="shop-1-6" class="content-block shop-1-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 pull-right">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="editContent">
                                    <h3 class="mt0" style="font-size: 28px;">{{ ucfirst($entry->title) }}</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-image">
                                    <a href="{{URL::route ('ShowClassified', array('id' => $entry->permalink))}}">{{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $entry->image, $entry->title) }}</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-desc">
                                    <ul class="fa-ul">
                                        <li><i class="fa-li fa fa-eur" style="top: 5px;"></i>Cijena: {{ $entry->price }} kn</li>

                                        <li><i class="fa-li fa fa-tree" style="top: 5px;"></i>Vrsta drveta: <a href="{{ URL::route('ListClassifiedsByWoodCategory', array('woodcategory' => $entry->woodpermalink)) }}">{{ $entry->woodname }}</a></li>

                                        <li><i class="fa-li fa fa-tags" style="top: 5px;"></i>Vrsta pakiranja: <a href="{{ URL::route('ListClassifiedsByPackagingCategory', array('packagingcategory' => $entry->packagingpermalink)) }}">{{ $entry->packagingname }}</a></li> 

                                        <li><i class="fa-li fa fa-map-marker" style="top: 5px;"></i>Županija: <a href="{{ URL::route('ListClassifiedsByRegion', array('region' => $entry->regionpermalink)) }}">{{ $entry->regionname }}</a></li>

                                        <li><i class="fa-li fa fa-user" style="top: 5px;"></i>Oglašivač: <a href="{{ URL::route('UserProfile', array('permalink' => $entry->userpermalink))}}">{{ $entry->username }}</a></li>

                                        <li><i class="fa-li fa fa-phone" style="top: 5px;"></i>Kontakt: {{ $user->contact1 }}</li>

                                        <li><i class="fa-li fa fa-calendar" style="top: 5px;"></i>Datum objave: {{ $entry->created_at }}</li>
                                        
                                    </ul>
                                    <div class="product-times-viewed">
                                        <p><i class="fa fa-search"></i> Pregledano: xy puta</p>
                                    </div>
                                </div>
                                <!-- /.product-desc -->
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="more-info-tabs">
                            <ul class="nav nav-tabs text-center" role="tablist" id="myTab">
                                <li><a href="#description1" role="tab" data-toggle="tab">Sadržaj oglasa</a></li>
                                <li><a href="#moreinfo1" role="tab" data-toggle="tab">Više informacija</a></li>
                                <li class="active"><a href="#location1" role="tab" data-toggle="tab">Lokacija</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in" id="description1">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <div class="editContent">
                                                <p>{{ $entry->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="moreinfo1">
                                    <div class="row">
                                        <div class="col-xs-10 col-xs-offset-1">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td>Oglašivač:</td>
                                                        <td><a href="{{ URL::route('UserProfile', array('permalink' => $entry->userpermalink))}}">{{ $entry->username }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Šifra oglasa:</td>
                                                        <td>{{ $entry->id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Naziv oglasa:</td>
                                                        <td>{{ $entry->title }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cijena:</td>
                                                        <td>{{ $entry->price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Vrsta drveta:</td>
                                                        <td><a href="{{ URL::route('ListClassifiedsByWoodCategory', array('woodcategory' => $entry->woodpermalink)) }}">{{ $entry->woodname }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Vrsta pakiranja:</td>
                                                        <td><a href="{{ URL::route('ListClassifiedsByPackagingCategory', array('packagingcategory' => $entry->packagingpermalink)) }}">{{ $entry->packagingname }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Županija:</td>
                                                        <td><a href="{{ URL::route('ListClassifiedsByRegion', array('region' => $entry->regionpermalink)) }}">{{ $entry->regionname }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kontakt:</td>
                                                        <td>{{ $user->contact1 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="location1">
                                    <div id="map" style="width: 100%; height: 500px;"></div>
                                    <div>
                                        <input type="hidden" name="latitude" class="form-control" style="width: 110px" id="map-lat" />
                                        <input type="hidden" name="longitude" class="form-control" style="width: 110px" id="map-lon" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.more-info-tabs -->
                    </div>
                    <!-- /.main-col -->
                    <div class="col-lg-3 sidebar">
                    <div class="widget">
                        <h4 class="mt0" style="font-size: 21px;">Pretraga po kriterijima:</h4>
                        <div class="panel-body pl0">
                            {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                            <div class="row"> 
                                <div class="form-group mb5 col-xs-12 arrow">
                                    {{ Form::select('packaging', ['' => 'Vrsta pakiranja'] + $packaginglist, isset($packaging) ? $packaging : null, array('class' => 'form-control selectpicker hoverme', 'style' => 'width:100%', 'id' => 'id')) }}
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
                        <h4 style="font-size: 21px;">Oglasi u blizini</h4>
                         @if (count($nearclassifieds) > 0) 
                            @foreach($nearclassifieds as $nearclassified)
                            <div class="widget-body">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 p0">
                                    <a href="{{ URL::route( 'ShowClassified', array('id' => $nearclassified->permalink) )}}">
                                        <div class="widget-image">
                                            {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $nearclassified->image, $nearclassified->title, array('style' => 'width: 70px')) }}
                                        </div>
                                    </a>
                                    </div>
                                    <div class="col-lg-8 p0">
                                        <div class="widget-title">
                                            <h4><a href="{{ URL::route( 'ShowClassified', array('id' => $nearclassified->permalink) )}}">{{ ucfirst($nearclassified->title) }}</a></h4>
                                        </div>
                                        <div class="widget-region">
                                        <a href="{{ URL::route('ListClassifiedsByRegion', array('region' => $nearclassified->regionpermalink)) }}">
                                            <h5>{{ $nearclassified->regionname }}</h5>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGZyUPlcENH-4yfK4IzBvnclrAO-M5cCo&callback=initMap">
</script>
<script>
  function initMap() {
    var myLatLng = {lat: {{ $entry->latitude }}, lng: {{ $entry->longitude }}};

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: myLatLng
    });

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Hello World!'
    });
  }
</script>
<script>
$('.gallery-zoom').magnificPopup({
    type: 'image'
        // other options
});
</script>
@include('frontend.includes.footer')