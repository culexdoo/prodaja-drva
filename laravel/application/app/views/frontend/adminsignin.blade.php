    <main>

      <div class="login-block">
        <h1>Prijava u administraciju</h1>

       {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
            </div>
          </div>
          
          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Lozinka')) }}

            </div>
          </div>
 
          {{ Form::button('Prijavite se', array('type' => 'submit', 'class' => 'btn btn-primary btn-block')) }}
        {{ Form::close() }}
       
      </div>

 

    </main>
