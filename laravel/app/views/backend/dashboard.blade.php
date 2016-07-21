


                <div class="row" style="margin-bottom:5px;">
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-red"><i class="fa fa-pencil"></i></span>
                            <div class="sm-st-info">
                                <span>400</span> Aktivnih oglasa
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-violet"><i class="fa fa-pencil"></i></span>
                            <div class="sm-st-info">
                                <span>30</span> Novih oglasa
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-green"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">
                                <span>400</span> Aktivnih korisnika
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-comment"></i></span>
                            <div class="sm-st-info">
                                <span>3</span> Ukupno recenzija
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="bg-white">
                            <header class="panel-heading">
                                Pregled zadnje registriranih korisnika
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover" id="user-list">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Ime</th>
                                            <th>Prezime</th>
                                            <th>Kontakt</th>
                                            <th>Mjesto</th>
                                            <th>Akcije</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($users) > 0) 
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->contact1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a href="{{ URL::route('UsersShow', array('id' => $user->id)) }}">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                                </a>
                                                <a href="{{ URL::route('UsersEdit', array('id' => $user->id)) }}">
                                                    <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <button type="button" id="btn-delete-users-id-{{ $user->id }}" class="btn btn-danger btn-xs" data-target="#delete-users-id-{{ $user->id }}"><i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                 @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white">
                            <header class="panel-heading">
                                Pregled zadnjih oglasa
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover" id="ad-list">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Korisničko ime</th>
                                        <th>Naslov</th>
                                        <th>Sadržaj oglasa</th>
                                        <th>Email</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (count($ads) > 0) 
                                    @foreach($ads as $ad)
                                    <tr>
                                        <td>{{ $ad->id }}</td>
                                        <td>{{ $ad->user }}</td>
                                        <td>{{ $ad->title }}</td>
                                        <td>{{ $ad->description }}</td>
                                        <td>{{ $ad->email }}</td>
                                        <td>
                                            <a href="{{ URL::route('AdsShow', array('id' => $ad->id)) }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ URL::route('AdsEdit', array('id' => $ad->id)) }}">
                                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <button type="button" id="btn-delete-ads-id-{{ $ad->id }}" class="btn btn-danger btn-xs" data-target="#delete-ads-id-{{ $ad->id }}"><i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr> 
                                    @endforeach
                                 @endif
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div> 
                </div>
                

            <!-- modals --> 
@if (count($users) > 0) 
    @foreach($users as $user)
			    <!-- Modal 1-{{ $user->id }}-->
	<div class="modal fade" id="delete-users-id-{{ $user->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati korisnika {{ $user->first_name }}?</p>
                </div>
                <div class="modal-footer">
                <a href="{{ URL::route('UsersDestroy', array('id' => $user->id)) }}">
                    <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div> 
    @endforeach
@endif 

@if (count($ads) > 0) 
    @foreach($ads as $ad)
    <!-- Modal {{ $ad->id }}-->
    <div class="modal fade" id="delete-ads-id-{{ $ad->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati oglas: {{ $ad->title }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('AdsDestroy', array('id' => $ad->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 
            <!-- modals end -->

            
    <script type="text/javascript">
    $(document).ready(function() {
         @if (count($users) > 0) 
            @foreach($users as $user)
                $("#btn-delete-users-id-{{ $user->id }}").click(function() { 
                    $('#delete-users-id-{{ $user->id }}').modal('show');
                });
           
            @endforeach
        @endif 
        });
    $(document).ready(function() {
         @if (count($ads) > 0) 
            @foreach($ads as $ad)
                $("#btn-delete-ads-id-{{ $ad->id }}").click(function() { 
                    $('#delete-ads-id-{{ $ad->id }}').modal('show');
                });
           
            @endforeach
        @endif 
     });
    </script>