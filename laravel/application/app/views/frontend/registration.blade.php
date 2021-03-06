<div class="container" style="position: relative; bottom: 135px;">
    <div class="row main">
        <div class="panel-heading" style="border-left: 0 !important; border-bottom: none;">
            <div class="panel-title text-center">
                <h2 class="title">Registrirajte se</h2>
                    <p style="text-transform: lowercase; font-weight: 100;">kako biste mogli objavljivati oglase</p>
                <hr>
            </div>
        </div>
        <div class="main-login main-center">
            {{ Form::open(array('route' => 'postRegister', 'autocomplete' => 'off', 'role' => 'form')) }}
            <div class="row">
                <div class="col-lg-6">
                    <label for="first_name" class="cols-sm-2 control-label mb0">Vaše ime</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            {{ Form::text('first_name', null, array('id' => 'first_name', 'class' => 'form-control', 'required', 'placeholder' => 'Unesite svoje ime', 'style' => 'font-family: Lora, serif;')) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="last_name" class="cols-sm-2 control-label mb0">Vaše prezime</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            {{ Form::text('last_name', null, array('id' => 'last_name', 'class' => 'form-control', 'required', 'placeholder' => 'Unesite svoje prezime', 'style' => 'font-family: Lora, serif;')) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="last_name" class="cols-sm-2 control-label mt15 mb0">Regija</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            {{ Form::select('region', $regionlist, isset($entry->region) ? $entry->region : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%; font-family: Lora, serif;', 'id' => 'id')) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="last_name" class="cols-sm-2 control-label mt15 mb0">Grad</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            {{ Form::select('city', $citylist, isset($entry->city) ? $entry->city : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%; font-family: Lora, serif;', 'id' => 'id')) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="email" class="cols-sm-2 control-label mt15 mb0">Vaš Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            {{ Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'required', 'placeholder' => 'Unesite vaš email', 'style' => 'font-family: Lora, serif;')) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="username" class="cols-sm-2 control-label mt15 mb0">Korisničko ime</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            {{ Form::text('username', null, array('id' => 'username', 'class' => 'form-control', 'required', 'placeholder' => 'Unesite svoje korisničko ime', 'style' => 'font-family: Lora, serif;')) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="password" class="cols-sm-2 control-label mt15 mb0">Lozinka</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'required', 'style' => 'font-family: Lora, serif;')) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="confirm" class="cols-sm-2 control-label mt15 mb0">Potvrda lozinke</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            {{ Form::password('repeat_password', array('id' => 'repeat_password', 'class' => 'form-control', 'required', 'style' => 'font-family: Lora, serif;')) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt30">
                    <div class="col-lg-4 col-lg-offset-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block m0">Registriraj se</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt30">
                    <div class="col-lg-4 col-lg-offset-4">
                        <p>Registriran ste korisnik?</p>
                    </div>
                    <div class="col-lg-4 col-lg-offset-4">
                        <a href="{{URL::route('getSignIn') }}">
                            <button type="button" class="btn btn-primary btn-lg btn-block m0">Prijavi se</button>
                        </a>
                        <a href="{{ URL::route('getLanding') }}">
                        <P>Povratak na naslovnicu</P>
                        </a>  
                    </div>
                </div> 
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>