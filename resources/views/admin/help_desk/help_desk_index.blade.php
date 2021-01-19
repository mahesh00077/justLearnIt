@extends('admin.app')


@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <!-- <h1>
        Users Page
        <small>it all starts here</small>
    </h1> -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Help Desk</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br><br>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block pull-right" style="position: relative;z-index: inherit;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block pull-right" style="position: relative;z-index: inherit;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<br>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            @if(Session::get('UROLE') != '1')
            <h3 class="box-title">View and manage your tickets</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ticketModal">
                    Create Ticket
                </button>
            </div>
            @else
            <h3 class="box-title">View and manage tickets that may have responses from support team</h3>
            @endif

        </div>
        <div class="box-body">
            <!-- Start creating your amazing application! -->
            <table id="listTickets" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width="10%" class="text-center">Sr.No</th>
                        <th width="20%" class="text-center">Ticket ID</th>
                        <th width="20%" class="text-center">Subject</th>
                        <th width="20%" class="text-center">Created By</th>
                        <th width="20%" class="text-center">Created Date</th>
                        <th width="10%" class="text-center">Priority</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>

            </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!-- Footer -->
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="ticketForm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title add-h4" style="display: none;"><i class="fa fa-plus"></i> Add Ticket</h4>
                    <h4 class="modal-title edit-h4" style="display: none;"><i class="fa fa-edit"></i> Edit Ticket</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group" <label for="subject" class="control-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="control-label">Message</label>
                        <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="priority" class="control-label">Priority</label>
                        <select class="form-control" id="priority" name="priority">
                            <option>Select Priority</option>
                            @foreach($priority_data as $pval)
                            <option value="{{$pval->id}}">{{$pval->priority_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status" class="control-label">Status</label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="open" value="0" checked required>Open
                        </label>
                        @if(Session::get('UROLE')=="1")
                        <label class="radio-inline">
                            <input type="radio" name="status" id="close" value="1" required>Close
                        </label>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ticketId" id="ticketId" />
                    <input type="hidden" name="action" id="action" value="" />
                    <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /.content -->

@endsection
@section('script')

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var ticketData = $('#listTickets').DataTable({
        "lengthChange": false,
        "processing": true,
        "serverSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "order": [],
        "ajax": {
            url: "{{url('admin/helpdesk/listTickets')}}",
            type: "POST",
            dataType: "json"
        },
        "columns": [{
                "data": "sr_no",
                name: 'sr_no'
            },
            {
                "data": "uniq_id",
                name: 'uniq_id'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'user_id',
                name: 'user_id'
            }, {
                data: 'date',
                name: 'date'
            },
            {
                data: 'priority',
                /* render: function(data) {
                    console.log(data);
                }, */
                name: 'priority'
            }, {
                data: 'resolved',
                name: 'resolved'
            },
            {
                data: 'action',
                name: 'action'
            },

        ],
        /* "fnRowCallback": function(nRow, aData, iDisplayIndex) {
            var index = iDisplayIndex + 1;
            $('td:eq(0)', nRow).html(index);
            return nRow
        }, */
        /*  "columnDefs": [{
             "targets": [0, 1, 2, 3, 4],
             // "orderable": false,
         }, ], */
        "pageLength": 10
    });


    // Modal Submit
    $('#ticketForm').on('submit', function(event) {
        alert("sd");
        $('.edit-h4').css('display', 'none');
        $('.add-h4').css('display', 'block');
        event.preventDefault();
        $('#save').attr('disabled', 'disabled');
        var formData = $(this).serialize();
        $.ajax({
            url: "{{url('user/helpdesk/add_ticket')}}",
            method: "POST",
            data: formData,
            success: function(data) {
                $('#ticketForm')[0].reset();
                $('#save').attr('disabled', false);
                ticketData.ajax.reload();
                $('#ticketModal').modal('hide');
            }
        })
    });

    // Modal edit
    $(document).on('click', '.update', function() {
        $('.edit-h4').css('display', 'block');
        $('.add-h4').css('display', 'none');
        var ticketId = $(this).attr("id");
        alert(ticketId);
        // var action = 'getTicketDetails';
        $.ajax({
            url: "{{url('admin/heldesk/getTicketDetails')}}",
            method: "POST",
            data: {
                ticketId: ticketId,
                // action: action
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                // $('#ticketModal').modal('show');
                $('#ticketId').val(data.id);
                $('#subject').val(data.title);
                $('#message').val(data.init_msg);
                $('#priority').val(data.priority).trigger('change');
                if (data.gender == '0') {
                    $('#open').prop("checked", true);
                } else if (data.gender == '1') {
                    $('#close').prop("checked", true);
                }
                // $('.modal-title').html("<i class='fa fa-plus'></i> Edit Ticket");
                $('#action').val('updateTicket');
                $('#save').val('Save Ticket');
            }
        });
    });

    // close buton
    $(document).on('click', '.delete', function() {

        var ticketId = $(this).attr("id");
        // alert(ticketId);
        $.ajax({
            url: "{{url('admin/heldesk/closeTicket')}}",
            method: "POST",
            data: {
                ticketId: ticketId,
            },
            dataType: "json",
            success: function(data) {
                console.log(data.msg);
                if (data.success == true) {
                    alert(data.msg);
                } else {
                    alert(data.msg);
                }
                ticketData.ajax.reload();

            }
        });
    });

});
</script>
@endsection