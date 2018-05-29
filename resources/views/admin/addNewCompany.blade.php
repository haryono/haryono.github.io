@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add New Company
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


@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Add New Company</h1>
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
        <li class="active">Add New Company</li>
    </ol>
</section>

            <!--section ends-->
<section class="content">
        <form action="{{ route('admin.test2') }}" method="POST" id="reg_form" enctype="multipart/form-data">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <!-- New form-->
            <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><u>SECTION A : COMPANY INFORMATION</u></b> </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading clearfix  ">
                            <div class="panel-title pull-left">
                                <div class="caption">
                                    <i class="livicon" data-name="checked-on" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Company Details
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="tabletry"> 
                                    <tbody>                                        
                                        <tr>
                                            <td width="30%">Company Initial</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('company_initial', 'has-error') }}">
                                                    <input type="text" class="form-control" id="company_initial" name="company_initial" placeholder="e.g. DBS" value="{!! old('company_initial') !!}" >
                                                    {!! $errors->first('company_initial', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Company Name</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('company_name', 'has-error') }}">
                                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="e.g. premior supremo" value="{!! old('company_name') !!}" >
                                                    {!! $errors->first('company_name', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Company Registration Number</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('company_reg_no', 'has-error') }}">
                                                    <input type="text" class="form-control" id="company_reg_no" name="company_reg_no" placeholder="company reg number" value="{!! old('company_reg_no') !!}" >
                                                    {!! $errors->first('company_reg_no', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Company Logo
                                            </td>
                                            <td> 
                                                <div class="form-group {{ $errors->first('company_logo', 'has-error') }}">
                                                    <div class="col-md-10">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 200px;">
                                                                <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" alt="..."
                                                                         class="img-responsive"/>
                                                            </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                            <div>
                                                                <span class="btn btn-primary btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="company_logo" id="company_logo" value="{!! old('company_logo') !!}"/>
                                                                </span>
                                                                <span class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</span>
                                                            </div>
                                                        </div>
                                                        <span class="help-block">{{ $errors->first('company_logo', ':message')}}</span>
                                                    </div>
                                                </div>  
                                            </td>                                        
                                        </tr>
                                        <tr>
                                            <td>Industry</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('ind', 'has-error') }} col-md-5">
                                                    <select id="ind" name="ind" class="form-control" >
                                                        <option value="0">Select</option>
                                                        @foreach ($industrys as $industry)
                                                            <option value="{{$industry->id}}" @if(old('ind') == '{{$industry->id}}')selected @endif>{{$industry->name}}</option>
                                                        @endforeach
                                                    </select>   
                                                    {!! $errors->first('ind', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Company Website (URL)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('company_url', 'has-error') }}">
                                                    <input type="text" class="form-control" id="company_url" name="company_url" placeholder="company url" value="{!! old('company_url') !!}" >
                                                    {!! $errors->first('company_url', '<span class="help-block">:message</span>') !!}
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
            <!-- company address details-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading clearfix  ">
                            <div class="panel-title pull-left">
                                <div class="caption">
                                    <i class="livicon" data-name="home" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Company Address (Head Office)
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="tablecompdetails">
                                    <tbody> 
                                        <!--allow repeat up to 2x for company details-->
                                        <tr>
                                            <td width="30%">Address</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="e.g. block 1 raffless road" value="{!! old('address') !!}" >
                                                    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Postal Code</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('postal_code', 'has-error') }}">
                                                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="e.g. 860898"value="{!! old('postal_code') !!}" >
                                                    {!! $errors->first('postal_code', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('country', 'has-error') }}">
                                                    <input type="text" class="form-control" id="country" name="country" placeholder="e.g. Singapore" value="{!! old('country') !!}" >
                                                    {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--allow repeat up to 2x for company details-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading clearfix  ">
                            <div class="panel-title pull-left">
                                <div class="caption">
                                    <i class="livicon" data-name="home" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Company Address (2)
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="tablecompdetails">
                                    <tbody> 
                                        <!--allow repeat up to 2x for company details-->
                                        <tr>
                                            <td width="30%">Address (2)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('address2', 'has-error') }}">
                                                    <input type="text" class="form-control" id="address2" name="address2" placeholder="e.g. block 1 raffless road" value="{!! old('address2') !!}" >
                                                    {!! $errors->first('address2', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Postal Code (2)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('postal_code2', 'has-error') }}">
                                                    <input type="text" class="form-control" id="postal_code2" name="postal_code2" placeholder="e.g. 860898"value="{!! old('postal_code2') !!}" >
                                                    {!! $errors->first('postal_code2', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Country (2)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('country2', 'has-error') }}">
                                                    <input type="text" class="form-control" id="country2" name="country2" placeholder="e.g. Singapore" value="{!! old('country2') !!}" >
                                                    {!! $errors->first('country2', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--allow repeat up to 2x for company details-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- company address details-->
            <!-- contact person details-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading clearfix  ">
                            <div class="panel-title pull-left">
                                <div class="caption">
                                    <i class="livicon" data-name="users-add" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Contact Person(s)
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="tablecontactdetails">
                                    <tbody> 
                                        <!--allow repeat up to 2x for contact person-->
                                        <tr>
                                            <td width="30%">Name</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('name', 'has-error') }}">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="e.g. David Coolie" value="{!! old('name') !!}" >
                                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Designation</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('designation', 'has-error') }}">
                                                    <input type="text" class="form-control" id="designation" name="designation" placeholder="e.g. admin" value="{!! old('designation') !!}" >
                                                    {!! $errors->first('designation', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mobile No.</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('mobile_no', 'has-error') }}">
                                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="e.g. 88888888" value="{!! old('mobile_no') !!}" >
                                                    {!! $errors->first('mobile_no', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telephone No.</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('telephone_no', 'has-error') }}">
                                                    <input type="text" class="form-control" id="telephone_no" name="telephone_no" placeholder="e.g. 66666666" value="{!! old('telephone_no') !!}" >
                                                    {!! $errors->first('telephone_no', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>E-mail</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="e.g. email@mail.com" value="{!! old('email') !!}" >
                                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <!--allow repeat up to 2x for contact person-->

                                        <!--allow repeat up to 2x for contact person-->
                                        <tr>
                                            <td>Name (2)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('name2', 'has-error') }}">
                                                    <input type="text" class="form-control" id="name2" name="name2" placeholder="e.g. David Coolie" value="{!! old('name2') !!}" >
                                                    {!! $errors->first('name2', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Designation (2)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('designation2', 'has-error') }}">
                                                    <input type="text" class="form-control" id="designation2" name="designation2" placeholder="e.g. admin" value="{!! old('designation2') !!}" >
                                                    {!! $errors->first('designation2', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mobile No. (2)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('mobile_no2', 'has-error') }}">
                                                    <input type="text" class="form-control" id="mobile_no2" name="mobile_no2" placeholder="e.g. 88888888" value="{!! old('mobile_no2') !!}" >
                                                    {!! $errors->first('mobile_no2', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>Telephone No. (2)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('telephone_no2', 'has-error') }}">
                                                    <input type="text" class="form-control" id="telephone_no2" name="telephone_no2" placeholder="e.g. 66666666" value="{!! old('telephone_no2') !!}" >
                                                    {!! $errors->first('telephone_no2', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>E-mail (2)</td>
                                            <td>
                                                <div class="form-group {{ $errors->first('email2', 'has-error') }}">
                                                    <input type="text" class="form-control" id="email2" name="email2" placeholder="e.g. email@mail.com" value="{!! old('email2') !!}" >
                                                    {!! $errors->first('email2', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </tr>
                                        <!--allow repeat up to 2x for contact person-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact person details-->

            <!-- section b for sales staff in charge -->
            <!-- row-->
            <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><u>SECTION B : STAFF IN CHARGE</u></b> </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success filterable">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title pull-left">
                                 <i class="livicon" data-name="users-add" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Salesperson
                            </h3>
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary btn-sm" id="addButton">+ Add Salesperson</button>
                                <button type="button" class="btn btn-danger btn-sm" id="delButton">Delete</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="tablesalesperson" width="100%">
                                <thead>
                                    <tr>
                                        <th>Salesperson Name</th>
                                        <th>Service Type</th>
                                        <th>Commence Date</th>
                                        <th>Expiry Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group {{ $errors->first('salesperson_name.0', 'has-error') }}">
                                                <input type="text" class="form-control" name="salesperson_name[]" placeholder="e.g. David Coolie" value="{!! old('salesperson_name.0') !!}" />
                                                {!! $errors->first('salesperson_name.0', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                        <td><!--dropdownlist value bizSAFE, Standards, Others-->
                                            <div class="form-group {{ $errors->first('service_type.0', 'has-error') }}">
                                                <input type="text" class="form-control"  name="service_type[]" placeholder="e.g. tourism"  value="{!! old('service_type.0') !!}"/>
                                                {!! $errors->first('service_type.0', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->first('commence_date.0', 'has-error') }}">
                                                <input type="date" class="form-control "  name="commence_date[]" placeholder="e.g. 12/12/2016"  value="{!! old('commence_date.0') !!}"/>
                                                {!! $errors->first('commence_date.0', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->first('expiry_date.0', 'has-error') }}">
                                                <input type="date" class="form-control "  name="expiry_date[]" placeholder="e.g. 24/12/2017" value="{!! old('expiry_date.0') !!}"/>
                                                {!! $errors->first('expiry_date.0', '<span class="help-block">:message</span>') !!}
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
            <!-- section b for sales staff in charge -->
            
            <!-- section b for Consultant  in charge -->
            <!-- row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success filterable">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title pull-left">
                                <i class="livicon" data-name="users-add" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Consultants
                            </h3>
                            <div class="pull-right">

                                <button type="button" class="btn btn-primary btn-sm" id="addButton2">+ Add Consultant</button>
                                <button type="button" class="btn btn-danger btn-sm" id="delButton2">Delete</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="tableconsultant" width="100%">
                                <thead>
                                    <tr>
                                        <th>Consultant Name</th>
                                        <th>Service Type</th>
                                        <th>Commence Date</th>
                                        <th>Expiry Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group {{ $errors->first('consultant_name.0', 'has-error') }}">
                                                <input type="text" class="form-control" name="consultant_name[]" placeholder="e.g. David Coolie"  value="{!! old('consultant_name.0') !!}"/>
                                                {!! $errors->first('consultant_name.0', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                        <td><!--dropdownlist value bizSAFE, Standards, Others-->
                                            <div class="form-group {{ $errors->first('service_type2.0', 'has-error') }}">
                                                <input type="text" class="form-control"  name="service_type2[]" placeholder="e.g. tourism" value="{!! old('service_type2.0') !!}"/>
                                                {!! $errors->first('service_type2.0', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->first('commence_date2.0', 'has-error') }}">
                                                <input type="date" class="form-control " name="commence_date2[]" placeholder="e.g. 12/12/2016" value="{!! old('commence_date2.0') !!}"/>
                                                {!! $errors->first('commence_date2.0', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group {{ $errors->first('expiry_date2.0', 'has-error') }}">
                                                <input type="date" class="form-control " name="expiry_date2[]" placeholder="e.g. 24/12/2017" value="{!! old('expiry_date2.0') !!}"/>
                                                {!! $errors->first('expiry_date2.0', '<span class="help-block">:message</span>') !!}
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
            <!-- section b for consultant in charge -->
            <div class="row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><u>SECTION C : TYPE OF SERVICES</u></b> </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger filterable">
                        <div class="panel-heading clearfix  ">
                            <div class="panel-title pull-left">
                                <div class="caption">
                                    <i class="livicon" data-name="magic" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Services Signed-Up
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">   
                                <div class="col-md-9">
                                    <div class="checkbox-inline mar-left5">
                                        <label for="trigger">
                                            <input type="checkbox" id="trigger" name="bizsafe" value="bizsafe" class="square-blue" > bizSAFE</label>
                                    </div>
                                    <div class="checkbox-inline mar-left5">
                                        <label for="triggerstandard">
                                            <input type="checkbox" id="triggerstandard" name="standards" value="standards" class="square-blue"> STANDARDS</label>
                                    </div>
                                    <div class="checkbox-inline mar-left5">
                                        <label for="triggerothers">
                                            <input type="checkbox" id="triggerothers" name="others" value="others" class="square-blue" > OTHERS</label>
                                    </div>
                                </div>                                                                         
                            </div>
                        </div>
                    </div>
                </div>
            </div> 


            <!--hidden fields Bizsafe-->
            <div id="hidden_fields">
                <!--General Information-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i> Section C.1: bizSAFE
                                </h3>
                                            <span class="pull-right">
                                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                                            </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <table class="table table-striped table-bordered" id="tabletry">
                                        <tbody>
                                            <tr>
                                                <td width="30%">Contract Date:</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('contract_date', 'has-error')}} col-md-5">
                                                        <input class="form-control " type="date" name="contract_date" placeholder="Try me.." value="{!! old('contract_date') !!}">
                                                        {!! $errors->first('contract_date', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>bizSAFE level</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('bizsafe_lvl', 'has-error') }} col-md-5">
                                                        <select id="bizsafe_lvl" name="bizsafe_lvl" class="form-control">
                                                          <option value="0">Select</option>  
                                                          <option value="bizSAFE" @if(old('bizsafe_lvl') == 'bizSAFE')selected @endif>bizSAFE 3</option>
                                                          <option value="bizSAFE4" @if(old('bizsafe_lvl') == 'bizSAFE4')selected @endif>bizSAFE 4</option>
                                                          <option value="bizSAFE STAR" @if(old('bizsafe_lvl') == 'bizSAFE STAR')selected @endif>bizSAFE STAR</option>
                                                        </select>
                                                        {!! $errors->first('bizsafe_lvl', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </td>
                                            </tr>        
                                            <tr>
                                                <td>Contract Type</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('contract_type', 'has-error') }} col-md-5">   
                                                        <select id="contract_type" name="contract_type" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="New" @if(old('contract_type') == 'New')selected @endif>New</option>
                                                            <option value="Renewal" @if(old('contract_type') == 'Renewal')selected @endif>Renewal</option>
                                                        </select>
                                                        {!! $errors->first('contract_type', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3 years supports:</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('3yearsupports', 'has-error') }} col-md-5">   
                                                        <label class="radio-inline " for="row-inline-radio1">
                                                            <input type="radio" id="row-inline-radio1" class="radio-blue" name="3yearsupports" value="Yes" @if(old('3yearsupports') == 'Yes')checked @endif> Yes</label>
                                                        <label class="radio-inline" for="row-inline-radio2">
                                                            <input type="radio" id="row-inline-radio2" class="radio-blue" name="3yearsupports" value="No" @if(old('3yearsupports') == 'No')checked @endif> No</label>
                                                        {!! $errors->first('3yearsupports', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3 Years Support Expiry Date (If Any):</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('3yrs_supexpdate', 'has-error') }} col-md-5">
                                                        <input type="date" class="form-control " id="3yrs_supexpdate" name="3yrs_supexpdate" value="{!! old('3yrs_supexpdate') !!}">
                                                        {!! $errors->first('3yrs_supexpdate', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scope of Work (As per acra)</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('scopeofwork', 'has-error') }} col-md-5">   
                                                        <input type="text" class="form-control" id="scopeofwork" name="scopeofwork"placeholder="e.g. scope of work" value="{!! old('scopeofwork') !!}">
                                                        {!! $errors->first('scopeofwork', '<span class="help-block">:message</span>') !!}
                                                    </div>    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Form Effective Date:</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('effectivedate', 'has-error') }} col-md-5">  
                                                        <input type="date" class="form-control " id="effectivedate" name="effectivedate" placeholder="DD/MM/YYYY" value="{!! old('effectivedate') !!}">
                                                        {!! $errors->first('effectivedate', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Project Completed Date:</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('compdate', 'has-error') }} col-md-5">  
                                                        <input type="date" class="form-control " id="compdate" name="compdate" placeholder="DD/MM/YYYY" value="{!! old('compdate') !!}">
                                                        {!! $errors->first('compdate', '<span class="help-block">:message</span>') !!}
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
                <!--end of General Information-->
                <!--Button Division-->
                <div>                                 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><u>bizSAFE PROJECT TEAM</u></b>   
                </div>
                <!--end of Button Division-->
                <!-- Project Team bizsafe -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-warning filterable">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">
                                     <i class="livicon" data-name="users-add" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                    RA Leader
                                </h3>
                                <div class="pull-right">
                                    <button type="button" class="btn btn-primary btn-sm" id="addButton3">+ Add RA Leader</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="delButton3">Delete</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="tablebizsafe1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Email</th>
                                            <th>Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group {{ $errors->first('rep_name.0', 'has-error') }}">
                                                    <input type="text" class="form-control" name="rep_name[]" placeholder="e.g. David Coolie" value="{!! old('rep_name.0') !!}" />
                                                    {!! $errors->first('rep_name.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('rep_designation.0', 'has-error') }}">
                                                    <input type="text" class="form-control"  name="rep_designation[]" placeholder="e.g. tourism" value="{!! old('rep_designation.0') !!}"/>
                                                    {!! $errors->first('rep_designation.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('rep_email.0', 'has-error') }}">
                                                    <input type="text" class="form-control "  name="rep_email[]" placeholder="e.g. mail@mail.com" value="{!! old('rep_email.0') !!}"/>
                                                    {!! $errors->first('rep_email.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('rep_signature.0', 'has-error') }}">
                                                    <input type="file" class="form-control "  name="rep_signature[]" placeholder="e.g. signature" value="{!! old('rep_signature.0') !!}"/>
                                                    {!! $errors->first('rep_signature.0', '<span class="help-block">:message</span>') !!}
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
                <!-- end Project team -->

                <!-- Members -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-warning filterable">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">
                                     <i class="livicon" data-name="users-add" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                    RA Member
                                </h3>
                                <div class="pull-right">

                                    <button type="button" class="btn btn-primary btn-sm" id="addButton4">+ Add RA Member</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="delButton4">Delete</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="tablebizsafe2" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Email</th>
                                            <th>Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group {{ $errors->first('member_name.0', 'has-error') }}">
                                                    <input type="text" class="form-control" name="member_name[]" placeholder="e.g. David Coolie" value="{!! old('member_name.0') !!}"/>
                                                    {!! $errors->first('member_name.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('member_designation.0', 'has-error') }}">
                                                    <input type="text" class="form-control"  name="member_designation[]" placeholder="e.g. tourism" value="{!! old('member_designation.0') !!}"/>
                                                    {!! $errors->first('member_designation.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('member_email.0', 'has-error') }}">
                                                    <input type="text" class="form-control "  name="member_email[]" placeholder="e.g. mail@mail.com" value="{!! old('member_email.0') !!}" />
                                                    {!! $errors->first('member_email.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('member_signature.0', 'has-error') }}">
                                                    <input type="file" class="form-control "  name="member_signature[]" placeholder="e.g. signature" value="{!! old('member_signature.0') !!}"/>
                                                    {!! $errors->first('member_signature.0', '<span class="help-block">:message</span>') !!}
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
                <!-- end members -->

                <!-- Approving manager -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-warning filterable">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">
                                     <i class="livicon" data-name="users-add" data-size="24" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Approving Manager
                                </h3>
                                <div class="pull-right">

                                    <button type="button" class="btn btn-primary btn-sm" id="addButton5">+ Add Approving Manager</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="delButton5">Delete</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="tablebizsafe3" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Email</th>
                                            <th>Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group {{ $errors->first('manager_name.0', 'has-error') }}">
                                                    <input type="text" class="form-control" name="manager_name[]" placeholder="e.g. David Coolie" value="{!! old('manager_name.0') !!}"/>
                                                    {!! $errors->first('manager_name.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('manager_designation.0', 'has-error') }}">
                                                    <input type="text" class="form-control"  name="manager_designation[]" placeholder="e.g. tourism" value="{!! old('manager_designation.0') !!}"/>
                                                    {!! $errors->first('manager_designation.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('manager_email.0', 'has-error') }}">
                                                    <input type="text" class="form-control "  name="manager_email[]" placeholder="e.g. mail@mail.com" value="{!! old('manager_email.0') !!}" />
                                                    {!! $errors->first('manager_email.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('manager_signature.0', 'has-error') }}">
                                                    <input type="file" class="form-control "  name="manager_signature[]" placeholder="e.g. signature" value="{!! old('manager_signature.0') !!}"/>
                                                    {!! $errors->first('manager_signature.0', '<span class="help-block">:message</span>') !!}
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
                <!-- Approving Manager -->    

            </div>
            <!--end of hidden fields Bizsafe-->

            <!--hidden fields Standard -->
            <!--standards-->
            <div id="hidden_fields2">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i> Section C.2: Standards
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="form-body">
                                <table class="table table-striped table-bordered" id="tabletry">
                                    <tbody>                                            
                                    <tr>
                                        <div class="form-group">
                                            <tr>
                                                <th colspan="2" class="info"> <u>Project Details</u></th>
                                            </tr>
                                            <tr>
                                                <td>Contract Date:</td>
                                                <td>
                                                    <div class="form-group {{ $errors->first('stdcontract_date', 'has-error') }} col-md-5">
                                                        <input class="form-control " type="date" name="stdcontract_date" placeholder="Try me.." value="{!! old('stdcontract_date') !!}">
                                                        {!! $errors->first('stdcontract_date', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </td>
                                            </tr>
                                            <td>Type of Standards</td>
                                            <td>
                                                <div class=" form-group {{ $errors->first('stdtype', 'has-error') }} col-md-9">
                                                    <label class="checkbox-inline mar-left5" for="form-inline-checkbox1">
                                                        <input type="checkbox" id="form-inline-checkbox1" name="stdtype" value="9k" class="square-blue"  @if(old('stdtype') == '9k')checked @endif> 9K</label>
                                                    <label class="checkbox-inline mar-left5" for="form-inline-checkbox2">
                                                        <input type="checkbox" id="form-inline-checkbox2" name="stdtype" value="14k" class="square-blue" @if(old('stdtype') == '14k')checked @endif> 14K</label>
                                                    <label class="checkbox-inline mar-left5" for="form-inline-checkbox3">
                                                        <input type="checkbox" id="form-inline-checkbox3" name="stdtype" value="18k" class="square-blue" @if(old('stdtype') == '18k')checked @endif> 18K</label>
                                                    <label class="checkbox-inline mar-left5" for="form-inline-checkbox4">
                                                        <input type="checkbox" id="form-inline-checkbox4" name="stdtype" value="22k" class="square-blue" @if(old('stdtype') == '22k')checked @endif> 22K</label>
                                                    <label class="checkbox-inline mar-left5" for="form-inline-checkbox5">
                                                        <input type="checkbox" id="form-inline-checkbox5" name="stdtype" value="HACCP" class="square-blue" @if(old('stdtype') == 'HACCP')checked @endif> HACCP</label>
                                                    <label class="checkbox-inline mar-left5" for="form-inline-checkbox6">
                                                        <input type="checkbox" id="form-inline-checkbox6" name="stdtype" value="GMP" class="square-blue" @if(old('stdtype') == 'GMP')checked @endif> GMP</label>
                                                    <label class="checkbox-inline mar-left5" for="form-inline-checkbox7">
                                                        <input type="checkbox" id="form-inline-checkbox7" name="stdtype" value="BMS" class="square-blue" @if(old('stdtype') == 'BMS')checked @endif> BMS</label>
                                                    <label class="checkbox-inline mar-left5" for="form-inline-checkbox8">
                                                        <input type="checkbox" id="form-inline-checkbox4" name="stdtype" value="GGBS" class="square-blue" @if(old('stdtype') == 'GGBS')checked @endif> GGBS</label>
                                                    {!! $errors->first('stdtype', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                        </div>
                                    </tr>                                
                                    <tr>                                        
                                        <td>Type of Management System</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('stdTypeOfMgmtSys', 'has-error') }} col-md-9">
                                                <label class="radio-inline mar-left5" for="single">
                                                    <input type="radio" id="single" name="stdTypeOfMgmtSys" value="Single" class="square-blue" @if(old('stdTypeOfMgmtSys') == 'Single')checked @endif> Single</label>
                                                <label class="radio-inline mar-left5" for="combined">
                                                    <input type="radio" id="combined" name="stdTypeOfMgmtSys" value="Combined" class="square-blue" @if(old('stdTypeOfMgmtSys') =='Combined')checked @endif> Combined</label>
                                                <label class="radio-inline mar-left5" for="integrated">
                                                    <input type="radio" id="integrated" name="stdTypeOfMgmtSys" value="Integrated" class="square-blue" @if(old('stdTypeOfMgmtSys') =='Integrated')checked @endif> Integrated</label> 
                                                {!! $errors->first('stdTypeOfMgmtSys', '<span class="help-block">:message</span>') !!}
                                            </div>      
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Type of Application</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('stdTOA', 'has-error') }} col-md-9">
                                                <label class="radio-inline mar-left5" for="new">
                                                    <input type="radio" id="new" name="stdTOA" value="New" class="square-blue" @if(old('stdTOA') =='New')checked @endif> New</label>
                                                <label class="radio-inline mar-left5" for="conversion">
                                                    <input type="radio" id="conversion" name="stdTOA" value="Conversion" class="square-blue" @if(old('stdTOA') =='Conversion')checked @endif> Conversion</label> 
                                                {!! $errors->first('stdTOA', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Preaudit Support</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('preaudit', 'has-error') }}col-md-5">
                                                <label class="radio-inline " for="yes">
                                                <input type="radio" id="yes" class="radio-blue" name="preaudit" value="Yes" @if(old('preaudit') =='Yes')checked @endif> Yes</label>
                                                <label class="radio-inline" for="no">
                                                <input type="radio" id="no" class="radio-blue" name="preaudit" value="No" @if(old('preaudit') =='No')checked @endif> No</label>
                                                {!! $errors->first('preaudit', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Preaudit Support Due Date (If Any)</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('preauditsupduedate', 'has-error') }} col-md-5">
                                                <input type="date" class="form-control datepicker1" name="preauditsupduedate" placeholder="e.g. 24/12/2018" value="{!! old('preauditsupduedate') !!}">
                                                {!! $errors->first('preauditsupduedate', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="info"><u>Project Information</u></th>
                                    </tr>
                                    <tr>
                                        <td>Nature of Business</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('natureofbusiness', 'has-error') }} col-md-9">
                                                <input type="text" name="natureofbusiness" placeholder="Nature of Business" class="form-control" value="{!! old('natureofbusiness') !!}"/>
                                                {!! $errors->first('natureofbusiness', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <td>Job Scope Description</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('jobscopedescription', 'has-error') }} col-md-9">
                                                <input id="jobscopedescription" name="jobscopedescription"type="text" placeholder="Job Scope Description" class="form-control" value="{!! old('jobscopedescription') !!}"/>
                                                {!! $errors->first('jobscopedescription', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EA Code</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('eacode', 'has-error') }} col-md-5">
                                                <select id="bord-select" name="eacode" class="form-control" >
                                                    <option value="0">Select</option>
                                                    <option value="1" @if(old('eacode') =='1')selected @endif>1</option>
                                                    <option value="2" @if(old('eacode') =='2')selected @endif>2</option>
                                                    <option value="3" @if(old('eacode') =='3')selected @endif>3</option>
                                                    <option value="4" @if(old('eacode') =='4')selected @endif>4</option>
                                                </select>
                                                {!! $errors->first('eacode', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NACE Code</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('nacecode', 'has-error') }}  col-md-5">
                                                <select id="nace-select" name="nacecode" class="form-control" >
                                                    <option value="0">Select</option>
                                                    <option value="1" @if(old('nacecode') =='1')selected @endif>1</option>
                                                    <option value="2" @if(old('nacecode') =='2')selected @endif>2</option>
                                                    <option value="3" @if(old('nacecode') =='3')selected @endif>3</option>
                                                    <option value="4" @if(old('nacecode') =='4')selected @endif>4</option>
                                                    {!! $errors->first('nacecode', '<span class="help-block">:message</span>') !!}
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No. of Site</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('noofsite', 'has-error') }} col-md-9">
                                                <input id="noofsite" name="noofsite" type="number" min="0" placeholder="No. of Site" class="form-control" value="{!! old('noofsite') !!}">
                                                {!! $errors->first('noofsite', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="info" colspan="2"><u>Site 1</u></th>
                                    </tr>
                                    <tr>
                                        <td>Site Address(1)</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('siteaddress', 'has-error') }} col-md-9">
                                                <input id="siteaddress" name="siteaddress" type="text" placeholder="Site Address" class="form-control" value="{!! old('siteaddress') !!}"/>
                                                {!! $errors->first('siteaddress', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total No. of Employee for Site(1)</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('totalnoofsite', 'has-error') }} col-md-5">
                                                <input id="totalnoofsite" name="totalnoofsite" type="number" min="0" placeholder="e.g. 12" class="form-control" value="{!! old('totalnoofsite') !!}"/>
                                                {!! $errors->first('totalnoofsite', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('stdaddress', 'has-error') }}col-md-9 ">
                                                <input type="text" class="form-control" name="stdaddress" placeholder=" Address" value="{!! old('stdaddress') !!}">
                                                {!! $errors->first('stdaddress', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Message</td>
                                        <td>
                                            <div class="form-group {{ $errors->first('stdmessage', 'has-error') }}col-md-9 ">
                                                <textarea id="stdmessage" rows="3" name="stdmessage" placeholder=" Message" class="form-control resize_vertical" value="{!! old('stdmessage') !!}"></textarea>
                                                {!! $errors->first('stdmessage', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--employee details -->
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="panel panel-info filterable">
                             <div class="panel-heading clearfix  ">
                                 <div class="panel-title pull-left">
                                     <div class="caption">
                                         <i class="livicon" data-name="folder-open" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i> Employee Details for Site
                                     </div>
                                 </div>
                             </div>
                             <div class="panel-body">
                                 <div class="panel-body">
                                     <table class="table table-striped table-bordered" id="tabletry">
                                         <thead>
                                             <tr class="info">
                                                 <th>Type of Employee</th>
                                                 <th>Full Time</th>
                                                 <th>Part Time</th>
                                                 <th>Shift</th>
                                             </tr>
                                         </thead>
                                         
                                         <tbody>
                                             <tr>
                                                 <td>Senior Management</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('smtNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="smtNoFT" placeholder=" e.g. 1" value="{!! old('smtNoFT') !!}">
                                                        {!! $errors->first('smtNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('smtNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="smtNoPT" name="smtNoPT" placeholder=" e.g. 1" value="{!! old('smtNoPT') !!}">
                                                        {!! $errors->first('smtNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('smtNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="smtNo" name="smtNo" placeholder=" e.g. 1" value="{!! old('smtNo') !!}">
                                                        {!! $errors->first('smtNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Management</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('mgmtNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="mgmtNoFT" placeholder=" e.g. 1" value="{!! old('mgmtNoFT') !!}">
                                                        {!! $errors->first('mgmtNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('mgmtNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="mgmtNoPT" name="mgmtNoPT" placeholder=" e.g. 1" value="{!! old('mgmtNoPT') !!}">
                                                        {!! $errors->first('mgmtNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('mgmtNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="mgmtNo" name="mgmtNo" placeholder=" e.g. 1" value="{!! old('mgmtNo') !!}">
                                                        {!! $errors->first('mgmtNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Administration Staff</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('admNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="admNoFT" placeholder=" e.g. 1" value="{!! old('admNoFT') !!}">
                                                        {!! $errors->first('admNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('admNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="admNoPT" name="admNoPT" placeholder=" e.g. 1" value="{!! old('admNoPT') !!}">
                                                        {!! $errors->first('admNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('admNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="admNo" name="admNo" placeholder=" e.g. 1" value="{!! old('admNo') !!}">
                                                        {!! $errors->first('admNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Management/Service Area</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('manSVCNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="manSVCNoFT" placeholder=" e.g. 1" value="{!! old('manSVCNoFT') !!}">
                                                        {!! $errors->first('manSVCNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('manSVCNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="manSVCNoPT" name="manSVCNoPT" placeholder=" e.g. 1" value="{!! old('manSVCNoPT') !!}">
                                                        {!! $errors->first('manSVCNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('manSVCNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="manSVCNo" name="manSVCNo" placeholder=" e.g. 1" value="{!! old('manSVCNo') !!}">
                                                        {!! $errors->first('manSVCNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Operational Staff*</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('osNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="osNoFT" placeholder=" e.g. 1" value="{!! old('osNoFT') !!}">
                                                        {!! $errors->first('osNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('osNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="osNoPT" name="osNoPT" placeholder=" e.g. 1" value="{!! old('osNoPT') !!}">
                                                        {!! $errors->first('osNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('osNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="osNo" name="osNo" placeholder=" e.g. 1" value="{!! old('osNo') !!}">
                                                        {!! $errors->first('osNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>*Breakdown of operational staff roles, please describe below:</td>
                                                 <td colspan="3"> 
                                                    <div class="form-group {{ $errors->first('tastaffroles', 'has-error') }}">
                                                        <textarea id="tastaffroles" name="tastaffroles" rows="3" placeholder=" e.g. Describe the breakdown of staff roles" class="form-control resize_vertical ">{!! old('osNoPT') !!}</textarea>
                                                        {!! $errors->first('tastaffroles', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Quality Control/Technical</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('qctNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="qctNoFT" placeholder=" e.g. 1" value="{!! old('qctNoFT') !!}">
                                                        {!! $errors->first('qctNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('qctNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="qctNoPT" name="qctNoPT" placeholder=" e.g. 1" value="{!! old('qctNoPT') !!}">
                                                        {!! $errors->first('qctNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('qctNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="qctNo" name="qctNo" placeholder=" e.g. 1" value="{!! old('qctNo') !!}">
                                                        {!! $errors->first('qctNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Storage/Warehouse</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('swNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="swNoFT" placeholder=" e.g. 1" value="{!! old('swNoFT') !!}">
                                                        {!! $errors->first('swNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('swNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="swNoPT" name="swNoPT" placeholder=" e.g. 1" value="{!! old('swNoPT') !!}">
                                                        {!! $errors->first('swNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('swNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="swNo" name="swNo" placeholder=" e.g. 1" value="{!! old('swNo') !!}">
                                                        {!! $errors->first('swNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Others</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('othersNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="othersNoFT" placeholder=" e.g. 1" value="{!! old('othersNoFT') !!}">
                                                        {!! $errors->first('othersNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('othersNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="othersNoPT" name="othersNoPT" placeholder=" e.g. 1" value="{!! old('othersNoPT') !!}">
                                                        {!! $errors->first('othersNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('othersNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="othersNo" name="othersNo" placeholder=" e.g. 1" value="{!! old('othersNo') !!}">
                                                        {!! $errors->first('othersNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Seasonal Staff</td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('ssNoFT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="row-1-age" name="ssNoFT" placeholder=" e.g. 1" value="{!! old('ssNoFT') !!}">
                                                        {!! $errors->first('ssNoFT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('ssNoPT', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="ssNoPT" name="ssNoPT" placeholder=" e.g. 1" value="{!! old('ssNoPT') !!}">
                                                        {!! $errors->first('ssNoPT', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                                 <td>
                                                    <div class="form-group {{ $errors->first('ssNo', 'has-error') }}">
                                                        <input type="number" min="0" class="form-control" id="ssNo" name="ssNo" placeholder=" e.g. 1" value="{!! old('ssNo') !!}">
                                                        {!! $errors->first('ssNo', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <th colspan="4" class="info">More Details</th>
                                             </tr>
                                             <tr>
                                                 <td>No. of Sub Contractors (Approx)</td>
                                                 <td colspan="3">
                                                    <div class="form-group {{ $errors->first('noofsubcon', 'has-error') }} col-md-5">
                                                        <input type="number" min="0" class="form-control" id="noofsubcon" name="noofsubcon" placeholder=" e.g. 1" value="{!! old('noofsubcon') !!}" >
                                                        {!! $errors->first('noofsubcon', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>% of Total Work Sub Contracted</td>
                                                 <td colspan="3">
                                                    <div class="form-group {{ $errors->first('totalworksubcon', 'has-error') }} col-md-5">
                                                        <input type="number" min="0" class="form-control" id="totalworksubcon" name="totalworksubcon" placeholder=" e.g. 1" value="{!! old('totalworksubcon') !!}">
                                                        {!! $errors->first('totalworksubcon', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>% of Work Carried Out at Client Site</td>
                                                 <td colspan="3">
                                                    <div class="form-group {{ $errors->first('workcarriedout', 'has-error') }} col-md-5">
                                                        <input type="number" min="0" class="form-control" id="workcarriedout" name="workcarriedout" placeholder=" e.g. 1" value="{!! old('workcarriedout') !!}" >
                                                        {!! $errors->first('workcarriedout', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Type of Work Sub Contracted</td>
                                                 <td colspan="3">
                                                    <div class="form-group {{ $errors->first('typeofworksubcon', 'has-error') }} col-md-9">
                                                        <input type="text" class="form-control" id="typeofworksubcon" name="typeofworksubcon" placeholder=" e.g. Describe type of work sub contracted" value="{!! old('typeofworksubcon') !!}">
                                                        {!! $errors->first('typeofworksubcon', '<span class="help-block">:message</span>') !!}
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
                 <!-- row-->

                 <!-- Project Team -->
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="panel panel-info filterable">
                             <div class="panel-heading clearfix">
                                 <h3 class="panel-title pull-left">
                                      <i class="livicon" data-name="users-add" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                     Management Representative (MR)
                                 </h3>
                                 <div class="pull-right">

                                     <button type="button" class="btn btn-primary btn-sm" id="addButton6">+ Add MR</button>
                                     <button type="button" class="btn btn-danger btn-sm" id="delButton6">Delete</button>
                                 </div>
                             </div>
                             <div class="panel-body">
                                 <div class="table-responsive">
                                     <table class="table" id="tablestd1" width="100%">
                                     <thead>
                                         <tr>
                                             <th>Name</th>
                                             <th>Designation</th>
                                             <th>Email</th>
                                             <th>Signature</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                            <td>
                                                <div class="form-group {{ $errors->first('rep_namestd.0', 'has-error') }}">
                                                    <input type="text" class="form-control" name="rep_namestd[]" placeholder="e.g. David Coolie" value="{!! old('rep_namestd.0') !!}"/>
                                                    {!! $errors->first('rep_namestd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('rep_designationstd.0', 'has-error') }}">
                                                    <input type="text" class="form-control"  name="rep_designationstd[]" placeholder="e.g. tourism" value="{!! old('rep_designationstd.0') !!}"/>
                                                    {!! $errors->first('rep_designationstd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('rep_emailstd.0', 'has-error') }}">
                                                    <input type="text" class="form-control "  name="rep_emailstd[]" placeholder="e.g. mail@mail.com" value="{!! old('rep_emailstd.0') !!}" />
                                                    {!! $errors->first('rep_emailstd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('rep_signaturestd.0', 'has-error') }}">
                                                    <input type="file" class="form-control "  name="rep_signaturestd[]" placeholder="e.g. signature" value="{!! old('rep_signaturestd.0') !!}"/>
                                                    {!! $errors->first('rep_signaturestd.0', '<span class="help-block">:message</span>') !!}
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
                 <!-- end Project team -->

                 <!-- Members -->
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="panel panel-info filterable">
                             <div class="panel-heading clearfix">
                                 <h3 class="panel-title pull-left">
                                      <i class="livicon" data-name="users-add" data-size="24" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                     Member(s)
                                 </h3>
                                 <div class="pull-right">

                                     <button type="button" class="btn btn-primary btn-sm" id="addButton7">+ Add Member</button>
                                     <button type="button" class="btn btn-danger btn-sm" id="delButton7">Delete</button>
                                 </div>
                             </div>
                             <div class="panel-body">
                                 <div class="table-responsive">
                                     <table class="table" id="tablestd2" width="100%">
                                     <thead>
                                         <tr>
                                             <th>Name</th>
                                             <th>Designation</th>
                                             <th>Email</th>
                                             <th>Signature</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                            <td>
                                                <div class="form-group {{ $errors->first('member_namestd.0', 'has-error') }}">
                                                    <input type="text" class="form-control" name="member_namestd[]" placeholder="e.g. David Coolie" value="{!! old('member_namestd.0') !!}"/>
                                                    {!! $errors->first('member_namestd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('member_designationstd.0', 'has-error') }}">
                                                    <input type="text" class="form-control"  name="member_designationstd[]" placeholder="e.g. tourism" value="{!! old('member_designationstd.0') !!}"/>
                                                    {!! $errors->first('member_designationstd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('member_emailstd.0', 'has-error') }}">
                                                    <input type="text" class="form-control "  name="member_emailstd[]" placeholder="e.g. mail@mail.com" value="{!! old('member_emailstd.0') !!}" />
                                                    {!! $errors->first('member_emailstd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('member_signaturestd.0', 'has-error') }}">
                                                    <input type="file" class="form-control "  name="member_signaturestd[]" placeholder="e.g. signature" value="{!! old('member_signaturestd.0') !!}"/>
                                                    {!! $errors->first('member_signaturestd.0', '<span class="help-block">:message</span>') !!}
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
                 <!-- end members -->

                 <!-- Approving manager -->
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="panel panel-info filterable">
                             <div class="panel-heading clearfix">
                                 <h3 class="panel-title pull-left">
                                      <i class="livicon" data-name="users-add" data-size="24" data-loop="true" data-c="#fff" data-hc="white"></i>
                                     Approving Manager
                                 </h3>
                                 <div class="pull-right">

                                     <button type="button" class="btn btn-primary btn-sm" id="addButton8">+ Add Approving Manager</button>
                                     <button type="button" class="btn btn-danger btn-sm" id="delButton8">Delete</button>
                                 </div>
                             </div>
                             <div class="panel-body">
                                 <div class="table-responsive">
                                     <table class="table" id="tablestd3" width="100%">
                                     <thead>
                                         <tr>
                                             <th>Name</th>
                                             <th>Designation</th>
                                             <th>Email</th>
                                             <th>Signature</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                            <td>
                                                <div class="form-group {{ $errors->first('manager_namestd.0', 'has-error') }}">
                                                    <input type="text" class="form-control" name="manager_namestd[]" placeholder="e.g. David Coolie" value="{!! old('manager_namestd.0') !!}"/>
                                                    {!! $errors->first('manager_namestd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('manager_designationstd.0', 'has-error') }}">
                                                    <input type="text" class="form-control"  name="manager_designationstd[]" placeholder="e.g. tourism" value="{!! old('manager_designationstd.0') !!}"/>
                                                    {!! $errors->first('manager_designationstd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('manager_emailstd.0', 'has-error') }}">
                                                    <input type="text" class="form-control "  name="manager_emailstd[]" placeholder="e.g. mail@mail.com" value="{!! old('manager_emailstd.0') !!}" />
                                                    {!! $errors->first('manager_emailstd.0', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group {{ $errors->first('manager_signaturestd.0', 'has-error') }}">
                                                    <input type="file" class="form-control "  name="manager_signaturestd[]" placeholder="e.g. signature" value="{!! old('manager_signaturestd.0') !!}"/>
                                                    {!! $errors->first('manager_signaturestd.0', '<span class="help-block">:message</span>') !!}
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
                 <!-- Approving Manager -->    
             </div>
            </div>
            <!--end of standards-->
             <div id="hidden_fields3">

             </div>

            <!--end of hidden3-->
            
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
    <script type="text/javascript" src="{{ asset('assets/js/pages/table-advanced-backup.js') }}" ></script> <!--for dynamic table population-->
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>

@stop


<!--global js starts-->



<!--global js end-->




