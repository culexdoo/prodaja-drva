<div class="row">
                <!-- Main content -->
                <div class="col-md-12">
                    <!-- Breadcrumbs -->
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
                        <li><a href="{{ URL::route('UsersIndex') }}">Pregled svih korisnika</a></li> 
                        <li class="active">Pregled korisnika</li>
                    </ul>
                    <!-- /breadcrumbs -->
                    <!-- Slika, istaknute informacije, povijest bolesti -->
                    <div class="col-md-6">
                        <section class="panel">
                            <div class="panel-body">
                               
                                    <div class="col-md-6">
                                       {{   HTML::image('img/avatar.png', 'Logo', array('class' => 'img-responsive')) }}
                                    </div>
                               
                            </div>
                        </section>
                        {{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
                        <section class="panel">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <label>Dodatne bilješke</label>
                                    {{ Form::textarea('additional_notes', isset($entry->additional_notes) ? $entry->additional_notes : null, ['id' => 'additional_notes', 'placeholder' => 'Dodatne bilješke', 'cols' => '103', 'rows' => '8', 'readonly' => 'true', 'style' => 'border: 1px solid #CCC; border-radius: 5px']) }}
                                </div>
                            </div>
                        </section>
                        <section class="panel">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <label>Info o korisniku</label>
                                    {{ Form::textarea('user_info', isset($entry->user_info) ? $entry->user_info : null, ['id' => 'user_info', 'placeholder' => 'Info o korisniku', 'cols' => '103', 'rows' => '8', 'readonly' => 'true', 'style' => 'border: 1px solid #CCC; border-radius: 5px']) }}
                                    <div class="input-profile-picture">
                                        <input type="file" class="filestyle" data-input="false">
                                    </div>
                                
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
                                        <label class="move-left">Podaci o korisniku:</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Ime</label>
                                        {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Ime', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Prezime</label>
                                          {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Prezime', 'readonly' => 'true']) }}
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
                                        {{ Form::text('cityname', isset($cityname) ? $cityname : null, ['class' => 'form-control', 'id' => 'cityname', 'placeholder' => 'Mjesto', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Datum rođenja</label>
                                        {{ Form::text('date_of_birth', isset($entry->date_of_birth) ? $entry->date_of_birth : null, ['class' => 'form-control', 'id' => 'date_of_birth', 'placeholder' => 'Prezime', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Email addresa</label>
                                         {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Lozinka</label>
                                        {{ Form::text('password', isset($entry->password) ? $entry->password : null, ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Lozinka', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Kontakt Tel1</label>
                                        {{ Form::text('contact1', isset($entry->contact1) ? $entry->contact1 : null, ['class' => 'form-control', 'id' => 'contact1', 'placeholder' => 'Kontakt Tel1', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Kontakt Tel2</label>
                                        {{ Form::text('contact2', isset($entry->contact2) ? $entry->contact2 : null, ['class' => 'form-control', 'id' => 'contact2', 'placeholder' => 'Kontakt Tel2', 'readonly' => 'true']) }}
                                    </div>
                                    <a href="{{ URL::route('UsersEdit', array('id' => $entry->id)) }}" class="btn btn-info pull-right"> Uredi </a>
                                    {{ Form::close() }}
                    
                            </div>
                        </section>
                    </div>
                </div>
            </div> 
