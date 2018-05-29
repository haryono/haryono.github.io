<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Welcome to Haryono Frontend</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/register.css') }}">
    <!--end of page level css-->

</head>
<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX">
            <img src="{{ asset('assets/images/josh-new.png') }}" alt="logo" class="img-responsive mar">
            <h3 class="text-primary">Create New Company Profile</h3>
            <!-- Notifications -->
            <div id="notific">
            @include('notifications')
            </div>
            <form action="{{ route('register') }}" method="POST" id="reg_form">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group {{ $errors->first('client_id', 'has-error') }}">
                    <label class="sr-only"> Client ID</label>
                    <input type="text" class="form-control" id="client_id" name="client_id" placeholder="auto-generated"
                           value="{!! old('client_id') !!}" >
                    {!! $errors->first('client_id', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                    <label class="sr-only"> Company Initial</label>
                    <input type="text" class="form-control" id="company_in" name="company_in" placeholder="e.g. DBS"
                           value="{!! old('company_in') !!}" >
                    {!! $errors->first('company_in', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('company_name', 'has-error') }}">
                    <label class="sr-only"> Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="e.g. premior supremo"
                           value="{!! old('company_name') !!}" >
                    {!! $errors->first('company_name', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('uen', 'has-error') }}">
                    <label class="sr-only"> Company Registration Number</label>
                    <input type="text" class="form-control" id="uen" name="uen" placeholder="Password">
                    {!! $errors->first('uen', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('company_logo', 'has-error') }}">
                    <label class="sr-only"> Company Logo</label>
                    <input type="text" class="form-control" id="Password2" name="company_logo"
                           placeholder="Confirm Password">
                    {!! $errors->first('company_logo', '<span class="help-block">:message</span>') !!}
                </div>

                <!--photo-->
                <div class="form-group {{ $errors->first('pic_file', 'has-error') }}">
                    <label for="pic" class="col-sm-2 control-label">Company Logo</label>
                    <div class="col-sm-10">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                <img src="http://placehold.it/200x200" alt="profile pic">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                            <div>
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input id="pic" name="pic_file" type="file" class="form-control"/>
                                </span>
                                <a href="#" class="btn btn-danger fileinput-exists"
                                   data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                        <span class="help-block">{{ $errors->first('pic_file', ':message') }}</span>
                    </div>
                </div>
                <!--end photo-->    
                <div class="form-group {{ $errors->first('ind', 'has-error') }}">
                    <label class="sr-only"> Industry</label>
                    <select class="form-control">
                        <option>Industry</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                    {!! $errors->first('ind', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('subind', 'has-error') }}">
                    <label class="sr-only"> Sub-Industry</label>
                    <select class="form-control">
                        <option>Sub-Industry</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                    {!! $errors->first('subind', '<span class="help-block">:message</span>') !!}
                </div>

                <!--allow repeat up to 2x for company details-->
                <div class="form-group {{ $errors->first('company_address', 'has-error') }}">
                    <label class="sr-only"> Company Address (Head Office)</label>
                    <input type="text" class="form-control" id="company_address" name="company_address" placeholder="e.g. block 1 raffless road"
                           value="{!! old('company_address') !!}" >
                    {!! $errors->first('company_address', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('Address', 'has-error') }}">
                    <label class="sr-only"> Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" placeholder="e.g. block 1 raffless road"
                           value="{!! old('Address') !!}" >
                    {!! $errors->first('Address', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('postal_code', 'has-error') }}">
                    <label class="sr-only"> Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="e.g. 860898"
                           value="{!! old('postal_code') !!}" >
                    {!! $errors->first('postal_code', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('country', 'has-error') }}">
                    <label class="sr-only"> Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="e.g. Singapore"
                           value="{!! old('country') !!}" >
                    {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                </div>
                <!--allow repeat up to 2x for company details-->

                <!--allow repeat up to 2x for contact person-->

                <div class="form-group {{ $errors->first('name', 'has-error') }}">
                    <label class="sr-only"> Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="e.g. David Coolie"
                           value="{!! old('name') !!}" >
                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('designation', 'has-error') }}">
                    <label class="sr-only"> Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="e.g. admin"
                           value="{!! old('designation') !!}" >
                    {!! $errors->first('designation', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('mobile_no', 'has-error') }}">
                    <label class="sr-only"> Mobile No</label>
                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="e.g. 88888888"
                           value="{!! old('mobile_no') !!}" >
                    {!! $errors->first('mobile_no', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('email', 'has-error') }}">
                    <label class="sr-only"> E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="e.g. email@mail.com"
                           value="{!! old('email') !!}" >
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group {{ $errors->first('telp_no', 'has-error') }}">
                    <label class="sr-only"> Telephone No</label>
                    <input type="text" class="form-control" id="telp_no" name="telp_no" placeholder="e.g. Singapore"
                           value="{!! old('telp_no') !!}" >
                    {!! $errors->first('telp_no', '<span class="help-block">:message</span>') !!}
                </div>
                <!--allow repeat up to 2x for contact person-->

                <!-- section b for sales staff in charge -->
                <!-- row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info filterable">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">
                                     <i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Staff in Charge
                                </h3>
                                <div class="pull-right">

                                    <button type="button" class="btn btn-primary btn-sm" id="addButton">Add row</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="delButton">Delete row</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="table3" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Salesperson Name</th>
                                            <th>Service Type</th>
                                            <th>Commence Date</th>
                                            <th>Expiry Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Jacob</td>
                                            <td>Audit</td>
                                            <td>12/12/2012</td>
                                            <td>18/12/2018</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Coolie</td>
                                            <td>Sales</td>
                                            <td>12/12/2012</td>
                                            <td>18/12/2018</td>
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
                        <div class="panel panel-info filterable">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">
                                     <i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Consultant in Charge
                                </h3>
                                <div class="pull-right">

                                    <button type="button" class="btn btn-primary btn-sm" id="addButton">Add row</button>
                                    <button type="button" class="btn btn-danger btn-sm" id="delButton">Delete row</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="table3" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Salesperson Name</th>
                                            <th>Service Type</th>
                                            <th>Commence Date</th>
                                            <th>Expiry Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Jacob</td>
                                            <td>Audit</td>
                                            <td>12/12/2012</td>
                                            <td>18/12/2018</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Coolie</td>
                                            <td>Sales</td>
                                            <td>12/12/2012</td>
                                            <td>18/12/2018</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- section b for consultant in charge -->

                <!-- section c Services Subcribed-->
                <div class="form-group striped-col">
                    <label class="col-md-3 control-label">Section C:Services Subcribed</label>
                    <div class="col-md-9">
                        <div class="checkbox mar-left5">
                            <label for="form-checkbox1">
                                <input type="checkbox" id="form-checkbox1" name="example-checkbox1" value="option1" class="square-blue"> bizSAFE</label>
                        </div>
                        <div class="checkbox mar-left5">
                            <label for="form-checkbox2">
                                <input type="checkbox" id="form-checkbox2" name="example-checkbox2" value="option2" class="square-blue"> STANDARDS</label>
                        </div>
                        <div class="checkbox mar-left5">
                            <label for="form-checkbox3">
                                <input type="checkbox" id="form-checkbox3" name="example-checkbox3" value="option3" class="square-blue"> OTHERS</label>
                        </div>
                    </div>
                </div>
                <!-- section c Services Subcrubed-->

                <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
                Already have an account? Please <a href="{{ route('login') }}"> Log In</a>
            </form>
        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/register_custom.js') }}"></script>
<!--global js end-->


</body>
</html>
