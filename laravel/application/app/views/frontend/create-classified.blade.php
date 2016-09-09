@include('frontend.includes.navbar')
        <div class="container">
            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Objavite oglas
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
                {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                    {{ Form::hidden('user', Auth::user()->id) }}
                    <div class="row">
                        <div class="col-lg-6 p0">
                            <div class="add-classified-image box mb20" style='height:300px; width:400px;'>
                            <div class="no-classified-image"></div>
                                {{ Form::file('image', array('class' => 'form-control filestyle', 'style' => 'width:218px; margin-top: 20px;'))  }}
                                @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-horizontal mb20">
                                    <div id="us3" style="width: 400px; height: 300px;"></div>
                                    <div>
                                        <input type="hidden" name="latitude" class="form-control" style="width: 110px" id="us3-lat" />
                                        <input type="hidden" name="longitude" class="form-control" style="width: 110px" id="us3-lon" />
                                    </div>
                                    <div class="clearfix"></div>
                            </div>
                            <h3>Postavite lokaciju</h3>
                        </div>
                    </div>
                    <!-- Kontakt forma start -->
                    <div class="row mb15 mt65">
                        <div class="col-lg-12 p0">
                            
                                <div class="col-lg-6">
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Naslov:</label>
                                            {{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'style' => 'width: 420px', 'placeholder' => 'Naslov']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Vrsta drveta:</label>
                                            {{ Form::select('wood', $woodlist, isset($entry->wood) ? $entry->wood : null, array('class' => 'form-control selectpicker', 'id' => 'id')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Vrsta pakiranja:</label>
                                            {{ Form::select('packaging', $packaginglist, isset($entry->packaging) ? $entry->packaging : null, array('class' => 'form-control selectpicker', 'style' => 'width: 420px', 'id' => 'id')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Regija:</label>
                                            {{ Form::select('region', $regionlist, isset($entry->region) ? $entry->region : null, array('class' => 'form-control selectpicker','id' => 'id')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Mjesto:</label>
                                            {{ Form::select('city', $citylist, isset($entry->city) ? $entry->city : null, array('class' => 'form-control selectpicker', 'style' => 'width: 420px', 'id' => 'id')) }} 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Cijena:</label>
                                            {{ Form::text('price', isset($entry->price) ? $entry->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena']) }} 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Sadržaj oglasa</label> 
                                            {{ Form::textarea('description', isset($entry->description) ? $entry->description : null, ['id' => 'description', 'placeholder' => 'Sadržaj oglasa', 'cols' => '122', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }}
                                        </div>
                                    </div>
                                    <!-- For success/fail messages -->
                                    {{ Form::button(Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-lg btn-primary cta ml-15')) }}
                                </div>
                        </div>
                    </div>
                    <!-- Kontakt forma end -->
                </div>
                {{ Form::close() }}
                <div class="col-lg-3">
                    <div class="row m0 mb35">
                        <div class="avatar">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/users/thumbs/' . $user->image, $user->first_name, array('class' => 'img-circle', 'style' => 'max-height: 100px;')) }}
                        </div>
                        <div class="user-data mb15">
                            <h4 class="mb20">{{ $user->username }}</h4>
                            <p>Registriran od: {{ date('d. m. Y.', strtotime( $user->created_at )) }} </p> 
                            <p>Kontakt: {{$user->contact1}} </p>
                        </div>
                        <i class="fa fa-arrow-right pull-left"></i><a href="{{URL::route ('MyProfile', array('permalink' => Auth::user()->permalink ))}}"> Moj profil </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('frontend.includes.footer')
<script src="/js/frontend/locationpicker.jquery.min.js"></script>
<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyAGZyUPlcENH-4yfK4IzBvnclrAO-M5cCo&callback'></script>
<script>
    $('#us3').locationpicker({
        location: {
            latitude: 45.79643165544949,
            longitude: 15.984222412109375
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