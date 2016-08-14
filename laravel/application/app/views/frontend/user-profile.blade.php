@include('frontend.includes.navbar')
    <!-- banner start -->
    <div class="row m0 bg-whitesmoke">
        <div class="container">
            <div class="col-lg-12 p0">
                <ol class="breadcrumb mb0 fs16">
                    <li><a href="{{URL::route ('getLanding')}}">Naslovna</a>
                    </li>
                    <li class="active">{{ $entry->username}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Image Header -->
    <div class="row m0">
        <div class="col-lg-12 p0">
            <div class="mh400" style="background-image: url(/img/frontend/ad-list-banner.jpg);">
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
                        @if ($entry->image != null || $entry->image != '')
                            <div class="form-group mb15">
                                <label class="col-md-12 p0" for="image">Trenutna slika:</label> 
                                <div class="col-md-12 p0 mb20">
                                    {{ HTML::image(URL::to('/') . '/uploads/frontend/users/thumbs/' . $entry->image, $entry->first_name) }}
                                </div>
                            </div>
                        @endif 
                    </div>
                    <div class="user-info pl10">
                        <h3>{{ $entry->first_name . ' ' .$entry->last_name}}</h3>
                    </div>
                    <div class="user-short-desc pl10">
                        <p>Kratki opis:</p>
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
                    <ul class="nav nav-tabs widget mt0">
                        <li class="active">
                            <a data-toogle="tab" href="#profile-tab">Profil </a>
                        </li>
                        <li>
                            <a data-toogle="tab" href="#ad-tab">Oglasi </a>
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
                        <div id="ad-tab" class="tab-pane">
                            <div class="p20">
                                @if (count($userads) > 0) 
                                @foreach($userads as $userad) 
                                <div class="row box">
                                    <div class="single-ad">
                                        <div class="col-lg-4 p0">
                                            <div class="ad-image">
                                                {{ HTML::image(URL::to('/') . '/uploads/frontend/ads/thumbs/' . $userad->image, $userad->title) }}
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mb20">
                                            <div class="ad-content">
                                                <div class="col-lg-10 p0">
                                                     <h3 class="ad-title"> <a href="{{ URL::route( 'ShowAd', array('permalink' => $userad->permalink ))}}">
                                                        {{ $userad->title }}
                                                    </a></h3>
                                                </div>
                                                <div class="col-lg-2 p0">
                                                    <a href="{{ URL::route( 'ShowAd', array('permalink' => $userad->permalink ))}}">
                                                        <i class="fa fa-eye fa-2x pull-right mt5"></i>
                                                    </a>
                                                </div>
                                                <p class="ad-description">{{ $userad->description }}</p>
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <p style="margin-top: 15px; margin-bottom: 0px;">Vrsta drveta:</p>
                                                        <h5 class="ad-category" style="margin: 0px;">{{$userad->woodname}}</h5> 
                                                     </div>
                                                    <div class="col-lg-6">
                                                        <p style="margin-top: 15px; margin-bottom: 0px;">Vrsta pakiranja:</p>
                                                        <h5 class="ad-category" style="margin: 0px;">{{$userad->packagingname}}</h5> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ad-footer">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="county">
                                                            <h5>{{ $userad->regionname }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="timestamp">
                                                            <h5>Objavljeno {{ date('d. m. Y.', strtotime( $userad->created_at )) }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="price">
                                                            <h5><span class="price-eur">{{ $userad->price }} kn</span></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="review-tab" class="tab-pane">
                            <div class="p20">
                                <div class="row box">
                                    {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                                        <div class="panel-body col-md-8">
                                            @if(!Auth::guest())
                                                {{ Form::hidden('user', isset(Auth::User()->id) ? Auth::User()->id : null, ['class' => 'form-control']) }}
                                                {{ Form::hidden('reviewed_user', $entry->id, ['class' => 'form-control']) }}
                                            <div class="col-md-12 mb15 p0">
                                                <label>Ocijenite oglašivača</label>
                                                    <select class="form-control" id="rating" name="rating">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option> 
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                            </div>
                                            <div class="col-md-12 mb15 p0">
                                                <label>Sadržaj recenzije</label> 
                                                    {{ Form::textarea('review_content', null, ['id' => 'review_content', 'placeholder' => 'Sadržaj recenzije', 'cols' => '107', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }}
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
                                            <div class="panel-body col-md-8"> 
                                                <div class="form-group">
                                                    <label>Korisnik</label>
                                                    {{ Form::text('user', isset($review->user) ? $review->user : null, ['class' => 'form-control', 'id' => 'user', 'placeholder' => 'Korisnik', 'readonly' => 'true', 'style' => 'min-width: 772px;']) }}
                                                </div>
                                                <div class="form-group">
                                                    <label>Sadržaj recenzije</label> 
                                                    {{ Form::textarea('review_content', isset($review->review_content) ? $review->review_content : null, ['id' => 'review_content', 'placeholder' => 'Sadržaj oglasa', 'cols' => '107', 'rows' => '8', 'style' => 'border: 1px solid #CCC; border-radius: 5px;', 'readonly' => 'true']) }}
                                                </div>
                                                <div class="col-md-12 mb15 p0">
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
                @if (count($featuredads['entry']) > 0) 
                @foreach($featuredads['entry'] as $featuredad)
                    <div class="col-md-3">
                        <a href="{{URL::route ('ShowAd', array('id' => $featuredad->permalink))}}">
                            {{ HTML::image(URL::to('/') . '/uploads/frontend/ads/thumbs/' . $featuredad->image, $featuredad->title) }}
                        </a>
                        <div class="panel mt10">
                            <div class="panel-body p0">
                                <a href="{{URL::route ('ShowAd', array('id' => $featuredad->permalink))}}">
                                    <p class="ad-title-homepage">{{ $featuredad->title }}</p>
                                </a>
                                <p class="ad-price-homepage">{{ $featuredad->price }} kn</p>
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