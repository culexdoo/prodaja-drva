<div class="row-top">
                <div class="col-md-12"> 
                        <a href="{{ URL::route('AdsCreate') }}" class="pull-right" style="margin-top: 10px; margin-right: 10px;">
                            <button class="btn btn-primary btn-addon btn-sm">
                                <i class="fa fa-plus"></i> Dodaj novi oglas
                            </button>
                        </a> 
                    <section class="panel">
                        <header class="panel-heading">
                            Oglasi
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
                                @if (count($entries) > 0) 
                                    @foreach($entries as $entry)
                                    <tr>
                                        <td>{{ $entry->id }}</td>
                                        <td>{{ $entry->user }}</td>
                                        <td>{{ $entry->title }}</td>
                                        <td>{{ $entry->description }}</td>
                                        <td>{{ $entry->email }}</td>
                                        <td>
                                            <a href="{{ URL::route('AdsShow', array('id' => $entry->id)) }}">
                                                <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button>
                                            </a>
                                            <a href="{{ URL::route('AdsEdit', array('id' => $entry->id)) }}">
                                                <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                            </a>
                                            <button type="button" id="btn-delete-ads-id-{{ $entry->id }}" class="btn btn-danger btn-xs" data-target="#delete-ads-id-{{ $entry->id }}"><i class="fa fa-times"></i>
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
            @if (count($entries) > 0) 
    @foreach($entries as $entry)
    <!-- Modal {{ $entry->id }}-->
    <div class="modal fade" id="delete-ads-id-{{ $entry->id }}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pozor!</h4>
                </div>
                <div class="modal-body">
                    <p>Želite li obrisati oglas: {{ $entry->title }}?</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ URL::route('AdsDestroy', array('id' => $entry->id)) }}">
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
                $("#btn-delete-ads-id-{{ $entry->id }}").click(function() { 
                    $('#delete-ads-id-{{ $entry->id }}').modal('show');
                });
            @endforeach
        @endif 

        $('#ad-list').DataTable({
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