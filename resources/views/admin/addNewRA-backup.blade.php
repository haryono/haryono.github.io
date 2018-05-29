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
.blue {
    background-color:lightblue;
}
.green{
    background-color:lightgreen;
}
.pink{
    background-color:lightpink;
}
</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>ADD NEW RISK ASSESSMENT (RA)</h1>
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
        <li class="active">ADD NEW RISK ASSESSMENT (RA)</li>
    </ol>
</section>

<section class="content">    
    <!-- Container Section Start -->
    <div class="container">
        <!--Content Section Start -->
        <div class="row">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> ADD NEW RISK ASSESSMENT (RA)
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
                           <th colspan="3" style="text-align:center;">Company Name Pte Ltd</th>
                         </tr>
                         <tr>
                           <th rowspan="2">Risk Assessment Form</th>
                           <th>Form Identification:</th>
                           <td>New ID</td>
                         </tr>
                         <tr>
                           <th>Form Effective Date:</th>
                           <td>New Date</td>
                         </tr>
                       </table>

                       <br /> <br />
                       <table style="width:100%">
                         <tr>
                           <td>Company:</td>
                           <td>=Insert comp name=</td>
                           <td>RA Leader</td>
                           <td rowspan="3" colspan="2"> <b><u>Approved by:</u></b><br /> =Insert approver= <br /> Signature</td>
                           <td rowspan="6"><b><u>RA Reference Number:</u></b> <br /> =Reference No=</td>
                         </tr>
                         <tr>
                           <td>Process:</td>
                           <td>=Insert Process=</td>
                           <td>=Ra member1=</td>
                         </tr>
                         <tr>
                           <td>Location</td>
                           <td>=Insert Location=</td>
                           <td>=Ra member2=</td>
                         </tr>
                         <tr>
                           <td>Original Assessment Date:</td>
                           <td>=Insert assess date=</td>
                           <td>=Ra member3=</td>
                           <td>Name:</td>
                           <td>=Insert Name=</td>
                         </tr>
                         <tr>
                           <td>Last Review Date:</td>
                           <td>=Insert review date=</td>
                           <td>=Ra member4=</td>
                           <td>Designation:</td>
                           <td>=Insert Designation=</td>
                         </tr>
                         <tr>
                           <td>Next Review Date:</td>
                           <td>=Insert next date=</td>
                           <td>=Ra member5=</td>
                           <td>Date:</td>
                           <td>=Insert Date=</td>
                         </tr>
                       </table>
                       <br />
                       <table width="100%">
                           <tr>
                            <th colspan="4" class="blue" style="text-align:center;">Hazard identification</th>
                               <th colspan="4" class="green" style="text-align:center;">Risk Evaluation</th>
                               <th colspan="7" class="pink" style="text-align:center;">Risk Control</th>
                           </tr>
                           <!--dynamic addition row-->
                           <tr>
                            <td class="blue">Ref No</td>
                               <td class="blue">Work-Activity</td>
                               <td class="blue">Hazard</td>
                               <td class="blue">Possible Accident/ <br/>Injury&<br />Ill-health</td>
                               <td class="green">Existing Risk Controls</td>
                               <td class="green">S</td>
                               <td class="green">L</td>
                               <td class="green">RPN</td>
                               <td class="pink">Addition<br />Controls</td>
                               <td class="pink">S</td>
                               <td class="pink">L</td>
                               <td class="pink">RPN</td>
                               <td class="pink">Implementation<br />Person</td>
                               <td class="pink">Due Date</td>
                               <td class="pink">Remarks</td>
                           </tr>
                           <tr>
                            <td>Ref No</td>
                               <td>Work-Activity</td>
                               <td>Hazard</td>
                               <td>Possible Accident/ <br/>Injury&<br />Ill-health</td>
                               <td>Existing Risk Controls</td>
                               <td>S</td>
                               <td>L</td>
                               <td>RPN</td>
                               <td>Addition<br />Controls</td>
                               <td>S</td>
                               <td>L</td>
                               <td>RPN</td>
                               <td>Implementation<br />Person</td>
                               <td>Due Date</td>
                               <td>Remarks</td>
                           </tr>
                       </table>
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