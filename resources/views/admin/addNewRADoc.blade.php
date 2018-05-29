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
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/selectize/css/selectize.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/bootstrap-switch/css/bootstrap-switch.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/switchery/css/switchery.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
.blue {
    background-color:lightblue;
}
.green{
    background-color:lightgreen;
}
.pink{
    background-color:lightpink;
}

@media print
{
    .btn-section, #back-to-top, .left-side, .content-header, .header {display:none;}
    #invoice-stmt{width:100%;}
    .right-side{margin-left:0;}

}
.btn_marTop{
    margin-top:10px;
}
@media (max-width:320px) {
       .colors_right{
        float:none !important;
    }
    .colors{
        margin-top:10px;
        margin-left:0px !important;
    }

}
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>RA001-doc-addnewriskassessment</h1>
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
        <li class="active">RA001-doc-addnewriskassessment</li>
    </ol>
</section>

<section class="content paddingleft_right15">    
    <!-- Container Section Start -->
    
        <!--Content Section Start -->
        <div class="row ">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RA001-doc-addnewriskassessment
                    </h3>
                    <span class="pull-right">
                         <i class="glyphicon glyphicon-chevron-up clickable"></i>
                         <i class="glyphicon glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <table style="width:100%">
                          <tr>
                            <th colspan="3" style="text-align:center;">{{$cp->company_name}}</th>
                          </tr>
                          <tr>
                            <th rowspan="2">Risk Assessment Form</th>
                            <th>Form Identification:</th>
                            <td>{{$ra->id}}</td>
                          </tr>
                          <tr>
                            <th>Form Effective Date:</th>
                            <td>{{$ra->form_effective_date}}</td>
                          </tr>
                        </table>

                        <br /> <br />
                        <table style="width:100%">
                          <tr>
                            <th>Company:</th>
                            <td>{{$cp->company_name}}</td>
                            <td><strong>RA Leader:</strong> {{$raleader->rep_name}}</td>
                            <td rowspan="3" colspan="2" valign="top"> <strong><u>Approved by:</u></strong><br /> {{$job->manager_signature}} </td>
                            <td rowspan="6" valign="top"><strong><u>RA Reference Number:</u></strong> <br /> {{$ra->ref_no}}</td>
                          </tr>
                          <tr>
                            <th>Process:</th>
                            <td>{{$ra->riskprocess}}</td>
                            <td><strong>RA Member1:</strong> {{$rms[0]->name}}</td>
                          </tr>
                          <tr>
                            <th>Location:</th>
                            <td>{{$ra->risklocation}}</td>
                            <td><strong>RA Member2:</strong> {{$rms[1]->name}}</td>
                          </tr>
                          <tr>
                            <th>Original Assessment Date:</th>
                            <td>{{$ra->created_at}}</td>
                            <td><strong>RA Member3:</strong> {{$rms[2]->name}}</</td>
                            <th>Name:</th>
                            <td>{{$ra->approvingmanager}}</td>
                          </tr>
                          <tr>
                            <th>Last Review Date:</th>
                            <td>{{$ra->updated_at}}</td>
                            <td><strong>RA Member4:</strong> {{$rms[3]->name}}</</td>
                            <th>Designation:</th>
                            <td>{{$job->manager_designation}}</td>
                          </tr>
                          <tr>
                            <th>Next Review Date:</th>
                            <td>{{$ra->expirydate}}</td>
                            <td><strong>RA Member5:</strong> {{$rms[4]->name}}</</td>
                            <th>Date:</th>
                            <td>{{$ra->updated_at}}</td>
                          </tr>
                        </table>
                        <br />
                        <!-- metric and legend -->
                        <img src="{{ asset('assets/images/ra/riskmetric.png') }}" height="180" width="400" alt="Risk Metric">
                        <img src="{{ asset('assets/images/ra/risklegend.png') }}" alt="Risk Legend">
                        <br /><br />                        
                        <p style="page-break-after: always;">&nbsp;</p> <!--To page break for print-->
                        <p style="page-break-before: always;">&nbsp;</p> <!--To page break for print-->
                        <table style="width:100%">
                        <tr>
                            <th colspan="4" class="blue" style="text-align:center;">Hazard identification</th>
                            <th colspan="4" class="green" style="text-align:center;">Risk Evaluation</th>
                            <th colspan="7" class="pink" style="text-align:center;">Risk Control</th>
                        </tr>
                        <tr id="dynamicrow">
                            <th class="blue">Ref No</th>
                            <th class="blue">Work-Activity</th>
                            <th class="blue">Hazard</th>
                            <th class="blue">Possible Accident/ <br/>Injury&<br />Ill-health</th>
                            <th class="green">Existing Risk Controls</th>
                            <th class="green">S</th>
                            <th class="green">L</th>
                            <th class="green">RPN</th>
                            <th class="pink">Addition<br />Controls</th>
                            <th class="pink">S</th>
                            <th class="pink">L</th>
                            <th class="pink">RPN</th>
                            <th class="pink">Implementation<br />Person</th>
                            <th class="pink">Due Date</th>
                            <th class="pink">Remarks</th>
                        </tr>
                        <!--dynamic addition row-->
                        @foreach ($ras as $raeach)
                        <tr>
                            <td>{{$raeach->ref_no}}</td>
                            <td>{{$raeach->workactivity()->first(array('work_activity_name'))['work_activity_name']}}</td>
                            <td>{{$haz->hazard}}</td>
                            <td>{{$haz->possible_accident}}</td>
                            <td>{{$haz->additional_risk_control}}</td>
                            <td>{{$haz->severity}}</td>
                            <td>{{$haz->likelihood}}</td>
                            <?php $rpn = (int)$haz->severity * (int)$haz->likelihood; ?> <!--multiply severity, hood-->
                            <td>{{$rpn}}</td>
                            <td>{{$haz->additional_risk_control}}</td>
                            <td>{{$haz->severity2}}</td>
                            <td>{{$haz->likelihood2}}</td>
                            <?php $rpn2= (int)$haz->severity2 * (int)$haz->likelihood2; ?><!--multiply severity, hood-->
                            <td>{{$rpn2}}</td>
                            <td>{{$haz->actionofficer}}</td>
                            <td>{{$haz->duedate}}</td>
                            <td>{{$haz->remarks}}</td>
                        </tr>
                        @endforeach 
                        </table>
                        <div style="margin:10px 20px;text-align:center;" class="btn-section">
                            <button type="button" class="btn btn-responsive btn_marTop button-alignment btn-info"
                                    data-toggle="button">
                                <a style="color:#fff;" onclick="javascript:window.print();">
                                    <i class="livicon" data-name="printer" data-size="16" data-loop="true"
                                       data-c="#fff" data-hc="white" style="position:relative;top:3px;"></i>
                                    Print
                                </a>
                            </button>
                            <button type="button" class="btn btn-responsive btn_marTop button-alignment btn-default"
                                   >
                                <a href="{{action('RAController@downloadWorkAct')}}" style="color:#333;">
                                    <i class="livicon" data-name="check" data-size="16" data-loop="true"
                                       data-c="#111" data-hc="#111" style="position:relative;top:3px;"></i>
                                    Download PDF
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Content Section End -->
    
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
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}" ></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/sifter/sifter.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/microplugin/microplugin.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}" ></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/card/lib/js/jquery.card.js') }}"></script>
    <script type="text/javascript" src="{{  asset('assets/vendors/selectize/js/standalone/selectize.min.js') }}"></script>
    <!-- selectize option-->
    <script> 
        $("#selectize3").selectize({
            maxItems: 10
        });
    </script>
@stop