 <div class="row">
                <!-- Main content -->
                <div class="col-md-12">
                    <!-- Breadcrumbs -->
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
                        <li><a href="{{ URL::route('AdsIndex') }}">Pregled svih oglasa</a></li> 
                        <li class="active">Pregled oglasa</li>
                    </ul>
                    <!-- /breadcrumbs -->
                    <!-- Slika, istaknute informacije, povijest bolesti -->
                    <div class="col-md-6">
                        <section class="panel">
                            <div class="panel-body">
                               
                                    <div class="col-md-12 mb15 p0">
                                       {{   HTML::image('img/avatar.png', 'Logo', array('class' => 'img-responsive')) }}
                                    </div>

                                    <div class="input-profile-picture">
                                        <input type="file" class="filestyle" data-input="false">
                                    </div>
                               
                            </div>
                        </section>
                        {{ Form::hidden('id', $entry->id, array('id' => 'id')) }} 
                        <section class="panel">
                            <div class="panel-body">
                            <div class="cold-md-12 mb15">
                                        <label>Naslov</label>
                                        {{ Form::text('title', isset($entry->title) ? $entry->title : null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Naslov', 'readonly' => 'true']) }}
                            </div>
                            <div class="cold-md-12 mb15">
                                        <label>Vrsta drveta</label>
                                        {{ Form::text('woodname', isset($woodname) ? $woodname : null, ['class' => 'form-control', 'id' => 'woodname', 'placeholder' => 'Vrsta drveta', 'readonly' => 'true']) }}
                            </div>
                            <div class="cold-md-12 mb15">
                                        <label>Vrsta pakiranja</label>
                                        {{ Form::text('packaging', isset($packaging) ? $packaging : null, ['class' => 'form-control', 'id' => 'packaging', 'placeholder' => 'Vrsta pakiranja', 'readonly' => 'true']) }}
                            </div>
                            <div class="cold-md-12 mb15">
                                        <label>Cijena</label>
                                        {{ Form::text('price', isset($entry->price) ? $entry->price : null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Cijena', 'readonly' => 'true']) }}
                            </div>
                                <div class="col-md-12 p0">
                                    <label>Sadržaj oglasa</label> 
                                    {{ Form::textarea('description', isset($entry->description) ? $entry->description : null, ['id' => 'description', 'placeholder' => 'Sadržaj oglasa', 'cols' => '102', 'rows' => '8', 'readonly' => 'true', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }}
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
                                        {{ Form::text('username', isset($entry->username) ? $entry->username : null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Korisničko ime', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Regija</label>
                                        {{ Form::text('regionname', isset($regionname) ? $regionname : null, ['class' => 'form-control', 'id' => 'regionname', 'placeholder' => 'Regija', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Mjesto</label>
                                        {{ Form::text('cityname', isset($cityname) ? $cityname : null, ['class' => 'form-control', 'id' => 'cityname', 'placeholder' => 'Regija', 'readonly' => 'true']) }}
                                    </div> 
                                    <div class="form-group">
                                        <label>Email addresa</label>
                                         {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'readonly' => 'true']) }}
                                    </div> 
                                    <div class="form-group">
                                        <label>Kontakt Tel1</label>
                                        {{ Form::text('contact1', isset($entry->contact1) ? $entry->contact1 : null, ['class' => 'form-control', 'id' => 'contact1', 'placeholder' => 'Kontakt Tel1', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Kontakt Tel2</label>
                                        {{ Form::text('contact2', isset($entry->contact2) ? $entry->contact2 : null, ['class' => 'form-control', 'id' => 'contact2', 'placeholder' => 'Kontakt Tel2', 'readonly' => 'true']) }}
                                    </div>
                                    <select class="ml2">
                                      <option value="1">Objavljen</option>
                                      <option value="0">Nije objavljen</option> 
                                    </select>
                                    <a href="{{ URL::route('AdsEdit', array('id' => $entry->id)) }}" class="btn btn-info pull-right"> Uredi </a>
                                        {{ Form::close() }} 
                    
                            </div>
                        </section>
                    </div>
                </div>
            </div> 