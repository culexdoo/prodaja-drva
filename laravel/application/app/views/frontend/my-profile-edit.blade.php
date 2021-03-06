@include('frontend.includes.navbar')
    <!-- Image Header -->
    <div class="row m0">
        <div class="col-lg-12 p0">
            <div class="mh400" style="background-image: url(/img/frontend/classified-list-banner.jpg);">
                <div class="container text-center ">
                    <h1 class="text-white mt100 fs65"> Moj profil! </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->
    <!-- profile start -->
    <div class="row m0 mt80">
        <div class="container">
            <div class="col-lg-3">
            {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
            {{ Form::hidden('id', $entry->id, array('id' => 'id')) }} 
            {{ Form::hidden('permalink', $entry->permalink, array('permalink' => 'permalink')) }}
                <div class="row">
                    <div class="profile-picture">
                        @if ($entry->image == null)
                            <div class="form-group mb15">
                            <label class="col-md-12" for="image">Trenutna slika:</label>
                                <div class="col-md-12 p0 img-style"></div>
                            </div>
                        @elseif ($entry->image != null || $entry->image != '')
                            <div class="form-group mb15">
                                <label class="col-md-12" for="image">Trenutna slika:</label> 
                                <div class="col-md-12">
                                    {{ HTML::image(URL::to('/') . '/uploads/frontend/users/thumbs/' . $entry->image, $entry->first_name) }}
                                </div>
                            </div>
                        @endif 
                        <div class="col-md-12 p0">
                            {{ Form::file('image', array('class' => 'form-control filestyle text-center'))  }}
                            @if (isset($errors) && ($errors->first('image') != '' || $errors->first('image') != null))
                            <small class="text-danger">{{ $errors->first('image') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="user-info pl10">
                        <h3>{{ $entry->first_name . ' ' .$entry->last_name }}</h3>
                    </div>
                    <div class="user-short-desc pl10">
                        {{ Form::textarea('user_info', isset($entry->user_info) ? $entry->user_info : null, ['id' => 'user_info', 'placeholder' => 'Vaš kratki opis', 'cols' => '36', 'rows' => '3', 'style' => 'border: 1px solid #CCC; border-radius: 5px']) }}
                    </div>
                    <div class="user-status pl10">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td><span class="label label-success" style="position: relative; left: 65px;">Aktivan</span></td>
                                </tr>
                                <tr>
                                    <td>Registriran od</td>
                                    <td style="position: relative; left: 40px">{{ date('d. m. Y.', strtotime( $entry->created_at )) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row p0 mb50"> 
                        {{ Form::button(Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-primary btn-lg cta mt0')) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tabs widget" id="tabs">
                    <ul class="nav nav-tabs widget mt0">
                        <li class="active">
                            <a data-toogle="tab" href="#profile-tab">Profil </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="profile-tab" class="tab-pane active"> 
                            <div class="p20"> 
                                <i class="fa fa-user fa-2x"></i>
                                <h3>Informacije o korisniku</h3> 
                                <div class="row mt25">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Ime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Ime']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Prezime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Prezime']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Korisničko ime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::text('username', isset($entry->username) ? $entry->username : null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Korisničko ime']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Email: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Mjesto: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::select('city', $citylist, isset($entry->city) ? $entry->city : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Primarni kontakt: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::text('contact1', isset($entry->contact1) ? $entry->contact1 : null, ['class' => 'form-control', 'id' => 'contact1', 'placeholder' => 'Kontakt Tel1']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Regija: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::select('region', $regionlist, isset($entry->region) ? $entry->region : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Sekundarni kontakt: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::text('contact2', isset($entry->contact2) ? $entry->contact2 : null, ['class' => 'form-control', 'id' => 'contact2', 'placeholder' => 'Kontakt Tel2']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label pt6">Datum rođenja: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                {{ Form::text('date_of_birth', isset($entry->date_of_birth) ? $entry->date_of_birth : null, ['class' => 'form-control', 'id' => 'date_of_birth', 'placeholder' => 'Datum rođenja']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{ Form::close() }}
        <!-- profile end -->
</div>

@include('frontend.includes.footer')