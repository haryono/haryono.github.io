@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
View Company
@parent
@stop

@section('header_styles')
<meta name="_token" content="{!! csrf_token() !!}"/>
<link href="{{ asset('assets/vendors/sweetalert/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css"
      href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}"/>
@stop

@section('content')
{{-- Page content --}}

<section class="content-header">
    <!--section starts-->
    <h1>Company (Client)</h1>
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
        <li class="active">Manage Company (Client)</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <!-- Second Data Table -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="panel panel-success table-edit">
                    <div class="panel-heading clearfix">
                        <div class="panel-title pull-left">
                            <span>
                               <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                           data-hc="white"></i>
                                        Manage Company (Client)
                            </span>
                        </div>
                        <div class="pull-right" >
                            <div class="pull-right">
                            <a href="{{ URL::to('admin/addNewCompany') }}" class="btn btn-sm btn-default">@lang('+ Add New Company')</a>
                            </div>
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
                                        colspan="1" width="15">ID
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                        colspan="1">Company Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                        colspan="1" aria-label="
                                                 Company Serial
                                            : activate to sort column ascending" style="width: 222px;">Company Initial
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                        colspan="1" aria-label="
                                                 UEN
                                            : activate to sort column ascending" style="width: 124px;">Company Reg No
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
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.buttons.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.colReorder.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.colVis.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.html5.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/buttons.print.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/pdfmake.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/js/pages/table-editable.js') }}" ></script>--}}
<script src="{{ asset('assets/vendors/sweetalert/js/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/sweetalert/js/sweetalert-dev.js') }}" type="text/javascript"></script>
<script>
    $( document ).ready(function() {
        $(function () {
            var jobButton;
            var nEditing = null;
            var table = $('#sample_editable_1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.editable_datatables.data') !!}', 
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'company_name', name: 'company_name'},
                    {data: 'company_initial', name: 'company_initial'},
                    {data: 'company_reg_no', name: 'company_reg_no'},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false}
                ],
            });
            table.on('draw', function () {
                $('.livicon').each(function () {
                    $(this).updateLivicon();
                });
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

            var row_id,company_name, company_initial, company_reg_no, status;

            function editRow(table, nRow) {
                var aData = table.row(nRow).data();
                var jqTds = $('>td', nRow);
                row_id = aData.id ? aData.id : '';
                company_name = aData.company_name ? aData.company_name : '';
                company_initial = aData.company_initial ? aData.company_initial : '';
                company_reg_no = aData.company_reg_no ? aData.company_reg_no : '';
                status = aData.status ? aData.status : '';

                jqTds[0].innerHTML = row_id;
                jqTds[1].innerHTML = '<input type="text" name="company_name" id="company_name" class="form-control input-small" value="' + company_name + '">';
                jqTds[2].innerHTML = '<input type="text" name="company_initial" id="company_initial" class="form-control input-small" value="' + company_initial + '">';
                jqTds[3].innerHTML = '<input type="text" name="company_reg_no" id="company_reg_no" class="form-control input-small" value="' + company_reg_no + '">';
                jqTds[4].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[5].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

            

            function saveRow(table, nRow) {
                var jqInputs = $('input', nRow);
                company_name = jqInputs[0].value;
                company_initial = jqInputs[1].value;
                company_reg_no = jqInputs[2].value;

                var tableData = 'company_name=' + encodeURIComponent(company_name) + '&company_initial=' + encodeURIComponent(company_initial) +
                    '&company_reg_no=' + encodeURIComponent(company_reg_no) + '&_token=' + $('meta[name=_token]').attr('content');

                $.ajax({
                    type: "post",
                    url: 'editable_datatables/' + row_id + '/update',
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
                            url: 'editable_datatables/' + id + '/delete',
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
                        url: 'editable_datatables/' + id + '/approve',
                        success: function (result) {
                            console.log(result);
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
