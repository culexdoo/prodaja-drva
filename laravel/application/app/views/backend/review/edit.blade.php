            <div class="row-top">
                <!-- Main content -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
                    <li><a href="{{ URL::route('ReviewIndex') }}">Pregled svih recenzija</a></li>
                    <li class="active">Uredi recenziju</li>
                </ul>
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Podaci o autoru
                        </header>
                        {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                        {{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
                        <div class="panel-body col-md-8"> 
                                <div class="form-group plr20">
                                    <label>Korisnik</label>
                                        {{ Form::select('user', $userlist, isset($entry->user) ? $entry->user : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                                </div> 
                                <div class="form-group plr20">
                                    <label>Oglašivač</label>
                                        {{ Form::select('reviewed_user', $userlist, isset($entry->reviewed_user) ? $entry->reviewed_user : null, ['class' => 'form-control', 'id' => 'reviewed_user', 'placeholder' => 'Oglašivač']) }}
                                </div> 
                                <div class="form-group plr20">
                                    <label>Sadržaj oglasa</label> 
                                        {{ Form::textarea('review_content', isset($entry->review_content) ? $entry->review_content : null, ['id' => 'review_content', 'placeholder' => 'Sadržaj oglasa', 'cols' => '147', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }}
                                </div>
                                <div class="form-group plr20">
                                    <label>Ocjena korisnika</label>
                                        {{ Form::select('rating', $ratingstars, isset($entry->rating) ? $entry->rating : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%')) }}
                                </div>
                                <div class="form-group plr20">
                                    <label>Objavljen</label> 
                                        {{ Form::select('published', array('0' => 'Ne', '1' => 'Da'), isset($entry->published) ? $entry->published : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%')) }} 
                                </div>
                                {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info')) }}
                                        {{ Form::close() }} 
                        </div>
                    </section>
                </div>
            </div> 
