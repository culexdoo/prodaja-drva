@include('frontend.includes.navbar')
    <!-- Page Content -->
    <div class="row m0">
        <div class="container">
            <div class="col-lg-12 p0">
                <h1 class="page-header">Kontakt 
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Content Row -->
        <div class="container p0">
            <!-- Map Column -->
            <div class="col-md-8 ">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3 class="mt0">Kontakt informacije</h3>
                <p>
                    Ulica i broj
                    <br>Mjesto, postanski broj
                    <br>
                </p>
                <p><i class="fa fa-phone"></i>
                    <abbr title="Phone">Telefon</abbr>: (123) 456-7890</p>
                <p><i class="fa fa-envelope-o"></i>
                    <abbr title="Email">Email</abbr>: <a href="mailto:name@example.com">primjer.mail@gmail.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i>
                    <abbr title="Hours">Radno vrijeme</abbr>: Ponedjeljak - Petak: 9:00 do 17:00</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="https://www.facebook.com"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com"><i class="fa fa-linkedin-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com"><i class="fa fa-twitter-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="https://www.plus.google.com"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->
        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="container mb15">
            <div class="col-md-8 p0">
                <h3>Javite nam se</h3>
                {{ Form::open(array('route' => $postRoute, 'role' => 'form', 'class' => 'form-horizontal', 'autocomplete' => 'off', 'files' => true)) }}
                    <div class="control-group form-group plr15">
                        <div class="controls">
                            <label>Vaše ime:</label>
                            {{ Form::text('first_name', isset($entry->first_name) ? $entry->first_name : null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Unesite vaše ime']) }}
                        </div>
                    </div>
                    <div class="control-group form-group plr15">
                        <div class="controls">
                            <label>Vaše prezime:</label>
                            {{ Form::text('last_name', isset($entry->last_name) ? $entry->last_name : null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Unesite vaše prezime']) }}
                        </div>
                    </div>
                    <div class="control-group form-group plr15">
                        <div class="controls">
                            <label>Kontakt broj:</label>
                            {{ Form::text('contact', isset($entry->contact) ? $entry->contact : null, ['class' => 'form-control', 'id' => 'contact', 'placeholder' => 'Unesite kontakt broj']) }}
                        </div>
                    </div>
                    <div class="control-group form-group plr15">
                        <div class="controls">
                            <label>Email:</label>
                            {{ Form::text('email', isset($entry->email) ? $entry->email : null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Unesite vašu email adresu']) }}
                        </div>
                    </div>
                    <div class="control-group form-group pl15">
                        <div class="controls">
                            <label>Poruka:</label>
                            {{ Form::textarea('content', isset($entry->content) ? $entry->content : null, ['id' => 'content', 'placeholder' => 'Sadržaj upita', 'cols' => '65', 'rows' => '10', 'style' => 'border: 1px solid #CCC; border-radius: 5px;']) }}
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-lg btn-primary mt15 cta ml0">Pošalji</button>
                {{Form::close()}}
            </div>
        </div>
@include('frontend.includes.footer')