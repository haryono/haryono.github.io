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
<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
th, td {
padding: 5px;
text-align: left;
}
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>RA004 RA Implementation Plan(RAIP)</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Home
            </a>
        </li>
        <li>
            <a href="#">Documentation</a>
        </li>
        <li class="active">RA004 RA Implementation Plan(RAIP)</li>
    </ol>
</section>

<section class="content">    
    <!-- Container Section Start -->
    <div class="row">
        <!--Content Section Start -->
        <div class="row">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RA004 RA Implementation Plan(RAIP)
                    </h3>
                    <span class="pull-right">
                         <i class="glyphicon glyphicon-chevron-up clickable"></i>
                         <i class="glyphicon glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <b>Company Logo</b><br />
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Company logo" > <br /><br />
                        Company Name: {{$comp->company_name}}<br /><br />

                        <h4>RA IMPLEMENTATION PLAN[RAIP]</h4>

                        <table style="width:100%">
                            <tr>
                                <td rowspan="2" valign="top">Form effective</td>
                                <td>{{Form::date('effectivedate',$bizsafe['effectivedate'])}}</td>
                            </tr>
                        </table>

                        <br /> <br />
                        <table style="width:100%">
                            <tr>
                                <th>RA Ref #</th>
                                <th>Work Activity</th>
                                <th>Additional Control Measure</th>
                                <th>Implementation Person</th>
                                <th>End Date</th>
                                <th>Remarks</th>
                            </tr>
                            <!--Dynamic row addition-->
                            @foreach($inv->ra_plan()->get() as $in)
                            <tr>
                                <td>{{$in->id}}</td>
                                <!--Dynamic row addition-->
                                <?php 
                                    //call work activity based on the id
                                    $x=$in->riskassessment()->first(array('id'))['id'];
                                    $work=$was->where('riskassessment_id',$x)->all();
                                    $waArray = array();
                                ?>
                                <td>
                                    {{$in->riskassessment()->first(array('riskprocess'))['riskprocess']}}
                                </td>
                                <td>As in RA</td>
                                <td></td>
                                <td>=Insert ED=</td>
                                <td>=Insert Remarks=</td>
                            </tr>
                            @endforeach
                        </table>
                        <br />

                        <p>RA LEADER: {{Form::select('rl',$rl)}}</p>
                        <p>Approving Manager: {{Form::select('Ra',$am)}}</p>
                        <p>Date: {{Form::date('signdate', Carbon\Carbon::now())}}</p>
                        <button class="button">Generate Now (Submit for Approval)</button>
                        <button class="button">Save as Draft</button>

                        <p><font color="red">(To generate "RA004-DOC-RA Implementation" form)</font></p>
                    </div>
                </div>
            </div>

        </div>
        <!-- //Content Section End -->
    </div>
</section>
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