<div class="row">
                <!-- Main content -->
                <div class="col-md-12">
                    <!-- Breadcrumbs -->
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
                        <li><a href="{{ URL::route('UsersIndex') }}">Pregled svih korisnika</a></li>  
                        <li class="active">Dodaj korisnika</li>
                    </ul>
                    <!-- /breadcrumbs -->
                    <!-- Slika, istaknute informacije, povijest bolesti -->
                    <div class="col-md-6">
                        {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                        <section class="panel">
                            <div class="panel-body">
                               
                                    <div class="col-md-6">
                                       {{ Form::file('image', array('class' => 'form-control filestyle mt10'))  }}
                                        @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                                            <small class="text-danger">{{ $errors->first('image') }}</small>
                                        @endif
                                    </div>
                               
                            </div>
                        </section>
                        <section class="panel">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <label>Dodatne bilješke</label>
                                    {{ Form::textarea('additional_notes', isset($entry->additional_notes) ? $entry->additional_notes : null, ['id' => 'additional_notes', 'placeholder' => 'Dodatne bilješke', 'cols' => '103', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px']) }} 
                                </div>
                            </div>
                        </section>
                        <section class="panel">
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <label>Info o korisniku</label> 
                                    {{ Form::textarea('user_info', isset($entry->user_info) ? $entry->user_info : null, ['id' => 'user_info', 'placeholder' => 'Info o korisniku', 'cols' => '103', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px']) }}
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
                                        {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Ime']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Prezime</label>
                                          {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Prezime']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Korisničko ime</label>
                                        {{ Form::text('username', isset($entry->username) ? $entry->username : null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Korisničko ime']) }}
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
                                        <label>Datum rođenja</label>
                                        {{ Form::text('date_of_birth', isset($entry->date_of_birth) ? $entry->date_of_birth : null, ['class' => 'form-control', 'id' => 'date_of_birth', 'placeholder' => 'Datum rođenja']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Email addresa</label>
                                         {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Lozinka</label>
                                        {{ Form::password('password', array('id' => 'password', 'class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group">
                                        <label>Potvrda lozinke</label>
                                        {{ Form::password('repeat_password', array('id' => 'repeat_password', 'class' => 'form-control')) }}
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
                                    {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info pull-right')) }}
                                        {{ Form::close() }} 
                    
                            </div>
                        </section>
                    </div>
                </div>
            </div>
