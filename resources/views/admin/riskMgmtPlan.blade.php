@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Admin Homepage
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
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
<form action="{#" method="POST" id="reg_form" enctype="multipart/form-data">
    <!-- Container Section Start -->
    <div class="container">
        <!--Content Section Start -->
        <!-- Add new RMP-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading clearfix  ">
                        <div class="panel-title pull-left">
                            <div class="caption">
                                <i class="livicon" data-name="doc-portrait" data-size="24" data-loop="true" data-c="#fff" data-hc="white"></i> Add New Risk Management Plan (RMP)
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered" id="tabletry">
                                <tbody>
                                    <tr>
                                        <td width="30%">WSH&S Policy (Approving Manager)</td>
                                        <td>
                                            <input type="number" class="form-control" id="wsh" name="row-wsh" value="auto insert main approving manager name, but if company has more than 1 RA approving manager then enable drop down menu to select 1 of the options">
                                        </td>                                        

                                    </tr>
                                    <tr>
                                        <th colspan="2"> RA Team Organization Chart
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Approving Manager</td>
                                        <td>
                                            <input type="number" class="form-control" id="appmanager" name="row-wsh" value="auto insert ALL Approving Manager name">
                                        </td>                                        

                                    </tr>
                                    <tr>
                                        <td>RA & SGSecure Representative</td>
                                        <td>
                                            <input type="number" class="form-control" id="rasgsecure" name="row-wsh" value="auto insert ALL RA leader name">
                                        </td>                                        

                                    </tr>
                                    <tr>
                                        <td>RA Member</td>
                                        <td>
                                            <input type="number" class="form-control" id="ramember" name="row-wsh" value="auto insert ALL RA Members name">
                                        </td>                                        

                                    </tr>
                                    <tr>
                                        <th colspan="2">Training Records</th>
                                    </tr>
                                    <tr>
                                        <td>Training Date</td>
                                        <td>
                                            <input type="date" class="form-control datepicker1" name="trainingdate" id="trainingdate"  placeholder="DD/MM/YYYY">
                                        </td>                                        

                                    </tr>
                                    <tr>
                                        <td>Name of Trainer</td>
                                        <td>
                                            <input type="number" class="form-control" id="nameoftrainer" name="row-wsh" value="auto insert the main RA Leader name, BUT if the company has more than 1 RA leader, then enable drop down menu, can select 1 only">
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td>Topic</td>
                                        <td>
                                            <select id="topic" class="form-control">
                                                 <option>WSH&S Policy</option>
                                                 <option>Risk Management Procedures</option>
                                                 <option>Risk Assessment</option>
                                                 <option>Safe Work Procedure</option> 
                                            </select>          
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td>Language</td>
                                        <td>
                                            <select id="language" class="form-control">
                                                 <option>English</option>
                                                 <option>Chinese</option>
                                                 <option>Tamil</option>
                                                 <option>Malay</option>
                                            </select>          
                                        </td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add new RMP-->

        <!-- Add new RMP2-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success filterable">
                    <div class="panel-heading clearfix  ">
                        <div class="panel-title pull-left">
                            <div class="caption">
                                <i class="livicon" data-name="users-add" data-size="24" data-loop="true" data-c="#fff" data-hc="white"></i> Training Participant List
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered" id="tabletry">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>NRIC</th>
                                        <th>Signature</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <input type="number" class="form-control" id="name" name="row-name" value="Name">
                                        </td>
                                        <td> <input type="number" class="form-control" id="nric" name="row-nric" value="Name">
                                        </td>
                                        <td> 
                                            <div class="form-group {{ $errors->first('pic', 'has-error') }}">
                                                <div class="col-md-10">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 200px;">
                                                            @if($user->pic)
                                                                <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="img"
                                                                     class="img-responsive"/>
                                                            @elseif($user->gender === "male")
                                                                <img src="{{ asset('assets/images/authors/avatar3.png') }}" alt="..."
                                                                     class="img-responsive"/>
                                                            @elseif($user->gender === "female")
                                                                <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..."
                                                                     class="img-responsive"/>
                                                            @else
                                                                <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" alt="..."
                                                                     class="img-responsive"/>
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="pic" id="partpic" />
                                                            </span>
                                                            <span class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</span>
                                                        </div>
                                                    </div>
                                                    <span class="help-block">{{ $errors->first('pic', ':message')}}</span>
                                                </div>
                                            </div>                                                   
                                        </td>                                        
                                    </tr>
                                    <tr id="new">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- new 2nd row-->

        <!-- new 3rd row top-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading clearfix  ">
                        <div class="panel-title pull-left">
                            <div class="caption">
                                <i class="livicon" data-name="doc-portrait" data-size="24" data-loop="true" data-c="#fff" data-hc="white"></i> Appointment Letter of Risk Management Team Members
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered" id="tabletry">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Position in Team</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td> RM Champion</td>
                                        <td> <input type="number" class="form-control" id="nameCH" name="row-name" value="auto insert the main RA Leader, BUT if the company has more 1 RA Leader, then enable drop down menu, can select 1 only. Other: *if not inside the list, allow manual key in*">
                                        </td>
                                        <td> <input type="number" class="form-control" id="designCH" name="row-name" value="auto insert the main RA Leader, BUT if the company has more 1 RA Leader, then enable drop down menu, can select 1 only. Other: *if not inside the list, allow manual key in*"> 
                                        </td>                                        
                                    </tr>
                                    <tr id="new champ">
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td> SGSecure Representative</td>
                                        <td> <input type="number" class="form-control" id="naSG" name="row-name" value="auto insert the main RA Leader, but if the company has more than 1 RA Leader, then enable drop down menu, can only select 1 only)Others:*If not inside the list, allow manual key in">
                                        </td>
                                        <td> <input type="number" class="form-control" id="designSG" name="row-name" value="auto insert designation if selected from the RA Leader list, if not, allow manual key in"> 
                                        </td>                                        
                                    </tr>
                                    <tr id="newSGSecRep">
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td> RM Member</td>
                                        <td> <input type="number" class="form-control" id="naRM" name="row-name" value="auto insert the main RA Leader, but if the company has more than 1 RA Leader, then enable drop down menu, can only select 1 only)Others:*If not inside the list, allow manual key in">
                                        </td>
                                        <td> <input type="number" class="form-control" id="designRM" name="row-name" value="auto insert designation if selected from the RA Leader list, if not, allow manual key in"> 
                                        </td>                                        
                                    </tr>
                                    <tr id="newRM">
                                    </tr>
                                </tbody>
                            </table>
                            
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

                        </div>
                    </div>                            
                </div>
            </div>
        </div>
        <!-- //Content Section End -->
    </div>
</form> 
</section>
@stop

{{-- page level scripts --}}

<script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
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