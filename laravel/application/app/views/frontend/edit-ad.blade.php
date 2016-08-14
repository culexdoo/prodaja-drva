@include('frontend.includes.navbar')
    <!-- Page Content -->
    <div class="row m0 bg-whitesmoke">
        <div class="container">
            <div class="col-lg-12 p0">
                <ol class="breadcrumb mb0 fs16 pl0">
                    <li><a href="{{URL::route('getLanding')}}">Naslovna</a>
                    </li>
                    <li class="active">Objavite oglas</li>
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
                {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'on', 'files' => true)) }}
                    {{ Form::hidden('id', $entry->id, array('id' => 'id')) }} 
                    {{ Form::hidden('permalink', $entry->permalink, array('permalink' => 'permalink')) }}
                    {{ Form::hidden('user', $entry->user, array('user' => 'user')) }}
                    <div class="row">
                        <div class="col-lg-6 p0"> 
                            <div class="add-ad-image" style='height:300px; width:400px;'>
                                @if ($entry->image != null || $entry->image != '')
                                    <div class="form-group mb15">
                                        <div class="col-md-12">
                                            {{ HTML::image(URL::to('/') . '/uploads/frontend/ads/' . $entry->image, $entry->title) }}
                                        </div>
                                    </div>
                                @endif
                            </div> 
                                <h3 class="btn btn-lg cta ml0" style="width: 210px;"><i class="fa fa-arrow-down mr5"></i>Odaberite sliku<i class="fa fa-arrow-down ml5"></i></h3>
                                {{ Form::file('image', array('class' => 'form-control filestyle text-center', 'style' => 'width: 211px;'))  }}
                                @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                                @endif
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
                                    {{ Form::button(Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-lg btn-default cta ml-15')) }}
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
                            <p>Registriran od: {{$user->created_at}} </p> 
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