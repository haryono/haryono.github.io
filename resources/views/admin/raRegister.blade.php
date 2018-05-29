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
    <h1>RA003 RA Register(RA-REG)</h1>
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
        <li class="active">RA003 RA Register(RA-REG)</li>
    </ol>
</section>

<section class="content">    
    <!-- Container Section Start -->
    <div class="row">
        <!--Content Section Start --> 
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> RA003 RA Register(RA-REG)
                </h3>
                <span class="pull-right">
                     <i class="glyphicon glyphicon-chevron-up clickable"></i>
                     <i class="glyphicon glyphicon glyphicon-remove removepanel clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    {{Form::open(array('route'=>'admin.ra.updateSowRemarks' ,'method' => 'post'))}}
                    <b>{{$comp->company_logo}}</b><br />
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo face"> <br /><br />
                    Company Name: {{$comp->company_name}}<br /><br />

                    <h4>RA REGISTER</h4>

                    <table style="width:100%">
                        <tr>
                            <td rowspan="2" valign="top">Form effective</td>
                            <td>{{Form::date('effectivedate',$bizsafe['effectivedate'])}}</td>
                        </tr>
                    </table>
                    {{Form::hidden('companyprofile_id',$comp->id)}}
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
                            <td>{{Form::text('statusofwork[]',$in->statusofwork, array('class'=>'form-control'))}}</td>
                            <td>{{Form::text('remark[]',$in->remark, array('class'=>'form-control'))}}</td>
                            {{Form::hidden('id[]',$in->id)}}
                        </tr>
                        @endforeach
                    </table>
                    <br />
                    <a href="{{route('admin.raRegisterDoc',['id'=>$inv->id])}}" class="button">Generate now</a>
                    {{Form::submit('Save as Draft', array('class' => 'button'))}}
                    {{ Form::close() }}
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