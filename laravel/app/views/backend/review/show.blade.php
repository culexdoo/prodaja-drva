            <div class="row-top">
                <!-- Main content -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
                    <li><a href="{{ URL::route('ReviewIndex') }}">Pregled svih recenzija</a></li>
                    <li class="active">Pogledaj recenziju</li>
                </ul>
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Podaci o autoru
                        </header>
                        {{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
                        <div class="panel-body col-md-8"> 
                                <div class="form-group">
                                        <label>Korisnik</label>
                                        {{ Form::text('user', isset($objavio->username) ? $objavio->username : null, ['class' => 'form-control', 'id' => 'user', 'placeholder' => 'Korisnik', 'readonly' => 'true']) }}
                                </div> 
                                <div class="form-group">
                                        <label>Oglašivač</label>
                                        {{ Form::text('reviewed_user', isset($reviewed_user->username) ? $reviewed_user->username : null, ['class' => 'form-control', 'id' => 'reviewed_user', 'placeholder' => 'Oglašivač', 'readonly' => 'true']) }}
                                </div> 
                                <div class="form-group">
                                    <label>Sadržaj oglasa</label> 
                                    {{ Form::textarea('review_content', isset($entry->review_content) ? $entry->review_content : null, ['id' => 'review_content', 'placeholder' => 'Sadržaj oglasa', 'cols' => '143', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;', 'readonly' => 'true']) }}
                                </div>
                                <div class="col-md-12 mb15 p0">
                                <p>Ocjena korisnika</p>
                                <select class="">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option> 
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                </select>
                                </div>
                                {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info')) }}
                                        {{ Form::close() }} 
                        </div>
                    </section>
                </div>
            </div> 
