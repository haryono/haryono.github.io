@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add New Risk Assessment
@parent
@stop

{{-- page level styles --}}
{{--Jasny is used for image preview--}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"><!--img preview-->
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/form_layouts.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
    <!--Selectize required file-->
    <link href="{{ asset('assets/vendors/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" />

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Add New Risk Assessment</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Home
            </a>
        </li>
        <li>
            <a href="#">Process Registration</a>
        </li>
        <li class="active">Add New Risk Assessment</li>
    </ol>
</section>

            <!--section ends-->
<section class="content">
    <form action="{{ route('addNewRA') }}" method="POST" id="reg_form" enctype="multipart/form-data">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <!-- New form-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading clearfix  ">
                        <div class="panel-title pull-left">
                            <div class="caption">
                                <i class="livicon" data-name="checked-on" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Section A: General Information
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered" id="tabletry"> 
                                <tbody>                                        
                                    <tr>
                                        <td width="30%">Form Effective Date</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('form_effective_date', 'has-error') }} col-md-5">
                                                <input type="date" class="form-control" id="form_effective_date" name="form_effective_date" placeholder="e.g. DBS" value="{!! old('form_effective_date') !!}" >
                                                {!! $errors->first('form_effective_date', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Reference No.</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('ref_no', 'has-error') }} col-md-5">
                                                <input type="text" class="form-control" id="ref_no" name="ref_no" placeholder="To auto populate from generation" value=123 disabled>
                                                {!! $errors->first('ref_no', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Risk Process</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('riskprocess', 'has-error') }} col-md-5">
                                                <div class="form-group">
                                                    <select id="riskprocess" name="riskprocess" class="form-control">
                                                        <option value="0">Select</option>
                                                        @foreach($raprocesses as $rp)
                                                            <option value="{{$rp->name}}" @if(old('riskprocess') == '{{$rp->name}}')selected @endif>{{$rp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                {!! $errors->first('riskprocess', '<span class="help-block">:message</span>') !!}
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Risk Location</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('risklocation', 'has-error') }} col-md-5">
                                                <input type="text" class="form-control" id="risklocation" name="risklocation" placeholder="e.g. risk location" value="{!! old('risklocation') !!}" >
                                                {!! $errors->first('risklocation', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Risk Leader</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('riskleader', 'has-error') }} col-md-5">
                                                <div class="form-group">
                                                    <select id="riskleader" name="riskleader" class="form-control">
                                                        <option value="0">Select</option>
                                                        @foreach($cps as $cp)
                                                            <option value="{{$cp->name}}" @if(old('riskleader') == '{{$cp->name}}')selected @endif>{{$cp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                {!! $errors->first('riskleader', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Risk Members <br/><i>(Please select one or more members)</i></td>
                                        <td>
                                            <div class="form-group {{ $errors->first('ramember', 'has-error') }} col-md-5">
                                                    <select id="ramember" name="ramember" class="form-control selectize3">
                                                        @foreach($cps as $cp)
                                                            <option value="{{$cp->name}}" @if(old('ramember') == '{{$cp->name}}')selected @endif>{{$cp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                {!! $errors->first('ramember', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Creation Date</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('created_at', 'has-error') }} col-md-5">
                                                <input type="date" class="form-control" id="created_at" name="created_at" placeholder="e.g. DBS" value='{{date("Y-m-j")}}' >
                                                {!! $errors->first('created_at', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Review Date</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('updated_at', 'has-error') }} col-md-5">
                                                <input type="date" class="form-control" id="updated_at" name="updated_at" placeholder="e.g. DBS" value='{{date("Y-m-j")}}' >
                                                {!! $errors->first('updated_at', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Expiry Date</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('expirydate', 'has-error') }} col-md-5">
                                                <div class="form-group input-group">
                                                    <select id="expirydate" name="expirydate" class="form-control" >
                                                        <option value="3" @if(old('expirydate') == '3')selected @endif>3</option>
                                                        <option value="2" @if(old('expirydate') == '2')selected @endif>2</option>
                                                        <option value="1" @if(old('expirydate') == '1')selected @endif>1</option>
                                                    </select>
                                                    <span class="input-group-addon">year(s)</span>
                                                </div>
                                                {!! $errors->first('expirydate', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New form-->
        <!-- section b for work activity -->
        <!-- row-->
        <div class="row">
            <div class="col-lg-12" id="populate">
                <div class="panel panel-primary workactivity">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title pull-left">
                             <i class="livicon" data-name="doc-portrait" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Work Activity
                        </h3>
                        <div class="pull-right">
                            <button type="button" class="btn btn-success btn-sm addnewworkactivity">Add New Work Activity</button>
                            <button type="button" class="btn btn-danger btn-sm delworkactivity">Delete Work Activity</button>
                        </div>
                    </div>
                    <div class="panel-body ">
                        <div class="row">
                            <div class="form-group {{ $errors->first('work_activity_name.0', 'has-error') }}">
                                <label class="col-md-3 control-label" for="work_activity_name[]">Work Activity Name   
                                </label>
                                <div class="col-md-9">
                                    <select id="work_activity_name" name="work_activity_name[]" class="form-control" >
                                        <option value="0">Select</option>
                                        @foreach($was as $wa)
                                            <option value="{{$wa->name}}" @if(old('work_activity_name.0')==='{{$wa->name}}') selected @endif>{{$wa->name}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('work_activity_name.0', '<span class="help-block">:message</span>') !!} <br/><br/>
                                </div>
                            </div>
                            <!-- dynamic hazard-->
                            <div class="populatehazard" id="populatehazard">
                                <div class="clearfix"></div>
                                <div class="panel panel-warning hazardarea clearfix">  
                                    <div class="panel-heading clearfix">
                                        <h3 class="panel-title pull-left">
                                             <i class="livicon" data-name="doc-portrait" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Hazard
                                        </h3>
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-success addnewhazard"  onclick="cloneHaz()">Add New Hazard</button>
                                            <button type="button" class="btn btn-danger removehazard" onclick="removeHaz()">Remove Hazard</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="background-color:beige"><br/>   
                                        <div class="col-md-6">                                   
                                            <div class="form-group {{ $errors->first('hazard.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="hazard[]">Hazard</label>
                                                <div class="col-md-9">
                                                    <select id="hazard" name="hazard[]" class="form-control" >
                                                        <option value="0">Select</option>
                                                        @foreach($hls as $hl)
                                                            <option value="{{$hl->id}}" @if(old('hazard.0') ==='{{$hl->id}}')selected @endif>{{$hl->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                    {!! $errors->first('hazard.0', '<span class="help-block">:message</span>') !!}
                                                    <br/><br/>
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('possible_accident.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="possible_accident[]">Possible Accident/Injury</label>
                                                <div class="col-md-9">
                                                    <select id="possible_accident" name="possible_accident[]" class="form-control" >
                                                        <option value="0">Select</option>
                                                        @foreach($pas as $pa)
                                                            <option value="{{$pa->id}}" @if(old('possible_accident.0') == '{{$pa->name}}')selected @endif>{{$pa->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('possible_accident.0', '<span class="help-block">:message</span>') !!}
                                                    <br/><br/>
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('existing_risk_control.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="existing_risk_control[]">Existing Risk Control</label>
                                                <div class="col-md-9">
                                                    <select id="existing_risk_control" name="existing_risk_control[]" class="form-control" >
                                                        <option value="0">Select</option>
                                                        @foreach($ercs as $erc)
                                                            <option value="{{$erc->id}}" @if(old('existing_risk_control.0') == '{{$erc->name}}')selected @endif>{{$erc->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('existing_risk_control.0', '<span class="help-block">:message</span>') !!}
                                                    <br/><br/>
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('severity.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="severity[]">Severity</label>
                                                <div class="col-md-9">
                                                    <select id="severity" name="severity[]" class="form-control" >
                                                        <option value="0">Select</option>
                                                        <option value="5" @if(old('severity.0') == '5')selected @endif>(5)Catastrophic</option>
                                                        <option value="4" @if(old('severity.0') == '4')selected @endif>(4)Major</option>
                                                        <option value="3" @if(old('severity.0') == '3')selected @endif>(3)Moderate</option>
                                                        <option value="2" @if(old('severity.0') == '2')selected @endif>(2)Minor</option>
                                                        <option value="1" @if(old('severity.0') == '1')selected @endif>(1)Negligible</option>
                                                    </select>
                                                    {!! $errors->first('severity.0', '<span class="help-block">:message</span>') !!}
                                                    <br/><br/>
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('likelihood.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="likelihood[]">Likelihood</label>
                                                <div class="col-md-9">
                                                    <select id="likelihood" name="likelihood[]" class="form-control" >
                                                        <option value="0">Select</option>
                                                        <option value="5" @if(old('likelihood.0') == '5')selected @endif>(5)Almost Certain</option>
                                                        <option value="4" @if(old('likelihood.0') == '4')selected @endif>(4)Frequent</option>
                                                        <option value="3" @if(old('likelihood.0') == '3')selected @endif>(3)Occasional</option>
                                                        <option value="2" @if(old('likelihood.0') == '2')selected @endif>(2)Remote</option>
                                                        <option value="1" @if(old('likelihood.0') == '1')selected @endif>(1)Rare</option>
                                                    </select>
                                                    {!! $errors->first('likelihood.0', '<span class="help-block">:message</span>') !!}
                                                    <br/><br/>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="col-md-3 control-label" for="risklevel">Risk Level</label>
                                                <div class="col-md-9">
                                                    <label class="calculated">calculated (severity*likelihood)</label>
                                                    <br/><br/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->first('actionofficer.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="actionofficer[]">Implementation Person</label>
                                                <div class="col-md-9">
                                                    <select id="actionofficer" name="actionofficer[]" class="form-control selectize3">
                                                            <option >RA Leader</option>
                                                            <option >Operations Manager</option>
                                                            <option >Project Manager</option>
                                                            <option >Safety Supervisor</option>
                                                            <option >Operators</option>
                                                            <option >Others</option>
                                                    </select>
                                                    {!! $errors->first('actionofficer.0', '<span class="help-block">:message</span>') !!}
                                                    <br/><br/>
                                                </div>
                                            </div>
                                            <div class="form-group has-feedback {{ $errors->first('additional_risk_control.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="additional_risk_control">Additional Risk Control</label>
                                                <div class="col-md-9">
                                                    <select id="additional_risk_control" name="additional_risk_control[]" class="form-control" >
                                                        <option value="0">Select</option>
                                                        @foreach($ascs as $asc)
                                                            <option value="{{$asc->name}}">{{$asc->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('additional_risk_control.0', '<span class="help-block">:message</span>') !!}
                                                    <br /> <br />
                                                </div>
                                            </div>
                                            <div class="form-group has-feedback {{ $errors->first('others.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="others[]">If Others, Please Specify</label>
                                                <div class="col-md-9">
                                                    {{ Form::input('text', 'others[]', old("others.0"), ['class' => 'form-control', 'placeholder' => 'e.g. not applicable']) }}
                                                    {!! $errors->first('others.0', '<span class="help-block">:message</span>') !!}
                                                    <br /> <br />
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('severity2.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="severity2[]">Severity</label>
                                                <div class="col-md-9">
                                                    <select id="severity2" name="severity2[]" class="form-control" >
                                                        <option value="0">Select</option>
                                                        <option value="5" @if(old('severity2.0') == '5')selected @endif>(5)Catastrophic</option>
                                                        <option value="4" @if(old('severity2.0') == '4')selected @endif>(4)Major</option>
                                                        <option value="3" @if(old('severity2.0') == '3')selected @endif>(3)Moderate</option>
                                                        <option value="2" @if(old('severity2.0') == '2')selected @endif>(2)Minor</option>
                                                        <option value="1" @if(old('severity2.0') == '1')selected @endif>(1)Negligible</option>
                                                    </select>
                                                    {!! $errors->first('severity2.0', '<span class="help-block">:message</span>') !!}
                                                    <br/><br/>
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->first('likelihood2.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="likelihood2[]">Likelihood</label>
                                                <div class="col-md-9">
                                                    <select id="likelihood2" name="likelihood2[]" class="form-control" >
                                                        <option value="0">Select</option>
                                                        <option value="5">(5)Almost Certain</option>
                                                        <option value="4">(4)Frequent</option>
                                                        <option value="3">(3)Occasional</option>
                                                        <option value="2">(2)Remote</option>
                                                        <option value="1">(1)Rare</option>
                                                    </select>
                                                    {!! $errors->first('likelihood2.0', '<span class="help-block">:message</span>') !!}
                                                    <br/><br/>
                                                </div>
                                            </div>
                                            <div class="form-group has-feedback {{ $errors->first('duedate.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="duedate[]">Due Date</label>
                                                <div class="col-md-9">
                                                    <input type="date" id="duedate" name="duedate[]"class="form-control" placeholder="date">
                                                    {!! $errors->first('duedate.0', '<span class="help-block">:message</span>') !!}
                                                    <br /> <br />
                                                </div>
                                            </div>
                                            <div class="form-group has-feedback {{ $errors->first('remarks.0', 'has-error') }}">
                                                <label class="col-md-3 control-label" for="remarks[]">Remarks</label>
                                                <div class="col-md-9">
                                                    {{ Form::input('text', 'remarks[]', old("remarks.0"), ['class' => 'form-control', 'placeholder' => 'e.g. not applicable']) }}
                                                    {!! $errors->first('remarks.0', '<span class="help-block">:message</span>') !!}
                                                    <br /> <br />
                                                </div>
                                            </div>                              
                                        </div>
                                    </div>
                                    <!-- end of dynamic hazard -->
                                   <br /> <br />
                                </div>
                                <div class="clearfix"></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-danger filterable">
                    <div class="panel-heading clearfix  ">
                        <div class="panel-title pull-left">
                            <div class="caption" valign="top">
                                <i class="livicon" data-name="medal" data-size="40" data-c="#fff" data-hc="#fff" data-loop="true"></i> 
                                <strong>DECLARATION OF RISK ASSESSMENT</strong>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body"> 
                            <h4 align="middle"><b>I hereby confirm all the above information are correct to my best knowledge.</b></h4>  
                            <hr />
                        </div>
                        <div class="form-group has-feedback {{ $errors->first('approvingmanager', 'has-error') }}">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('approvingmanager', 'has-error') }}">
                                    <label class="col-md-3 control-label" for="approvingmanager">Approving Manager</label>
                                    <div class="col-md-9 ">
                                        <select id="approvingmanager" name="approvingmanager" class="form-control ">
                                            @foreach($amlists as $amlist)
                                                <option value="{{$amlist->manager_name}}">{{$amlist->manager_name}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('approvingmanager', '<span class="help-block">:message</span>') !!}
                                        <br/><br/>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div> 

        <!--Button Division-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success filterable">
                    <div class="panel-body">
                        <div class="table-responsive" align="center">                                    
                            <button type="submit" class="btn btn-primary">Submit</button>
                            &nbsp;
                            <a href="{{ route('admin.dashboard') }}">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                            &nbsp;
                            <input type="reset" class="btn btn-default hidden-xs" value="Reset">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end of Button Division-->

    </form>
</section>
    <!-- //Content Section End -->
@stop

{{-- page level scripts --}}
{{--Jasny is used for image preview--}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script> <!--img preview-->
    <script type="text/javascript" src="{{ asset('assets/js/pages/showhidden.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jeditable/js/jquery.jeditable.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.buttons.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.colReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.rowReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.colVis.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.html5.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/pdfmake.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/vfs_fonts.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/newra-advancedtable.js') }}" ></script> <!--for dynamic table population-->
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <!--selectize required file-->
    <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script>
    <script type="text/javascript" src="{{  asset('assets/vendors/selectize/js/standalone/selectize.min.js') }}"></script>
    <!-- selectize option-->
    <script> 
        $(".selectize3").selectize({
            maxItems: 10
        });
        // Dynamic adding clone and removal of work activity
        function clone(){
            $(this).parents(".workactivity").clone().appendTo("#populate").on('click', 'button.addnewworkactivity', clone).on('click', 'button.delworkactivity', remove);
        }
        function remove(){
            $(this).parents(".workactivity").remove();
        }
        $("button.addnewworkactivity").on("click", clone);
        $("button.delworkactivity").on("click", remove);

        //dynamic adding and removal of hazard
        function cloneHaz(){
            alert(document.getElementsByClassName("populatehazard").length);
            $(this).parents(".hazardarea").clone().appendTo("#populatehazard").on('click', 'button.addnewhazard', cloneHaz).on('click', 'button.removehazard', removeHaz);
        }
        function removeHaz(){
            $(this).parents(".hazardarea").remove();
        }
        $("button.addnewhazard").on("click", cloneHaz);
        $("button.removehazard").on("click", removeHaz);


        
    </script>

@stop


<!--global js starts-->



<!--global js end-->




