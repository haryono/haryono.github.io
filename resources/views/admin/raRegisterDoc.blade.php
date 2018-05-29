@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Expertra
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
    <h1>RA003-DOC-RA Register</h1>
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
        <li class="active">RA003-DOC-RA Register</li>
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
                        <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RA003-DOC-RA Register
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
                                <th colspan="3" style="text-align:center;">{{$comp->company_name}}</th>
                            </tr>
                            <tr>
                                <th rowspan="2" valign="top">Risk Assessment Register</th>
                                <th>Form Identification:</th>
                                <td>{{$inv->id}}</td>
                            </tr>
                            <tr>
                                <th>Form Effective Date:</th>
                                <td>{{$bizsafe['effectivedate']}}</td>
                            </tr>
                        </table>

                        <br /> <br />
                        <table style="width:100%">
                            <tr>
                                <th>S/N</th>
                                <th>RA Ref #</th>
                                <th>Description of RA</th>
                                <th>Original Assessment Date</th>
                                <th>Last Review Date</th>
                                <th>Next Review Date</th>
                                <th>Status of Work</th>
                                <th>Remarks</th>
                            </tr>
                            <!--Dynamic row addition-->
                            <?php 
                                $count=1;
                            ?>
                            <!--Dynamic row addition-->
                            @foreach($inv->ra_risk()->get() as $in)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$in->id}}</td>
                                <td>{{$in->riskassessment()->first(array('riskprocess'))['riskprocess']}}</td>
                                <td>{{date('d/m/Y',strtotime($in->riskassessment()->first(array('created_at'))['created_at']))}}</td>
                                <td>{{date('d/m/Y',strtotime($in->riskassessment()->first(array('updated_at'))['updated_at']))}}</td>
                                <td>{{date('d/m/Y',strtotime($in->riskassessment()->first(array('updated_at'))['updated_at']->addYears(3)))}}</td> <!--add years using carbon [addYears(5)]-->
                                <td>{{$in->statusofwork}}</td>
                                <td>{{$in->remark}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
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