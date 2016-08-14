<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Zaboravili ste lozinku?</h2>
                            <p>Možete resetirati lozinku ovdje.</p>
                            <div class="panel-body">
                                {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue" style="top:0px;"></i></span>
                                                {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-lg btn-primary btn-block m0" value="Pošalji mi lozinku" type="submit">
                                        </div>
                                    </fieldset>
                                {{ Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>