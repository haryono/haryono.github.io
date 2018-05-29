@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
Create Risk Assessment Implementation Plan
@parent
@stop

@section('header_styles')
<meta name="_token" content="{!! csrf_token() !!}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}"/>
<link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
{{-- Page content --}}

<section class="content-header">
    <!--section starts-->
    <h1>Create Risk Assessment Implementation Plan</h1>
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
        <li class="active">Create Risk Assessment Implementation Plan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <!-- Second Data Table -->
        <form action="{{ route('admin.processRAIP') }}" method="POST" id="reg_form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="panel panel-primary table-edit">
                        <div class="panel-heading clearfix">
                            <div class="panel-title pull-left">
                                <span>
                                   <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                               data-hc="white"></i>
                                           Create Risk Assessment Implementation Plan
                                </span> 
                            </div>
                        </div>
                        <div class="panel-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <div id="sample_editable_1_wrapper" class="">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTable no-footer sample_editable"
                                       id="sample_editable_1" role="grid" width="100%">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1">ID
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1">Risk Location
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Process
                                                : activate to sort column ascending" style="width: 222px;">Process
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Next Review Date
                                                : activate to sort column ascending" style="width: 124px;">Next Review Date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     RA Leader
                                                : activate to sort column ascending" style="width: 124px;">RA Leader
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Approving Manager
                                                : activate to sort column ascending" style="width: 124px;">Approving Manager
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Status
                                                : activate to sort column ascending" style="width: 152px;">Status
                                        </th>
                                        <th tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Select
                                                : activate to sort column ascending" style="width: 125px;">Select
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="rocket" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Create New Risk Assessment Implementation Plan from the selected Risk Process
                            </h3>
                                    <span class="pull-right">
                                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                        <i class="glyphicon glyphicon glyphicon-remove removepanel clickable"></i>
                                    </span>
                        </div>
                        <div class="panel-body">
                            <div class="row text-center">
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                    Create Risk Assessment Implementation Plan based on the selected Risk Process
                                </button>
                                <input class="btn btn-danger btn-lg" type="reset" />
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close resetModal" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">Create new Risk Assessment Implementation Plan</h4>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="project_name" id="project_name" class="form-control input-md" placeholder="Project Name" tabindex="3" data-error="Project name must be entered" required>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="margin-top">
                                                                By clicking on the
                                                                <strong class="label label-primary">Submit</strong> , you agree the following
                                                                <a href="#">Terms and Conditions</a>
                                                                liability as set out in this site, including our Cookie Use.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row marginTop">
                                                        <div class="col-xs-12 col-md-12">
                                                            <input type="submit" id="btncheck" value="Submit" class="btn btn-primary btn-block btn-md btn-responsive" tabindex="7">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
	<!-- content -->
	<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Delete Item</h4>
	            </div>
	            <div class="modal-body">
	                <p>Are you sure to delete?</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-danger" id="delete_item" data-dismiss="modal">Delete
	                </button>
	            </div>
	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
	<div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Edit Confirm</h4>
	            </div>
	            <div class="modal-body">
	                <p>You are already editing a row, you must save or cancel that row before editing/deleting a new
	                    row</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            </div>
	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>
	<div class="modal fade" id="saveConfirmModal" tabindex="-1" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title">Save Row</h4>
	            </div>
	            <div class="modal-body">
	                <p>Updated successfully, Do not forget to do some ajax to sync with backend.</p>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            </div>
	        </div>
	        <!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
	</div>


@stop

@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
<script>
    $( document ).ready(function() {
        $(function () {
            var jobButton;
            var nEditing = null;
            var table = $('#sample_editable_1').DataTable({
                processing: true,
                serverSide: true,
                paging: false,
                ajax: '{!! route('admin.craip.data') !!}',
                /*
                ajax: {
                    url:'{!! URL::to('admin/Inv_of_workact/buttonData') !!}',
                        data: function (d) {
                        d.jobButton=jobButton
                    }
                },*/
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'risklocation', name: 'risklocation'},
                    {data: 'riskprocess', name: 'riskprocess'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'riskleader', name: 'riskleader'},
                    {data: 'approvingmanager', name: 'approvingmanager'},
                    {data: 'status', name: 'status'},
                    {data: 'select', name: 'select[]',orderable: false, searchable: false}
                ],
            });
            $('#sample_editable_1 tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            function restoreRow(table, nRow) {
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    table.cell().data(aData[i], nRow, i, false);
                }
                table.draw(false);
            }

            /*
             Edit functionality
             */

            var id,risklocation, riskprocess, updated_at,riskleader,approvingmanager,status;


            /*
             select Functionality, populate value upon checked
             */
            var chkRow, chkData, chk_id;
            table.on('click', '.select:checked', function (e) {
                nRow = $(this).parents('tr')[0];
                chkData = table.row(nRow).data();
                chk_id = chkData.id ? chkData.id : '';
                $(this).val(chk_id);
            });

            //example - unusued
            function getValueUsingClass(){
                /* declare an checkbox array */
                var chkArray = [];
                
                /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
                $(".chk:checked").each(function() {
                    chkArray.push($(this).val());
                });
                
                /* we join the array separated by the comma */
                var selected;
                selected = chkArray.join(',') ;
                
                /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
                if(selected.length > 0){
                    alert("You have selected " + selected); 
                }else{
                    alert("Please at least check one of the checkbox"); 
                }
            }
        });
    });
</script>

@stop
