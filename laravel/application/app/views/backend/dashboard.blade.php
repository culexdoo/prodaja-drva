                <div class="row" style="margin-bottom:5px;">
                    <div class="col-md-2">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-red"><i class="fa fa-pencil"></i></span>
                            <div class="sm-st-info">
                                <span>{{ $countallads }}</span> Ukupno oglasa
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-red"><i class="fa fa-pencil"></i></span>
                            <div class="sm-st-info">
                                <span>{{ $countactiveads }}</span> Aktivnih oglasa
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-green"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">
                                <span>{{ $countallusers }}</span> Ukupno korisnika
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-green"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">
                                <span>{{ $countactiveusers }}</span> Aktivnih korisnika
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-comment"></i></span>
                            <div class="sm-st-info">
                                <span>{{ $countallreviews }}</span> Ukupno recenzija
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-comment"></i></span>
                            <div class="sm-st-info">
                                <span>{{ $countactivereviews }}</span> Aktivnih recenzija
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
                                            <th>Aktivan</th>
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
                                            <td>{{ $user->published }}</td>
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
                                        <th>Aktivan</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (count($ads) > 0) 
                                    @foreach($ads as $ad)
                                    <tr>
                                        <td>{{ $ad->id }}</td>
                                        <td>{{ $ad->username }}</td>
                                        <td>{{ $ad->title }}</td>
                                        <td>{{ $ad->description }}</td>
                                        <td>{{ $ad->published }}</td>
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

                <div class="row mt20">
                    <div class="col-md-6">
                        <div class="bg-white">
                            <header class="panel-heading">
                                Pregled zadnjih recenzija
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover" id="review-list">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Korisnik</th>  
                                        <th>Oglašivač</th>
                                        <th>Sadržaj recenzije</th>
                                        <th>Aktivan</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (count($reviews) > 0) 
                                    @foreach($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>{{ $review->user }}</td> 
                                        <td>{{ $review->reviewed_user }}</td>
                                        <td>{{ $review->review_content }}</td>
                                        <td>{{ $review->published}}</td>
                                        <td>
                                            <a href="{{ URL::route('ReviewShow', array('id' => $review->id)) }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ URL::route('ReviewEdit', array('id' => $review->id)) }}">
                                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <button type="button" id="btn-delete-review-id-{{ $review->id }}" class="btn btn-danger btn-xs" data-target="#delete-review-id-{{ $review->id }}"><i class="fa fa-times"></i>
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
                                Pregled zadnjih upita
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover" id="review-list">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Ime</th>  
                                        <th>Prezime</th>
                                        <th>Sadržaj upita</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (count($inquirys) > 0) 
                                    @foreach($inquirys as $inquiry)
                                    <tr>
                                        <td>{{ $inquiry->id }}</td>
                                        <td>{{ $inquiry->first_name }}</td> 
                                        <td>{{ $inquiry->last_name }}</td>
                                        <td>{{ $inquiry->content }}</td>
                                        <td>
                                            <a href="{{ URL::route('InquiryShow', array('id' => $inquiry->id)) }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ URL::route('InquiryEdit', array('id' => $inquiry->id)) }}">
                                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <button type="button" id="btn-delete-inquiry-id-{{ $inquiry->id }}" class="btn btn-danger btn-xs" data-target="#delete-inquiry-id-{{ $inquiry->id }}"><i class="fa fa-times"></i>
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

@if (count($reviews) > 0) 
    @foreach($reviews as $review)
    <div class="modal fade" id="delete-review-id-{{ $review->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati recenziju: {{ $review->id }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('ReviewDestroy', array('id' => $review->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

@if (count($inquirys) > 0) 
    @foreach($inquirys as $inquiry)
    <!-- Modal {{ $inquiry->id }}-->
    <div class="modal fade" id="delete-inquiry-id-{{ $inquiry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati upit: {{ $inquiry->id }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('InquiryDestroy', array('id' => $inquiry->id)) }}">
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
    $(document).ready(function() {
         @if (count($reviews) > 0) 
            @foreach($reviews as $review)
                $("#btn-delete-review-id-{{ $review->id }}").click(function() { 
                    $('#delete-review-id-{{ $review->id }}').modal('show');
                });
           
            @endforeach
        @endif 
     });
    $(document).ready(function() {
         @if (count($inquirys) > 0) 
            @foreach($inquirys as $inquiry)
                $("#btn-delete-inquiry-id-{{ $inquiry->id }}").click(function() { 
                    $('#delete-inquiry-id-{{ $inquiry->id }}').modal('show');
                });
           
            @endforeach
        @endif 
     });
    </script>