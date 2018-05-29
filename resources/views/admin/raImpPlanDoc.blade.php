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
.noborder{
border:none !important;
}

</style>
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>RA004-DOC-RA Implementation Plan</h1>
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
        <li class="active">RA004-DOC-RA Implementation Plan</li>
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
                        <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RA004-DOC-RA Implementation Plan
                    </h3>
                    <span class="pull-right">
                         <i class="glyphicon glyphicon-chevron-up clickable"></i>
                         <i class="glyphicon glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <font color="red"><b>Remark:</b> This form is a summary of all "Work Activity" that has "Additional Risk Control" only</font>
                        <br /><br /><br />
                        <table style="width:100%">
                            <tr>
                                <th colspan="3" style="text-align:center;">Company Name Pte Ltd</th>
                            </tr>
                            <tr>
                                <th>RA Implementation Plan</th>
                                <th>Form Effective Date:</th>
                                <td>New Date</td>
                            </tr>
                        </table>

                            <br /> <br />
                        <table style="width:100%;">
                            <tr>
                                <th>RA Ref #</th>
                                <th>Work Activity</th>
                                <th>Additional Control Measure</th>
                                <th>Implementation Person</th>
                                <th>End Date</th>
                                <th>Remarks</th>
                            </tr>
                            <!--Dynamic row addition-->
                            <tr>
                                <td>=Insert ref#=</td>
                                <td>=Insert WorkAct=</td>
                                <td>=Insert OCM=</td>
                                <td>=Insert IP=</td>
                                <td>=Insert ED=</td>
                                <td>=Insert Remarks=</td>
                            </tr>
                        </table>
                        <br />

                        <table class="noborder" width="100%">
                            <tr>
                                <td class="noborder">Prepared By </td>
                                <td class="noborder">=Signature=</td>
                                <td align="right" class="noborder">Approved By </td>
                                <td class="noborder">=Insert Signature=</td>
                            </tr>
                            <tr>
                                <td class="noborder"></td>
                                <td align="center" class="noborder">Signature</td>
                                <td class="noborder"></td>
                                <td align="center" class="noborder">Signature</td>
                            </tr>
                            <tr>
                                <td class="noborder">Name</td>
                                <td class="noborder">=Insert name=</td>
                                <td class="noborder">Name</td>
                                <td class="noborder">=Insert name=</td>
                            </tr>
                            <tr>
                                <td class="noborder">Date:</td>
                                <td class="noborder">=Insert Date=</td>
                                <td class="noborder">Date:</td>
                                <td class="noborder">=Insert Date=</td>
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