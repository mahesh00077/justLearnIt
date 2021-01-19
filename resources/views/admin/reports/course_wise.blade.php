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
        <li><a href="#">Daily Report</a></li>
        <!-- <li class="active">Blank page</li> -->
    </ol>
</section>
<br><br>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daily Report</h3>
            <div class="box-tools pull-right">
                <!-- <a class="btn btn-primary" href="{{url('admin/syllabus/add')}}">Add Syllabus Content For Course</a> -->
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <h5>Courses<span class="text-danger"></span></h5>
                    <div class="controls">
                        <select name="courseID" class="form-control select22">
                            <!-- <option>Select Course</option> -->
                            <option value="all" selected>All</option>
                            @foreach($c_data as $val)
                            <option value="{{$val->course_id}}">{{$val->course_name}}</option>
                            @endforeach
                        </select>
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <h5>Date <span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="date" name="daily_date" id="daily_date" class="form-control datepicker-autoclose"
                            placeholder="Please select start date">
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>&nbsp;</h5>
                    <div class="text-left" style="margin-left: 15px;">
                        <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </div>



            <br>
            <h3 class="box-title">Daily Report List</h3><br>
            <div class="box-tools pull-right">
                <!-- <a class="btn btn-primary" href="{{url('admin/dailyCourseReportExport')}}">Export</a> -->
                <button class="btn btn-primary export">Export</button>
            </div>

            <table class="table table-bordered table-striped" id="laravel_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Registered Students Count</th>
                        <th>Created at</th>
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
<!-- /.content -->

@endsection
@section('script')
<script>
$(document).ready(function() {
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
    $('#daily_date').val(today);

    $(".select22").select2();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,

        ajax: {
            url: "{{ url('admin/course_wise/Dresult') }}",
            type: 'GET',
            data: function(d) {
                d.daily_date = $('#daily_date').val();
                d.courseID = $('.select22').val();
            }
        },
        columns: [{
                data: 'id',
                name: 'id',
                'visible': false
            },
            {
                data: 'course_name',
                name: 'course_name'
            },
            {
                data: 'uid',
                name: 'uid'
            },
            {
                data: 'created_at',
                render: function(data) {
                    if (data == '' || data == null) {
                        return '-';
                    } else {
                        var date = new Date(data);
                        let mm = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date
                            .getMonth() + 1)));
                        let dd = (date.getDate() > 9) ? date
                            .getDate() : ('0' + date.getDate());
                        let yy = date.getFullYear();
                        return dd + '/' + mm + '/' + yy;
                    }

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

    $('.export').on('click', function() {
        alert('ck');
        /* $.ajax({
            url: "{{ url('admin/dailyCourseReportExport') }}",
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function(d) {
                d.date = $('#daily_date').val();
                d.course_id = $('.select22').val();
            },
            successs: function(response) {
                alert(response);
                console.log(response);
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.setAttribute('download', 'abcd.xlsx');
                document.body.appendChild(link);
                link.click();
            }

        }); */
        var query = {
            date: $('#daily_date').val(),
            course_id: $('.select22').val(),
        }


        var url = "{{URL::to('admin/dailyCourseReportExport')}}?" + $.param(query)

        window.location = url;
    });
});
</script>
@endsection