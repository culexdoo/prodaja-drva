<div class="row">
    <!-- Main content -->
    <div class="col-md-12">
        <!-- Breadcrumbs -->
        <ul class="breadcrumb">
            <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
            <li><a href="{{ URL::route('AdsIndex') }}">Pregled svih oglasa</a></li> 
            <li class="active">Uredi oglas</li>
        </ul>
        <!-- /breadcrumbs -->
        <!-- Slika, istaknute informacije, povijest bolesti -->
        <div class="col-md-6">
        {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
        {{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
            <section class="panel">
                <div class="panel-body">
                <div class="col-md-6">
                    @if ($entry->image != null || $entry->image != '')
                        <div class="form-group mb15">
                            <label class="col-md-12" for="image">Trenutna slika:</label> 
                            <div class="col-md-12">
                                {{ HTML::image(URL::to('/') . '/uploads/frontend/ads/thumbs/' . $entry->image) }}
                            </div>
                        </div>
                    @endif
                   {{ Form::file('image', array('class' => 'mt10'))  }}
                    @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    @endif
                </div>
                <div class="col-md-6">
                    <div id="map" style="width: 270px; height: 190px;"></div>
                    <div>
                        <input type="hidden" name="latitude" class="form-control" style="width: 110px" id="map-lat" />
                        <input type="hidden" name="longitude" class="form-control" style="width: 110px" id="map-lon" />
                    </div>
                </div> 
                </div> 
            </section> 
            <section class="panel">
                <div class="panel-body">
                    <div class="cold-md-12 mb15">
                        <label>Naslov</label>
                        {{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naslov']) }}
                    </div>
                    <div class="cold-md-12 mb15">
                        <label>Vrsta drveta</label>
                        {{ Form::select('wood', $woodlist, isset($entry->wood) ? $entry->wood : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                    </div>
                    <div class="cold-md-12 mb15">
                        <label>Vrsta pakiranja</label>
                        {{ Form::select('packaging', $packaginglist, isset($entry->packaging) ? $entry->packaging : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                    </div>
                    <div class="cold-md-12 mb15">
                        <label>Cijena</label>
                        {{ Form::text('price', isset($entry->price) ? $entry->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }}
                    </div>
                    <div class="col-md-12 p0">
                        <label>Sadržaj oglasa</label> 
                        {{ Form::textarea('description', isset($entry->description) ? $entry->description : null, ['id' => 'description', 'placeholder' => 'Sadržaj oglasa', 'cols' => '102', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }}
                    </div>
                </div>
            </section>
        </div>
        <!-- / Slika, istaknute informacije, povijest bolesti -->
        <!-- /pacijentova povijest -->
        <!-- Informacije o pacijentu -->
        <div class="col-md-6">
            <section class="panel">
                <div class="panel-body">
                   
                        <div class="form-group">
                            <label class="move-left">Podaci o oglašivaču:</label>
                        </div>
                        <div class="form-group">
                            <label>Korisničko ime</label>
                            {{ Form::select('user', $usernamelist, isset($entry->user) ? $entry->user : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                        </div>
                        <div class="form-group">
                            <label>Regija</label>
                            {{ Form::select('region', $regionlist, isset($entry->region) ? $entry->region : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                        </div>
                        <div class="form-group">
                            <label>Mjesto</label>
                            {{ Form::select('city', $citylist, isset($entry->city) ? $entry->city : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                        </div> 
                        <div class="form-group">
                            <label>Email addresa</label>
                             {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
                        </div> 
                        <div class="form-group">
                            <label>Kontakt Tel1</label>
                            {{ Form::text('contact1', isset($entry->contact1) ? $entry->contact1 : null, ['class' => 'form-control', 'id' => 'contact1', 'placeholder' => 'Kontakt Tel1']) }}
                        </div>
                        <div class="form-group">
                            <label>Kontakt Tel2</label>
                            {{ Form::text('contact2', isset($entry->contact2) ? $entry->contact2 : null, ['class' => 'form-control', 'id' => 'contact2', 'placeholder' => 'Kontakt Tel2']) }}
                        </div>
                        <div class="form-group">
                            <label>Objavljen</label> 
                            {{ Form::select('published', array('0' => 'Ne', '1' => 'Da'), isset($entry->published) ? $entry->published : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%')) }} 
                        </div>
                        <div class="form-group">
                            <label>Istaknut</label> 
                            {{ Form::select('featured', array('0' => 'Ne', '1' => 'Da'), isset($entry->featured) ? $entry->featured : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%')) }} 
                        </div>
                        {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                        {{ Form::close() }}  
                </div>
            </section>
        </div>
    </div>
</div> 
<script>
      function initMap() {
        var myLatLng = {lat: {{$entry->latitude}}, lng: {{$entry->longitude}} };

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
</script>