            <div class="row-top">
                <!-- Main content -->
                <ul class="breadcrumb">
                    <li><a href="{{ URL::route('getDashboard') }}"><i class="fa fa-home"></i> Početna</a></li>
                    <li><a href="{{ URL::route('InquiryIndex') }}">Pregled svih upita</a></li>
                    <li class="active">Pogledaj upit</li>
                </ul>
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Podaci o autoru
                        </header>
                        {{ Form::hidden('id', $entry->id, array('id' => 'id')) }}
                        <div class="panel-body col-md-8"> 
                                <div class="form-group">
                                        <label>Ime korisnika</label>
                                        {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Ime korisnika', 'readonly' => 'true']) }}
                                </div> 
                                <div class="form-group">
                                        <label>Prezime korisnika</label>
                                        {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Prezime korisnika', 'readonly' => 'true']) }}
                                </div>
                                <div class="form-group">
                                        <label>Email korisnika</label>
                                        {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email korisnika', 'readonly' => 'true']) }}
                                </div>  
                                <div class="form-group">
                                    <label>Sadržaj upita</label> 
                                    {{ Form::textarea('content', isset($entry->content) ? $entry->content : null, ['id' => 'content', 'placeholder' => 'Sadržaj upita', 'cols' => '143', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;', 'readonly' => 'true']) }}
                                </div>
                                {{ Form::button('<i class="fa fa-floppy-o"></i>   ' . Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-info')) }}
                                {{ Form::close() }} 
                        </div>
                    </section>
                </div>
            </div> 
