@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
Risk Assessment
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
    <h1>Risk Assessment</h1>
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
        <li class="active">Risk Assessment</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <!-- Second Data Table -->
        <form action="{{ route('admin.processRA') }}" method="POST" id="reg_form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="panel panel-info table-edit">
                        <div class="panel-heading clearfix">
                            <div class="panel-title pull-left">
                                <span>
                                   <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                               data-hc="white"></i>
                                           Risk Assessment
                                </span> 
                            </div>
                            <div class="pull-right" data-toggle="buttons">
                                &nbsp;&nbsp;
                                <label class="btn btn-warning tag"  id="pending">
                                    <input type="radio" name="tags" value="button1" id="pending" autocomplete="off" data-value="pending"> Pending
                                </label>
                                <label class="btn btn-success tag"  id="approved">
                                    <input type="radio" name="tags" value="button2" id="approved" autocomplete="off" data-value="approved"> Approved
                                </label>
                                <label class="btn btn-danger tag"  id="rejected">
                                    <input type="radio" name="tags" value="button3" id="rejected" autocomplete="off" data-value="rejected"> Rejected
                                </label>
                            </div>
                            <div class="pull-right">
                                <a href="{{ URL::to('newRA') }}">
                                    <label class="btn btn-default tag"  id="pending">Add New Risk Assessment 
                                    </label>
                                </a>
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
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     To Approve
                                                : activate to sort column ascending" style="width: 152px;">To approve
                                        </th>
                                        <th  tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Edit
                                                : activate to sort column ascending" style="width: 88px;">Edit
                                        </th>
                                        <th tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Delete
                                                : activate to sort column ascending" style="width: 125px;">Delete
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
                ajax: {
                    url:'{!! URL::to('admin/Riskassessment/buttonData') !!}',
                        data: function (d) {
                        d.jobButton=jobButton
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'risklocation', name: 'risklocation'},
                    {data: 'riskprocess', name: 'riskprocess'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'riskleader', name: 'riskleader'},
                    {data: 'approvingmanager', name: 'approvingmanager'},
                    {data: 'status', name: 'status'},
                    {data: 'toapprove', name: 'toapprove', orderable: false, searchable: false},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false}
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
            } );
         
            $('#button').click( function () {
                table.row('.selected').remove().draw( false );
            } );
            table.on('draw', function () {
                $('.livicon').each(function () {
                    $(this).updateLivicon();
                });
            });
            $('#pending').click(function () {
                jobButton='pending';
                table.draw();
            });
            $('#approved').click(function () {
                jobButton='approved';
                table.draw();
            });
            $('#rejected').click(function () {
                jobButton= 'rejected';
                table.draw();
            });
            $('#all').click(function () {
                jobButton= null;
                table.draw();
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

            function editRow(table, nRow) {
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);
                row_id = aData.id ? aData.id : '';
                risklocation = aData.risklocation ? aData.risklocation : '';
                riskprocess = aData.riskprocess ? aData.riskprocess : '';
                updated_at = aData.updated_at ? aData.updated_at : '';
                riskleader = aData.riskleader ? aData.riskleader : '';
                approvingmanager = aData.approvingmanager ? aData.approvingmanager : '';
                status = aData.status ? aData.status : '';

                jqTds[0].innerHTML = row_id;
                jqTds[1].innerHTML = '<input type="text" name="risklocation" id="risklocation" class="form-control input-small" value="' + risklocation + '">';
                jqTds[2].innerHTML = '<input type="text" name="riskprocess" id="riskprocess" class="form-control input-small" value="' + riskprocess + '">';
                jqTds[3].innerHTML = '<input type="text" name="updated_at" id="updated_at" class="form-control input-small" value="' + updated_at + '">';
                jqTds[4].innerHTML = '<input type="text" name="riskleader" id="riskleader" class="form-control input-small" value="' + riskleader + '">';
                jqTds[5].innerHTML = '<input type="text" name="approvingmanager" id="approvingmanager" class="form-control input-small" value="' + approvingmanager + '">';
                jqTds[6].innerHTML = '<input type="text" name="status" id="status" class="form-control input-small" value="' + status + '">';
                jqTds[7].innerHTML = '';
                jqTds[8].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[9].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

          

            function saveRow(table, nRow) {
                var jqInputs = $('input', nRow);
                risklocation = jqInputs[0].value;
                riskprocess = jqInputs[1].value;
                updated_at = jqInputs[2].value;
                riskleader = jqInputs[3].value;
                approvingmanager = jqInputs[4].value;
                status = jqInputs[5].value;

                var tableData = 'risklocation=' + encodeURIComponent(risklocation) + '&riskprocess=' + encodeURIComponent(riskprocess) + '&updated_at=' + encodeURIComponent(updated_at) + '&riskleader=' + encodeURIComponent(riskleader) + '&approvingmanager=' + encodeURIComponent(approvingmanager) + '&status=' +encodeURIComponent(status) + '&_token=' + $('meta[name=_token]').attr('content');

                $.ajax({
                    type: "post",
                    url: 'Riskassessment/' + row_id + '/update',
                    data: tableData,
                    success: function (result) {
                        if(result!='success') {
                            console.log(result);
                            swal("There is some error!", result);
                            editRow(table, nRow);
                            nEditing = nRow;
                        }
                        else {
                            table.draw(false);
                        }
                    },
                    error: function (result) {
                        if (result.status = 442)


                        console.log( result.responseText.errors);

                    }

                });

            }

            /*
             Cancel Edit functionality
             */

            function cancelEditRow(table, nRow) {
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    table.cell().data(aData[i], nRow, i, false);
                }

                table.draw(false);
            }

            /*
             Delete Functionality
             */
            var nRow, aData, id;
            table.on('click', '.delete', function (e) {
                e.preventDefault();
                nRow = $(this).parents('tr')[0];
                aData = table.row(nRow).data();
                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    $('#editConfirmModal').modal();
                    $('#deleteConfirmModal').modal().hide();
                }
                else {
                    id = aData.id;
                    $('#deleteConfirmModal').on('click', '#delete_item', function (e) {
                        $.ajax({
                            type: "get",
                            url: 'Riskassessment/' + id + '/delete',
                            success: function (result) {
                                console.log('row ' + result + ' deleted');
                                table.draw(false);
                            },
                            error: function (result) {
                                console.log(result)
                            }
                        });
                    });
                }
            });


            /*
             approve Functionality
             */
            var nRow, aData, id;
            table.on('click', '.toapprove', function (e) {
                e.preventDefault();
                nRow = $(this).parents('tr')[0];
                aData = table.row(nRow).data();
                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    $('#editConfirmModal').modal();
                }
                else {                    
                    id = aData.id;
                    $.ajax({
                        type: "get",
                        url: 'Riskassessment/' + id + '/approve',
                        success: function (result) {
                            swal("Success", result);
                            table.draw(false);
                        },
                        error: function (result) {
                            console.log(result)
                        }
                    });
                }
            });

            /*
             When clicked on cancel button
             */
            table.on('click', '.cancel', function (e) {
                e.preventDefault();

                restoreRow(table, nEditing);
                nEditing = null;

            });

            /*
             When clicked on edit button
             */

            table.on('click', '.edit', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];
                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    $('#editConfirmModal').modal();

                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(table, nEditing);
                    nEditing = null;

                } else {
                    /* No edit in progress - let's start one */
                    editRow(table, nRow);
                    nEditing = nRow;
                }
            });
        });
        setTimeout(function(){
            $('input[type=search], th, #sample_editable_1_length select').on('mousedown',function(){
                $('.cancel').click();
            });
            $('#sample_editable_1').on( 'page.dt', function () {
                $('.cancel').click();
            } );
            },10);
    });


</script>

@stop
