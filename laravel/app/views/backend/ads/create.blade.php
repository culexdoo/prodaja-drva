<div class="row">
                <!-- Main content -->
                <div class="col-md-12">
                    <!-- Breadcrumbs -->
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
                        <li><a href="{{ URL::route('AdsIndex') }}">Pregled svih oglasa</a></li>  
                        <li class="active">Dodaj novi oglas</li>
                    </ul>
                    <!-- /breadcrumbs -->
                    <!-- Slika, istaknute informacije, povijest bolesti -->
                    <div class="col-md-6">
                        <section class="panel">
                        {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                            <div class="panel-body">
                               
                                    <div class="col-md-12 mb15 p0">
                                       {{   HTML::image('img/avatar.png', 'Logo', array('class' => 'img-responsive')) }}
                                    </div>

                                    <div class="input-profile-picture">
                                        <input type="file" class="filestyle" data-input="false">
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
                                    {{ Form::textarea('description', isset($entry->description) ? $entry->description : null, ['id' => 'description', 'placeholder' => 'Sadržaj oglasa', 'cols' => '106', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }} 
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
                                        {{ Form::select('username', $usernamelist, isset($entry->username) ? $entry->username : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
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
                                         {{ Form::select('email', $emaillist, isset($entry->email) ? $entry->email : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                    </div> 
                                    <div class="form-group">
                                        <label>Kontakt Tel1</label>
                                        {{ Form::text('contact1', isset($entry->contact1) ? $entry->contact1 : null, ['class' => 'form-control', 'id' => 'contact1', 'placeholder' => 'Kontakt Tel1']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Kontakt Tel2</label>
                                        {{ Form::text('contact2', isset($entry->contact2) ? $entry->contact2 : null, ['class' => 'form-control', 'id' => 'contact2', 'placeholder' => 'Kontakt Tel2']) }}
                                    </div>
                                    <select class="ml2">
                                      <option value="1">Objavljen</option>
                                      <option value="0">Nije objavljen</option> 
                                    </select>
                                    {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                                        {{ Form::close() }} 
                    
                            </div>
                        </section>
                    </div>
                </div>
            </div>