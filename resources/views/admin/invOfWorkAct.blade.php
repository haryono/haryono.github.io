@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Inventory of Work Activities
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
    <h1>RA002-DOC-Inventory of Work Activities Form</h1>
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
        <li class="active">RA002-DOC-Inventory of Work Activities Form</li>
    </ol>
</section>

<section class="content paddingleft_right15">    
    <!-- Container Section Start -->
    <!--Content Section Start -->
    <div class="row">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RA002-DOC-Inventory of Work Activities Form
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
                        <th colspan="3" style="text-align:center;">{{$comp->company_name}} [{{$inv->project_name}}]</th>
                    </tr>
                    <tr>
                        <th rowspan="2"  style="text-align:center;">Inventory of Work Activities Form</th>
                        <th>Form Identification:</th>
                        <td>{{$inv->id}}-OHS-01-(F02)-00</td>
                    </tr>
                    <tr>
                        <th>Form Effective Date:</th>
                        <td>{{$inv->created_at}}</td>
                    </tr>
                    </table>

                    <br /> <br />
                    <table style="width:100%">
                    <tr>
                        <th colspan="3">Company Assessed:{{$comp->company_name}}</th>
                        <th>Date:</th>
                        <th>{{$inv->created_at}}</th>
                    </tr>
                    <tr>
                        <th colspan="2" >RA Ref #</th>
                        <th>Process</th>
                        <th>Location</th>
                        <th>Work Activity</th>
                    </tr>
                    <!--Dynamic row insertion-->
      
                    @foreach($inv->work_risk()->get() as $in)
                    <tr>

                        <td colspan="2" class="countno">{{$in->riskassessment()->first(array('ref_no'))['ref_no']}}</td>
                        <td class="countno">{{$in->riskassessment()->first(array('riskprocess'))['riskprocess']}}</td>
                        <td class="countno">{{$in->riskassessment()->first(array('risklocation'))['risklocation']}}</td>
                        <?php 
                            //call work activity based on the id
                            $x=$in->riskassessment()->first(array('id'))['id'];
                            $work=$was->where('riskassessment_id',$x)->all();
                            $count=1;
                        ?>
                        <td>
                            <ul class="list-group">
                            @foreach($work as $wa)
                              <li class="list-group-item">{{$wa->work_activity_name}}</li>
                            @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    </table>
                    <br />

                    <b><u>Note:</u></b>
                    <ol>
                        <li>This form is to be completed <b><u>BEFORE</u></b> filling the Risk Assessment Form.</li> <br/>
                        <li>The content of the Work Activity column in the inventory of Work Activities Form is to be copied over to the Work Activity column in the Risk Assessment Form.</li>
                    </ol>
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
                            <a href="{{action('RAController@downloadPDF')}}" style="color:#333;">
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
@stop