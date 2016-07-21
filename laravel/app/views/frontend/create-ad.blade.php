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
                {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="add-ad-image">
                                <img class="img-responsive" src="http://www.index.hr/oglasi/UserDocsImages/oglas/_2016/6/7/353810/20151202124146resized-070620161518565437.jpg?preset=oglas-slike-view-detaljnoGalOpen2&a=1465982648551" alt="">
                            </div>
                            <a class=" btn btn-lg cta mb35 ml0" href="#">Postavite sliku</a>
                        </div>
                        <div class="col-lg-6">
                            <div style='overflow:hidden;height:300px;width:400px;'>
                                <div id='gmap_canvas' style='height:300px;width:400px;'></div>
                                <div><small><a href="http://embedgooglemaps.com">                                   embed google maps                           </a></small></div>
                                <div><small><a href="https://privacypolicytemplate.net">privacy policy template</a></small></div>
                                <style>
                                #gmap_canvas img {
                                    max-width: none!important;
                                    background: none!important
                                }
                                </style>
                            </div>
                            <a class=" btn btn-lg cta mb35 ml0" href="#">Postavite lokaciju</a>
                        </div>
                    </div>
                    <!-- Kontakt forma start -->
                    <div class="row mb15 mt65">
                        <div class="col-lg-12 p0">
                            
                                <div class="col-lg-6">
                                    <div class="control-group form-group">
                                        <div class="controls">
                                            <label>Naslov:</label>
                                            {{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naslov']) }}
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
                                            {{ Form::select('packaging', $packaginglist, isset($entry->packaging) ? $entry->packaging : null, array('class' => 'form-control selectpicker','id' => 'id')) }}
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
                                            {{ Form::select('city', $citylist, isset($entry->city) ? $entry->city : null, array('class' => 'form-control selectpicker','id' => 'id')) }} 
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
                                    {{ Form::button(Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-lg btn-default mt15 cta ml0')) }}
                                </div>
                        </div>
                    </div>
                    <!-- Kontakt forma end -->
                </div>
                {{ Form::close() }}
                <div class="col-lg-3">
                    <div class="row m0 mb35">
                        <div class="avatar">
                            <img src="http://www.index.hr/oglasi/img/avatar-default.jpg" style="width: 100px;">
                        </div>
                        <div class="user-data mb15">
                            <h4 class="mb20">Username</h4>
                            <p>Registriran od: dd-mm-yyyy</p> 
                            <p>Kontakt: 09x / xxx - xx - xx</p>
                        </div>
                        <i class="fa fa-arrow-right pull-left"></i><a href="user-profile.html"> Detaljnije o ovom oglašivaču </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('frontend.includes.footer')