<div class="container">
    <div class="row mt120">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Zaboravili ste lozinku?</h2>
                        <p>Možete resetirati lozinku ovdje.</p>
                        <div class="panel-body p0">
                            {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                                <fieldset class="p0 b0">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="padding: 6px 12px;"><i class="glyphicon glyphicon-envelope color-blue" style="top:0px; color: #fff;"></i></span>
                                            {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'style' => 'height: 54px;', 'id' => 'email', 'placeholder' => 'Email']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-lg btn-primary btn-block cta m0" value="Pošalji mi lozinku" type="submit">
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