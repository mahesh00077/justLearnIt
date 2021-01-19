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
        <li><a href="#">Registered Students Report</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br><br>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Registered Students Report</h3>
            <div class="box-tools pull-right">
                <!-- <a class="btn btn-primary" href="{{url('admin/syllabus/add')}}">Add Syllabus Content For Course</a> -->
            </div>
        </div>
        <div class="box-body">
            <div class="">
                <div class="form-group col-md-6">
                    <h5>Start Date <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose"
                            placeholder="Please select start date">
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <h5>End Date <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose"
                            placeholder="Please select end date">
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="text-left" style="
    margin-left: 15px;
    ">
                    <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
                </div>

                <br>
                <h3 class="box-title">Course Wise Report List</h3>

                <table class="table table-bordered table-striped" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Mobile No</th>
                            <th>Status</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!-- Footer -->
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
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

    var status1 = '',
        $class = '',
        $style = '',
        $title = '';
    $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,

        ajax: {
            url: "{{ url('admin/students/result') }}",
            type: 'GET',
            data: function(d) {
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
            }
        },
        columns: [{
                data: 'uid',
                name: 'uid',
                'visible': false
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'mobile_no',
                name: 'mobile_no'
            },
            {
                data: 'status',
                render: function(data) {
                    if (data == '1')
                        return '<i class="fa fa-toggle-on tgle-on danger" style="color:green" title="Active" aria-hidden="true"></i>'
                    else
                        return '<i class="fa fa-toggle-on fa-rotate-180 tgle-off" style="color:red" title="Inactive" aria-hidden="true"></i>'

                },
                name: 'status'
            },
            {
                data: 'created_at',
                render: function(data) {
                    var date = new Date(data);
                    let mm = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date
                        .getMonth() + 1)));
                    let dd = (date.getDate() > 9) ? date
                        .getDate() : ('0' + date.getDate());
                    let yy = date.getFullYear();
                    return dd + '/' + mm + '/' + yy;
                },
                name: 'created_at'
            },
        ],
        order: [
            [0, 'desc']
        ],

    });

    $('#btnFiterSubmitSearch').click(function() {
        $('#laravel_datatable').DataTable().draw(true);
    });
});
</script>
@endsection