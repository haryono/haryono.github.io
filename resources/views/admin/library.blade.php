@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Library
@parent
@stop

{{-- page level styles --}}
@section('header_styles')    
    
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Manage Library</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">UI Features</a>
                    </li>
                    <li class="active">Manage Library</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="trophy" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Bizsafe Library
                    </h3>
                    <span class="pull-right">
                             <i class="glyphicon glyphicon-chevron-up clickable"></i>
                             <i class="glyphicon glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                </div>
                <div class="panel-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="hand-right" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                Risk Assessment
                            </h3>
                        </div>
                        <!-- HY : Link to the respective library-->
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ URL::to('admin/industrys') }}"> &nbsp; Industry</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ URL::to('admin/Raprocesse') }}">&nbsp; RA Process</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ URL::to('admin/Workactivitylist') }}"> &nbsp; Work Activity</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ URL::to('admin/hazardlist') }}"> &nbsp; Hazard</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ URL::to('admin/possible_accident') }}"> &nbsp; Possible Accidents &#38; Injury</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ URL::to('admin/Existing_risk_control') }}">&nbsp; Existing Risk Control</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ URL::to('admin/Additional_risk_control') }}"> &nbsp; Additional Risk Control</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="trophy" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Standards Library
                    </h3>
                    <span class="pull-right">
                             <i class="glyphicon glyphicon-chevron-up clickable"></i>
                             <i class="glyphicon glyphicon glyphicon-remove removepanel clickable"></i>
                        </span>
                </div>
                <div class="panel-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="hand-right" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                In Progress
                            </h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ URL::to('') }}"> &nbsp; Doc 1</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ URL::to('') }}">&nbsp; Doc 2</a>
                                </li>
                             
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('assets/js/pages/custom_buttons.js') }}"></script>
    <!--icon picker-->
@stop
