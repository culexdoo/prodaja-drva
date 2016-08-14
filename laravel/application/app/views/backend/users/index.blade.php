    <div class="row-top"> 
                <div class="col-md-12">
                    <!-- Tipka za dodaj novog korisnika --> 
                        <a href="{{ URL::route('UsersCreate') }}" class="pull-right" style="margin-top: 10px; margin-right: 10px;">
                            <button class="btn btn-primary btn-addon btn-sm">
                                <i class="fa fa-plus"></i> Dodaj novog korisnika
                            </button>
                        </a> 
                    <!-- Kraj tipke -->
                    <section class="panel">
                        <header class="panel-heading">
                            Pregled svih korisnika
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
                                @if (count($entries) > 0) 
                                    @foreach($entries as $entry)
                                    <tr>
                                        <td>{{ $entry->id }}</td>
                                        <td>{{ $entry->first_name }}</td>
                                        <td>{{ $entry->last_name }}</td>
                                        <td>{{ $entry->contact1 }}</td>
                                        <td>{{ $entry->name }}</td>
                                        <td>{{ $entry->published }}</td>
                                        <td class="col-md-1">
                                            <a href="{{ URL::route('UsersShow', array('id' => $entry->id)) }}">
                                                <button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ URL::route('UsersEdit', array('id' => $entry->id)) }}">
                                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <button type="button" id="btn-delete-users-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-users-id-{{ $entry->id }}"><i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                 @endif
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
                <!--Kraj tablice -->
            </div>  
        <!-- /.right-side -->
    </div>
  @if (count($entries) > 0) 
    @foreach($entries as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-users-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati korisnika: {{ $entry->first_name }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('UsersDestroy', array('id' => $entry->id)) }}">
                        <button type="button" class="btn btn-default" data-ok="modal">U redu</button>
                    </a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif 

    <script type="text/javascript">
    $(document).ready(function() {
         @if (count($entries) > 0) 
            @foreach($entries as $entry)
                $("#btn-delete-users-id-{{ $entry->id }}").click(function() { 
                    $('#delete-users-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        $('#user-list').DataTable({
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.11/i18n/Croatian.json"
            },
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
    </script>
