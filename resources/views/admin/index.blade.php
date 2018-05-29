@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Admin Homepage
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/timeline1.css') }}">
<link href="{{ asset('assets/vendors/animate/animate.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/ionicons/css/ionicons.min.css') }}" />
<link href="{{ asset('assets/css/pages/icon.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')
    
    <!-- Container Section Start -->
    <div class="container" >
        <!--Content Section Start -->
        <div class="row">
            <div align="middle">
                <h1>
                    <strong>DOCUMENT GENERATION </strong> PLATFORM
                </h1>
                    <div class="panel-body" id="slim">
                        <div class='row'>    
                                    <div class="tab-pane" id="glyphicons">
                                        <ul class="bs-glyphicons ">
                                            <a href="{{ URL::to('admin/users') }}"> 
                                                <li class="btn-primary">
                                                    <h3><span class="glyphicon-class"><font color="white">Users</font></span></h3><i class="livicon" data-name="users" data-size="40" data-c="#fff" data-hc="#fff" data-loop="true"></i> 
                                                </li>
                                            </a>
                                            <a href="{{ URL::to('admin/viewCompany') }}"> 
                                                <li class="btn-success">
                                                    <h3><span class="glyphicon-class"><font color="white">Company</font></span></h3><i class="livicon" data-name="briefcase" data-size="40" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                                </li>
                                            </a>
                                            <a href="{{ URL::to('admin/library') }}"> 
                                                <li class="btn-warning">
                                                    <h3><font color="white">Library</font></h3><i class="livicon" data-name="inbox" data-size="40" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                                </li>
                                            </a>
                                            <a href="{{ URL::to('admin/Documentation') }}"> 
                                                <li class="btn-danger">
                                                    <h3><span class="glyphicon-class"><font color="white">Documentation</font></span></h3><i class="livicon" data-name="notebook" data-size="40" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                                </li>
                                            </a>
                                        </ul>
                                    </div>
                            </div>
                    </div>
<!-- to remove from here till line 57 to 325 -->
                <span class="button-wrap">
                    <a href="{{ URL::to('newRA') }}" class="button button-circle button-primary button-large"><strong>New RA</strong></a>
                </span>
            </div>
            <ul class="timeline">
                <!-- Item 1 -->
                <li>
                    <div class="direction-r wow slideInRight" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">Company</span>
                            <span class="time-wrapper"><span class="time">New</span></span>
                        </div>
                        <div class="desc">
                            <a href="{{ URL::to('admin/viewCompany') }}">                       
                                <button type="button" class="btn btn-labeled btn-success">
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="notebook" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">View Company</span>
                                </button>
                            </a>
                            <br />
                            <a href="{{ URL::to('admin/addNewCompany') }}">
                                <button type="button" class="btn btn-labeled btn-primary">
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">Add New Company</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Item 2 -->
                <li>
                    <div class="direction-l wow slideInLeft" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">Users</span>
                            <span class="time-wrapper"><span class="time">New</span></span>
                        </div>
                        <div class="desc">
                            <a href="{{ URL::to('admin/users') }}">
                                <button type="button" class="btn btn-labeled btn-success">
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff"
                                               data-hc="white"></i>
                                    </span>
                                    <span class="label-text">View Users</span>
                                </button>
                            </a>
                            <br />
                            <a href="{{ URL::to('admin/users/create') }}">
                                <button type="button" class="btn btn-labeled btn-primary">
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="user-add" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">Add New Users</span>   
                                </button>
                            </a>
                            <br />
                            <a href="{{ URL::to('admin/groups') }}">
                                <button type="button" class="btn btn-labeled btn-warning">
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="user-flag" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">User Acess Right Control</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Item 3 -->
                <li>
                    <div class="direction-r wow slideInRight" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">Master Library</span>
                            <span class="time-wrapper"><span class="time">New</span></span>
                        </div>
                        <div class="desc">
                            <h3>General Info</h3>
                            <button type="button" class="btn btn-labeled btn-default">
                                <a href="{{ URL::to('admin/industrys') }}"> 
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">Industry</span>
                                </a>
                            </button>
                            <br />
                            <button type="button" class="btn btn-labeled btn-default">
                                <a href="{{ URL::to('admin/possible_accident') }}"> 
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">Possible Accident</span>
                                </a>
                            </button>
                            <br />
                            <button type="button" class="btn btn-labeled btn-default">
                                <a href="{{ URL::to('admin/hazardlist') }}"> 
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">Hazard list</span>
                                </a>
                            </button>
                            <br />
                            <button type="button" class="btn btn-labeled btn-default">
                                <a href="{{ URL::to('admin/Existing_risk_control') }}"> 
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">Existing Risk Control</span>
                                </a>
                            </button>
                            <br />
                            <button type="button" class="btn btn-labeled btn-default">
                                <a href="{{ URL::to('admin/Additional_risk_control') }}"> 
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">Additional Risk Control</span>
                                </a>
                            </button>
                            <br />
                            <button type="button" class="btn btn-labeled btn-default">
                                <a href="{{ URL::to('admin/Workactivitylist') }}"> 
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">Work Activity List</span>
                                </a>
                            </button>
                            <br />
                            <button type="button" class="btn btn-labeled btn-default">
                                <a href="{{ URL::to('admin/Raprocesse') }}"> 
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text">RA Processes</span>
                                </a>
                            </button>

                            <h3>Risk Assessment</h3>
                            <a href="{{ URL::to('admin/Riskassessment') }}"> 
                                <button type="button" class="btn btn-labeled btn-success">
                                    <span class="btn-label pull-left">
                                        <i class="livicon" data-name="calender" data-size="24" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                    </span>
                                    <span class="label-text align-middle"><strong>Risk Register Summary</strong></span>
                                </button>
                            </a>
                            <br />
                            <button type="button" class="btn btn-labeled btn-default">
                                <span class="btn-label pull-left">
                                    <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                </span>
                                <span class="label-text">Standards</span>
                            </button>
                            <br />
                            <button type="button" class="btn btn-labeled btn-default">
                                <span class="btn-label pull-left">
                                    <i class="livicon" data-name="chevron-left" data-size="16" data-loop="true" data-c="#fff"
                                       data-hc="white"></i>
                                </span>
                                <span class="label-text">Others</span>
                            </button>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="direction-l wow slideInLeft" data-wow-duration="3.5s">
                        <div class="flag-wrapper">
                            <span class="hexa"></span>
                            <span class="flag">Documentation</span>
                            <span class="time-wrapper"><span class="time">New</span></span>
                        </div>
                        <div class="desc">

                            <h3>Bizsafe</h3>
                            <button type="button" class="btn btn-labeled btn-default btn-icon-right right_lable btn_padding">
                                <a href="{{ URL::to('addNewRADoc') }}">
                                    <span class="label-text label-right">Risk Assessment (RA)</span>
                                    <span class="btn-label pull-right cool_right">
                                        <i class="livicon" data-name="chevron-right" data-size="16" data-loop="true" data-c="#fff"
                                                       data-hc="white"></i>
                                    </span>
                                </a>
                            </button>
                            <button type="button" class="btn btn-labeled btn-default btn-icon-right right_lable btn_padding">
                                <a href="{{URL::to('admin/Inv_of_workact')}}">
                                    <span class="label-text label-right">Inventory of Work Activities</span>
                                    <span class="btn-label pull-right cool_right">
                                        <i class="livicon" data-name="chevron-right" data-size="16" data-loop="true" data-c="#fff"
                                                       data-hc="white"></i> 
                                    </span>
                                </a>
                            </button>
                            <button type="button" class="btn btn-labeled btn-default btn-icon-right right_lable btn_padding">
                                <a href="{{ URL::to('admin/RA_register') }}">
                                    <span class="label-text label-right">RA Register</span>
                                    <span class="btn-label pull-right cool_right">
                                        <i class="livicon" data-name="chevron-right" data-size="16" data-loop="true" data-c="#fff"
                                                       data-hc="white"></i>
                                    </span>
                                </a>
                            </button>
                            <button type="button" class="btn btn-labeled btn-default btn-icon-right right_lable btn_padding">
                                <a href="{{ URL::to('admin/RAIP') }}">
                                    <span class="label-text label-right">RA Implementation Plan</span>
                                    <span class="btn-label pull-right cool_right">
                                        <i class="livicon" data-name="chevron-right" data-size="16" data-loop="true" data-c="#fff"
                                                       data-hc="white"></i>
                                    </span>
                                </a>
                            </button>
                            <button type="button" class="btn btn-labeled btn-default btn-icon-right right_lable btn_padding">
                                <a href="{{ URL::to('pdfview2') }}">
                                <span class="label-text label-right">Safe Work Procedure (SWP)</span>
                                <span class="btn-label pull-right cool_right">
                                    <i class="livicon" data-name="chevron-right" data-size="16" data-loop="true" data-c="#fff"
                                                   data-hc="white"></i>
                                </span>
                                </a>
                            </button>
                            <button type="button" class="btn btn-labeled btn-default btn-icon-right right_lable btn_padding">
                                <span class="label-text label-right">SWP Register</span>
                                <span class="btn-label pull-right cool_right">
                                    <i class="livicon" data-name="chevron-right" data-size="16" data-loop="true" data-c="#fff"
                                                   data-hc="white"></i>
                                </span>
                            </button>
                            <button type="button" class="btn btn-labeled btn-default btn-icon-right right_lable btn_padding">
                                <a href="{{ URL::to('riskMgmtPlan') }}">
                                    <span class="label-text label-right">Risk Management Plan</span>
                                    <span class="btn-label pull-right cool_right">
                                        <i class="livicon" data-name="chevron-right" data-size="16" data-loop="true" data-c="#fff"
                                                       data-hc="white"></i>
                                    </span>
                                </a>
                            </button>


                        </div>
                    </div>
                </li>

            </ul>
<!-- to remove until here -->
        </div>
        <!-- //Content Section End -->
    </div>
    
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
            new WOW().init();
        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/vendors/Buttons/js/scrollto.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/Buttons/js/buttons.js') }}" ></script>
@stop