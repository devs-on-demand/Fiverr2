@extends('layouts.master')

@section('css')
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary btn-flat pull-right" id="event-adder" data-toggle="modal" data-target="#myModal">ADD EVENT</button>
        </div>
    </div>
    <div class="x-content">
        <p class="text-muted font-13 m-b-30">Description Goes Here...</p>
        <table id="datatable-buttons1" class="table table-striped table-bordered">
            <thead>
                <th>EVENT NAME</th>
                <th>ACTIONS</th>
            </thead>
            <tbody>
                <td>Sample</td>
                <td></td>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add an Event</h4>
                </div>
                <div class="modal-body">
                    <form id="event-adder-form">
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-8 form-group">
                                <label for="id_event_name">Event Name</label>
                                <input type="text" class="form-control" id="id_event_name" name="event_name" placeholder="Enter Event Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-8 form-group">
                                <button type="button" id="id_btn_event_add" class="btn btn-primary btn-flat pull-right">SAVE DETAILS</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $.ajax({
                method:"GET",
                url:"{{route('geteventdetails')}}",
                success:function(data){
                    console.log(data);
                    $("#datatable-buttons1").DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        "aaData":data,
                        "columns":[
                            {"data":"event_name"},
                            {
                                "defaultContent":"<div class='btn-group'><button type='button' class='btn btn-xs btn-danger btn-flat'>Delete</button></div>"
                            }
                        ]
                    });
                },
            });

            $('.btn-danger').on('click',function(){
                alert($(this).attr('id'));
            });

            $("#id_btn_event_add").on('click',function(){
                $.ajax({
                    method:"POST",
                    url:"{{route('addevent')}}",
                    data:{
                        "_token":"{{csrf_token()}}",
                        "event_name":$("#id_event_name").val()
                    },
                    success:function(data){
                        console.log(data);
                    },
                    error:function(){
                        alert("Failed to save details, Please contact Admin");
                    }
                });
            });
        });
    </script>
@endsection