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

<section class="content">    
    <!-- Container Section Start -->
    <div class="container">
        <!--Content Section Start -->
        <div class="row">
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
                                <th colspan="3" style="text-align:center;">COMPANY NAME PTE LTD</th>
                            </tr>
                            <tr>
                                <th rowspan="2" valign="top">Risk Assessment Register</th>
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
                                <tr>
                                <td>=Insert S/N=</td>
                                <td>=Insert ref#=</td>
                                <td>=Insert Description=</td>
                                <td>=Insert OSA=</td>
                                <td>=Insert LRD=</td>
                                <td>=Insert NRD=</td>
                                <td>=Insert SOW=</td>
                                <td>=Insert Remarks=</td>
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