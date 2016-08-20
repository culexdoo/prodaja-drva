@include('frontend.includes.navbar')
    <!-- banner start -->
    <div class="row m0 bg-whitesmoke">
        <div class="container">
            <div class="col-lg-12 p0">
                <ol class="breadcrumb mb0 fs16">
                    <li><a href="{{URL::route ('getLanding')}}">Naslovna</a>
                    </li>
                    <li class="active">Moj profil</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Image Header -->
    <div class="row m0">
        <div class="col-lg-12 p0">
            <div class="mh400" style="background-image: url('/img/frontend/classified-list-banner.jpg');">
                <div class="container text-center ">
                    <h1 class="text-white mt100 fs65"> Moj profil! </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->
    <!-- profile start -->
    <div class="row m0 mt80">
        <div class="container">
            <div class="col-lg-3">
                <div class="row">
                    <div class="profile-picture">
                        @if ($entry->image == null)
                            <div class="form-group mb15">
                            <label class="col-md-12 p0" for="image">Trenutna slika:</label>
                                <div class="col-md-12 p0 img-style m0"></div>
                            </div>
                        @elseif ($entry->image != null || $entry->image != '')
                            <div class="form-group mb15">
                                <label class="col-md-12 p0" for="image">Trenutna slika:</label> 
                                <div class="col-md-12 p0 mb20">
                                    {{ HTML::image(URL::to('/') . '/uploads/frontend/users/thumbs/' . $entry->image, $entry->first_name) }}
                                </div>
                            </div>
                        @endif 
                    </div>
                    <div class="user-info pl10">
                        <h3>{{ $entry->first_name . ' ' .$entry->last_name }}</h3>
                    </div>
                    <div class="user-short-desc pl10">
                        <p>{{ $entry->user_info }}</p>
                    </div>
                    <div class="user-status pl10">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td><span class="label label-success" style="position: relative; left:65px;">Aktivan</span></td>
                                </tr>
                                <tr>
                                    <td>Registriran od</td>
                                    <td style="position: relative; left:40px;">{{ date('d. m. Y.', strtotime( $entry->created_at )) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                </div>
                <div class="row">
                    <a href="{{ URL::route('EditMyProfile', array('id' => Auth::user()->id )) }}" class="btn btn-primary btn-lg cta mt0"> Uredi </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tabs widget" id="tabs">
                    <ul class="nav nav-tabs widget mt0">
                        <li class="active">
                            <a data-toogle="tab" href="#profile-tab">Profil </a>
                        </li>
                        <li>
                            <a data-toogle="tab" href="#classified-tab">Oglasi </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="profile-tab" class="tab-pane active">
                            <div class="p20">
                                <i class="fa fa-user fa-2x"></i>
                                <h3>Informacije o korisniku</h3>
                                <div class="row mt25">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Ime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->first_name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Prezime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->last_name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Korisničko ime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->username }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Email: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->email }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Grad: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $city->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Primarni kontakt: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->contact1 }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Regija: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $region->name }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Sekundarni kontakt: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->contact2 }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Datum rođenja: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->date_of_birth }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div id="classified-tab" class="tab-pane">
                            <div class="p20">
                            <!-- single classified listing start -->
                                @if (count($userclassifieds) > 0) 
                                @foreach($userclassifieds as $userclassified) 
                                <div class="row box">
                                    <div class="single-classified">
                                        <div class="col-lg-4 p0">
                                            <div class="classified-image">
                                                {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $userclassified->image, $userclassified->title) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mb20">
                                            <div class="classified-content">
                                                <div class="col-lg-10 p0">
                                                    <a href="{{ URL::route( 'ShowClassified', array('permalink' => $userclassified->permalink ))}}">
                                                        <h3 class="classified-title">{{ $userclassified->title }}</h3>
                                                    </a>
                                                    <p class="classified-description mt10" style="max-width: 420px;">{{ $userclassified->description }}</p>
                                                </div>
                                                <div class="col-lg-2 p0 mt5">
                                                    <a href="{{ URL::route( 'EditClassified', array('permalink' => $userclassified->permalink ))}}">
                                                        <h4 class="mt5" style="position: absolute; top: 20px;">Uredi</h4>
                                                    </a>
                                                    <a href="{{ URL::route( 'EditClassified', array('permalink' => $userclassified->permalink ))}}">
                                                        <h4 class="mt5" style="position: absolute; top: 45px;">Deaktiviraj</h4>
                                                    </a>
                                                    @if($userclassified->published == 1)
                                                    <span class="label label-success">Odobren</span>
                                                    @else
                                                    <span class="label label-danger">Nije odobren</span>
                                                    @endif
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <p style="margin-top: 15px; margin-bottom: 0px;">Vrsta drveta:</p>
                                                        <h5 class="classified-category" style="margin: 0px;">{{$userclassified->woodname}}</h5> 
                                                     </div>
                                                    <div class="col-lg-6">
                                                        <p style="margin-top: 15px; margin-bottom: 0px;">Vrsta pakiranja:</p>
                                                        <h5 class="classified-category" style="margin: 0px;">{{$userclassified->packagingname}}</h5> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="classified-footer">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="county">
                                                            <h5>{{ $userclassified->regionname }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="timestamp">
                                                            <h5>Objavljeno {{ date('d. m. Y.', strtotime( $userclassified->created_at )) }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="price">
                                                            <h5><span class="price-eur">{{ $userclassified->price }} kn</span></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <!-- single classified listing end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- profile end -->
        <!-- Izdvojeni oglasi start -->
    <div class="row m0 mt120">
        <div class="container">
            <div class="col-lg-12">
                <h2 class="page-header text-center fs40">Izdvojeni oglasi</h2>
                <div class="text-center h2-separator"></div>
                <div class="text-center mb35 fs18">
                    Novi ste korisnik stranice? Pogledajte naše izdvojene oglase birane od strane starih korisnika.
                </div>
            </div>
            @if (count($featuredclassifieds['entry']) > 0) 
                @foreach($featuredclassifieds['entry'] as $featuredclassified)
                    <div class="col-md-3">
                        <a href="{{URL::route ('ShowClassified', array('id' => $featuredclassified->permalink))}}">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $featuredclassified->image, $featuredclassified->title) }}
                        </a>
                        <div class="panel mt10">
                            <div class="panel-body p0">
                                <a href="{{URL::route ('ShowClassified', array('id' => $featuredclassified->permalink))}}">
                                    <p class="classified-title-homepage">{{ $featuredclassified->title }}</p>
                                </a>
                                <p class="classified-price-homepage">{{ $featuredclassified->price }} kn</p>
                            </div>
                        </div>
                    </div> 
                @endforeach
            @endif
        </div>
    </div>
    <!-- Izdvojeni oglasi end -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
        $('#tabs a[href^="#"]').click(function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
        </script>

@include('frontend.includes.footer')