            <div class="row-top">
                <!-- Main content -->
                <div class="col-md-12">
                <a href="{{ URL::route('ReviewCreate') }}" class="pull-right" style="margin-top: 10px; margin-right: 10px;">
                            <button class="btn btn-primary btn-addon btn-sm">
                                <i class="fa fa-plus"></i> Dodaj novu recenziju
                            </button>
                        </a> 
                    <section class="panel">
                        <header class="panel-heading">
                            Pregled svih recenzija
                        </header>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover" id="review-list">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Korisnik</th>  
                                        <th>Oglašivač</th>
                                        <th>Sadržaj recenzije</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (count($entries) > 0) 
                                    @foreach($entries as $entry)
                                    <tr>
                                        <td>{{ $entry->id }}</td>
                                        <td>{{ $entry->user }}</td> 
                                        <td>{{ $entry->reviewed_user }}</td>
                                        <td>{{ $entry->review_content }}</td>
                                        <td>
                                            <a href="{{ URL::route('ReviewShow', array('id' => $entry->id)) }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ URL::route('ReviewEdit', array('id' => $entry->id)) }}">
                                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <button type="button" id="btn-delete-review-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-review-id-{{ $entry->id }}"><i class="fa fa-times"></i>
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
            </div> 
            @if (count($entries) > 0) 
    @foreach($entries as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-review-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati recenziju korisnika: {{ $entry->user }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('ReviewDestroy', array('id' => $entry->id)) }}">
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
                $("#btn-delete-review-id-{{ $entry->id }}").click(function() { 
                    $('#delete-review-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        $('#review-list').DataTable({
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
