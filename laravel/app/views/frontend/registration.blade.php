<div class="container">
        <div class="row main">
            <div class="panel-heading" style="border-left: 0 !important;">
                <div class="panel-title text-center">
                    <h2 class="title">Registriraj se</h2>
                    <hr>
                </div>
            </div>
            <div class="main-login main-center">
            {{ Form::open(array('route' => 'postRegister', 'autocomplete' => 'off', 'role' => 'form')) }}
                <form class="form-horizontal" method="post" action="#">
                    <div class="form-group">
                        <label for="first_name" class="cols-sm-2 control-label">Vaše ime</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                {{ Form::text('first_name', null, array('id' => 'first_name', 'class' => 'form-control', 'required', 'placeholder' => 'Unesite svoje ime')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="cols-sm-2 control-label">Vaše prezime</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                {{ Form::text('last_name', null, array('id' => 'last_name', 'class' => 'form-control', 'required', 'placeholder' => 'Unesite svoje prezime')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label">Vaš Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                {{ Form::text('email', null, array('id' => 'email', 'class' => 'form-control', 'required', 'placeholder' => 'Unesite vaš email')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Korisničko ime</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                {{ Form::text('username', null, array('id' => 'username', 'class' => 'form-control', 'required', 'placeholder' => 'Unesite svoje korisničko ime')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Lozinka</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm" class="cols-sm-2 control-label">Potvrda lozinke</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                {{ Form::password('repeat_password', array('id' => 'repeat_password', 'class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block m0">Registriraj se</button>
                    </div>
                    {{ Form::close() }}
                    <div class="form-group mt30">
                        <p>Registriran ste korisnik?</p>
                        <a href="sign-in.html">
                            <button type="button" class="btn btn-primary btn-lg btn-block m0">Prijavi se</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>