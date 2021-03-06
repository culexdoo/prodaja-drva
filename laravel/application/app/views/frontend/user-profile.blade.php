@include('frontend.includes.navbar')
    <!-- Image Header -->
    <div class="row m0">
        <div class="col-lg-12 p0">
            <div class="mh400" style="background-image: url(/img/frontend/classified-list-banner.jpg);">
                <div class="container text-center ">
                    <h1 class="text-white mt100 fs65"> Profil korisnika {{ $entry->username}} </h1>
                    <h2 class="text-white fs33"> Pogledajte ostale oglase korisnika {{ $entry->username}}! </h2>
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
                            <label class="col-lg-12 p0" for="image">Trenutna slika:</label>
                                <div class="col-lg-12 p0 img-style m0"></div>
                            </div>
                        @elseif ($entry->image != null || $entry->image != '')
                            <div class="form-group mb15">
                                <label class="col-lg-12 p0 mb20" for="image">Trenutna slika:</label> 
                                <div class="col-lg-12 p0 mb20">
                                    {{ HTML::image(URL::to('/') . '/uploads/frontend/users/thumbs/' . $entry->image, $entry->first_name) }}
                                </div>
                            </div>
                        @endif 
                    </div>
                    <div class="user-info pl10">
                        <h3>{{ $entry->first_name . ' ' .$entry->last_name}}</h3>
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
            </div>
            <div class="col-lg-9">
                <div class="tabs widget" id="tabs">
                    <ul class="nav nav-tabs widget mt0 b0">
                        <li class="active">
                            <a data-toogle="tab" href="#profile-tab">Profil </a>
                        </li>
                        <li>
                            <a data-toogle="tab" href="#classified-tab">Oglasi </a>
                        </li>
                        <li>
                            <a data-toogle="tab" href="#review-tab">Recenzije </a>
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
                                                <label class="fw-normal">{{ $entry->first_name}} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Prezime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->last_name}} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Korisničko ime: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->username}} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Email: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->email}} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Grad: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $city->name}} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Primarni kontakt: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->contact1}} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Regija: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $region->name}} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Sekundarni kontakt: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->contact2}} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <label class="control-label">Datum rođenja: </label>
                                            </div>
                                            <div class="col-lg-7">
                                                <label class="fw-normal">{{ $entry->date_of_birth}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="classified-tab" class="tab-pane p0">
                            <div class="p20">
                                @if (count($userclassifieds) > 0) 
                                @foreach($userclassifieds as $userclassified) 
                                <div class="row box" style="border-radius: 5px 0 0 5px;">
                                    <div class="single-classified">
                                        <div class="col-lg-4 col-xs-4 p0">
                                            <a href="{{ URL::route('ShowClassified', array('permalink' => $userclassified->permalink)) }}">
                                                <div class="classified-image">
                                                    {{ HTML::image(URL::to('/') . '/uploads/frontend/classifieds/thumbs/' . $userclassified->image, $userclassified->title, array('style' => 'border-radius: 5px 0px 0px 5px')) }}
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-8 col-xs-8">
                                            <div class="classified-content">
                                                <div class="col-lg-12 p0 mb15">
                                                    <a href="{{ URL::route('ShowClassified', array('permalink' => $userclassified->permalink)) }}">
                                                        <h3 class="classified-title">{{ ucfirst($userclassified->title) }}</h3>
                                                    </a>
                                                </div>
                                                <div class="classified-description">
                                                    <span>{{ ucfirst($userclassified->description) }}</span>
                                                </div>
                                                <div class="spacer"></div>
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                            <p class="classified-category" style="margin: 0px;">Vrsta drveta: <a href="{{ URL::route('ListClassifiedsByWoodCategory', array('woodcategory' => $userclassified->woodpermalink)) }}">{{$userclassified->woodname}}</a></p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <p class="classified-category" style="margin: 0px;">Vrsta pakiranja: <a href="{{ URL::route('ListClassifiedsByPackagingCategory', array('packagingcategory' => $userclassified->packagingpermalink)) }}">{{$userclassified->packagingname}}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="classified-footer">
                                                <div class="row">
                                                    <div class="col-lg-5 col-xs-6">
                                                        <div class="spacer"></div>
                                                        <div class="county">
                                                                <p class="mt2"><i class="fa fa-map-marker"></i> <a href="{{ URL::route('ListClassifiedsByRegion', array('region' => $userclassified->regionpermalink)) }}">{{$userclassified->regionname}}</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="spacer"></div>
                                                        <div class="timestamp">
                                                            <p class="mt2"><i class="fa fa-clock-o"></i> Objavljeno: {{ date('d. m. Y.', strtotime( $userclassified->created_at )) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-xs-6">
                                                        <div class="price mt8">
                                                        <p class="mt2">{{$userclassified->price}} kn</p>
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
                        <div id="review-tab" class="tab-pane">
                            <div class="p20">
                                <div class="row">
                                    {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                                        <div class="panel-body col-lg-10">
                                            @if(!Auth::guest())
                                                {{ Form::hidden('user', isset(Auth::User()->id) ? Auth::User()->id : null, ['class' => 'form-control']) }}
                                                {{ Form::hidden('reviewed_user', $entry->id, ['class' => 'form-control']) }}
                                            <div class="col-lg-12 mb15 p0">
                                                <label>Ocijenite oglašivača</label>
                                                    <select class="form-control" id="rating" name="rating">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option> 
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                            </div>
                                            <div class="col-lg-12 mb15 p0">
                                                <label>Sadržaj recenzije</label> 
                                            </div>
                                            <div class="col-lg-12 p0">
                                                    {{ Form::textarea('review_content', null, ['id' => 'review_content', 'placeholder' => 'Sadržaj recenzije', 'cols' => '89', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }}
                                            </div>
                                            {{ Form::button(Lang::get('core.save'), array('type' => 'submit', 'class' => 'btn btn-primary btn-lg cta')) }}
                                            @endif
                                            @if(Auth::guest())
                                                <p>Recenzije mogu ostavljati samo registrirani korisnici!</p>
                                                <a href= "{{URL::Route('getSignIn')}}"> Prijava</a>
                                            @endif
                                        </div>
                                    {{Form::close()}}
                                    <section class="panel">
                                        @if (count($reviews) > 0)
                                        @foreach($reviews as $review)
                                            <div class="panel-body col-lg-10"> 
                                                <div class="form-group mb15">
                                                    <label class="mb15">Korisnik</label>
                                                    {{ Form::text('username', isset($review->username) ? $review->username : null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Korisnik', 'readonly' => 'true']) }}
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb15">Sadržaj recenzije</label> 
                                                    {{ Form::textarea('review_content', isset($review->review_content) ? $review->review_content : null, ['id' => 'review_content', 'placeholder' => 'Sadržaj oglasa', 'cols' => '89', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;', 'readonly' => 'true']) }}
                                                </div>
                                                <div class="col-lg-12 mb15 p0">
                                                <label class="pat8">Ocjena:</label>
                                                 @if( $review->rating == '1')
                                                    <span class="ratingstar">☆</span>
                                                    @elseif( $review->rating == '2')
                                                    <span class="ratingstar">☆</span><span class="ratingstar">☆</span>
                                                    @elseif( $review->rating == '3')
                                                    <span class="ratingstar">☆</span><span class="ratingstar">☆</span><span class="ratingstar">☆</span>
                                                    @elseif( $review->rating == '4')
                                                    <span class="ratingstar">☆</span><span class="ratingstar">☆</span><span class="ratingstar">☆</span><span class="ratingstar">☆</span>
                                                    @else( $review->rating = '5')
                                                    <span class="ratingstar">☆</span><span class="ratingstar">☆</span><span class="ratingstar">☆</span><span class="ratingstar">☆</span><span class="ratingstar">☆</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                        @endif
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        <!-- profile end -->
        <!-- Izdvojeni oglasi start -->
        <div class="row m0">
            <div class="container">
                <div class="col-lg-12">
                    <h2 class="page-header text-center fs35">Izdvojeni oglasi</h2>
                    <div class="text-center h2-separator"></div>
                    <div class="text-center mb35 fs18">
                        Novi ste korisnik stranice? Pogledajte naše izdvojene oglase birane od strane starih korisnika.
                    </div>
                </div>
                @if (count($featuredclassifieds['entry']) > 0) 
                @foreach($featuredclassifieds['entry'] as $featuredclassified)
                    <div class="col-lg-3">
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
        <!-- Featured list button start -->
        

<script type="text/javascript">
        $('#tabs a[href^="#"]').click(function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
        </script>

@include('frontend.includes.footer')