@include('frontend.includes.navbar')
    <div class="row m0 bg-whitesmoke">
        <div class="container">
            <div class="col-lg-12 p0">
                <ol class="breadcrumb mb0 fs16">
                    <li><a href="{{URL::route ('getLanding')}}">Naslovna</a>
                    </li>
                    <li class="active">O nama</li>
                </ol>
            </div>
        </div>
    </div>
        <!-- Page Heading/Breadcrumbs -->
        
        <!-- /.row -->
        <!-- Intro Content -->
        <div class="row m0">
            <div class="col-lg-12 p0">
                <img class="img-responsive" src="/img/frontend/ad-list-banner.jpg" alt="">
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">O nama</h1>
            </div>
            <div class="col-lg-9">
            <p style="font-size: 16px;">Lorem ipsum dolor sit amet, quo convenire torquatos an. Mei luptatum appellantur et, te suscipit gubergren pro. Te ridens bonorum forensibus cum. Dissentias deterruisset at qui, commodo lobortis qui ne.<br><br>

            Ei purto movet est, sea cu dictas pericula. Decore dignissim at nec, primis mucius vivendo ei sea. Ne omnium accusam expetenda vim, error labore nostrud in mea, minim mucius an vim. Nonumes signiferumque cu ius, cu suas novum referrentur mel. An quis velit iudicabit eam.<br>

            Usu quodsi voluptaria mnesarchum ut. Id legere maiestatis ius, ne cetero ceteros ius. Ei duis tritani quaestio eum, democritum adipiscing vim id. Pri nihil definiebas appellantur ex, ut aperiam recusabo forensibus vim, cu his regione consulatu.<br><br>

            Mundi praesent ne eum. Oratio facilisis sea in. Et quo ullum lucilius, pro et atqui perpetua. Altera omnesque legendos mei ad. Eam ne posse posidonium, ex latine democritum ius. Id ullum voluptaria consequuntur sea, eu cum utamur splendide.<br><br>

            Mea alia utinam ea, facilisis corrumpit eu mel, te sea amet vitae oportere. Ius te malis disputationi, nusquam percipit delicata eos no. Usu in tamquam moderatius. Ullum liber graece sea te, vel ubique admodum an, ad velit audiam pericula eam. Mea ad audire invidunt sapientem.
            </p>
            </div>
            <div class="col-lg-3">
                <!--- single widget start -->
                <div class="panel panel-default m0">
                    <div class="panel-heading">
                        <h4 class="panel-title"> PRETRAGA PO KRITERIJIMA:</h4>
                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('route' => $postRoute, 'method' => 'get', 'role' => 'form', 'autocomplete' => 'on', 'files' => true))}}
                        <div class="row"> 
                            <div class="form-group  col-xs-12">
                                {{ Form::select('packaging', ['' => 'Vrsta pakiranja'] + $packaginglist, isset($packaging) ? $packaging : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                            </div>
                            <div class="form-group  col-xs-12">
                                {{ Form::select('wood', ['' => 'Vrsta drveta'] + $woodlist, isset($wood) ? $wood : null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}
                            </div>
                            <div class="form-group  col-xs-12">
                                {{ Form::select('region',  ['' => 'Županije'] + $regionslist, null, array('class' => 'form-control selectpicker', 'style' => 'width:100%', 'id' => 'id')) }}                   
                            </div> 
                        </div>
                        <div class="button-group">
                            <div class="action-buttons">
                               <button type="submit" style="margin-top: 10px; " class="btn btn-lg cta btn-search">Pretraži</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!--- single widget end -->
            </div>
        </div>
@include('frontend.includes.footer')