            <div class="row-top">
                <!-- Main content -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
                    <li><a href="{{ URL::route('ReviewIndex') }}">Pregled svih recenzija</a></li>
                    <li class="active">Dodaj recenziju</li>
                </ul>
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Podaci o autoru
                        </header>
                        {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                        <div class="panel-body col-md-8"> 
                                <div class="form-group plr15">
                                        <label>Korisnik</label>
                                        {{ Form::select('user', $userlist, isset($entry->user) ? $entry->user : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}

                                            <small class="text-danger">{{ $errors->first('user') }}</small>
                                </div>
                                <div class="form-group plr15">
                                        <label>Oglašivač</label>
                                        {{ Form::select('reviewed_user', $userlist, isset($entry->reviewed_user) ? $entry->reviewed_user : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                </div> 
                                <div class="form-group plr15">
                                    <label>Sadržaj recenzije</label> 
                                    {{ Form::textarea('review_content', isset($entry->review_content) ? $entry->review_content : null, ['id' => 'review_content', 'placeholder' => 'Sadržaj recenzije', 'cols' => '147', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }}
                                </div>
                                <div class="col-md-12 mb15 p0">
                                <label>Ocijeni korisnika</label>
                                <select class="form-control" id="rating" name="rating">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option> 
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                </select> 
                                </div>
                                <div class="form-group plr15">
                                    <label>Objavljen</label> 
                                    {{ Form::select('published', array('0' => 'Ne', '1' => 'Da'), isset($entry->published) ? $entry->published : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%')) }} 
                                    </div>
                                {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info')) }}
                                        {{ Form::close() }} 
                        </div>
                    </section>
                </div>
            </div> 
