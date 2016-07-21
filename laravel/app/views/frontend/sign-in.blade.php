    <div class="container" style="margin-top: 215px;">
    
        <form class="form-signin">
        {{ Form::open(array('route' => 'postSignIn', 'autocomplete' => 'on', 'role' => 'form', 'class' => 'form-container')) }}
            <h2 class="form-signin-heading text-center">Prijavi se</h2>
            <hr />
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
                <label for="password" class="cols-sm-2 control-label">Lozinka</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                        {{ Form::password('password', array('id' => 'password', 'class' => 'form-control mb0',  'required')) }}
                    </div>
                </div>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Zapamti me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block m0 mb35" type="submit">Prijava</button>

            <div class="form-group mb35">
                <a href="{{URL::route ('passwordRecovery')}}"> Zaboravili ste lozinku? </a>
            </div>

            <div class="form-group">
                <p>Niste registrirani?</p>
                <a href="{{URL::route('getRegistration') }}">
                    <button type="button" class="btn btn-primary btn-lg btn-block m0">Registriraj se</button>
                </a>
            </div> 
            {{ Form::close() }}
        </form>
        
    </div>
    <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->