@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
Inventory of Risk Implementation Plan
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
    <h1>Inventory of Risk Implementation Plan</h1>
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
        <li class="active">Inventory of Risk Implementation Plan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        <!-- Second Data Table -->
        <form action="{{ route('admin.processRAIP') }}" method="POST" id="reg_form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="panel panel-info table-edit">
                        <div class="panel-heading clearfix">
                            <div class="panel-title pull-left">
                                <span>
                                   <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff"
                                               data-hc="white"></i>
                                           Inventory of Risk Implementation Plan 
                                </span> 
                            </div>
                            <div class="pull-right" >
                                <a href="{{ URL::to('admin/Create_RAIP') }}"  class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
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
                                            colspan="1">Created At
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Process
                                                : activate to sort column ascending" style="width: 222px;">Project Name 
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     Next Review Date
                                                : activate to sort column ascending" style="width: 124px;">View
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     RA Leader
                                                : activate to sort column ascending" style="width: 124px;">Delete
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                            colspan="1" aria-label="
                                                     RA Leader
                                                : activate to sort column ascending" style="width: 124px;">Archive
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
                ajax: '{!! route('admin.raip.datainventory') !!}',
                /*
                ajax: {
                    url:'{!! URL::to('admin/Inv_of_workact/buttonData') !!}',
                        data: function (d) {
                        d.jobButton=jobButton
                    }
                },*/
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'project_name', name: 'project_name'},
                    {data: 'view', name: 'view', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false},
                    {data: 'archive', name: 'archive', orderable: false, searchable: false}
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
             View Functionality "/student-management/student/" + id
             */
            var nRow, aData, id;
            table.on('click', '.view', function (e) {
                e.preventDefault();
                    nRow = $(this).parents('tr')[0];
                    aData = table.row(nRow).data();
                    id = aData.id;
                    url = "RAIP/"+id;
                    $(location).attr("href", url);
            });

            /*
             Delete Functionality
             */
            var nRow, aData, id;
            table.on('click', '.delete', function (e) {
                e.preventDefault();
                nRow = $(this).parents('tr')[0];
                aData = table.row(nRow).data();
                id = aData.id;
                $('#deleteConfirmModal').on('click', '#delete_item', function (e) {
                    $.ajax({
                        type: "get",
                        url: 'RAIP/' + id + '/delete',
                        success: function (result) {
                            console.log('row ' + result + ' deleted');
                            table.draw(false);
                        },
                        error: function (result) {
                            console.log(result)
                        }
                    });
                });
                
            });


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
