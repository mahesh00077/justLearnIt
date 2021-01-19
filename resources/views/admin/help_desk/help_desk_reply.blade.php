@extends('admin.app')

@section('main-content')

<!-- Content Header (Page header) -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Help Desk </a></li>
        <!-- <li class="active">Editors</li> -->
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- DIRECT CHAT PRIMARY -->
            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">Chat</h3> -->
                    <?php if ($ticketDetails['resolved']) { ?>
                    <button type="button" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-eye-close"></span> Closed
                    </button>
                    <?php } else { ?>
                    <button type="button" class="btn btn-success btn-sm">
                        <span class="glyphicon glyphicon-eye-open"></span> Open
                    </button>
                    <?php } ?>
                    <span class="ticket-title"><?php echo $ticketDetails['title']; ?></span>
                    <!-- <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="" class="badge bg-light-blue"
                            data-original-title="3 New Messages">3</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title=""
                            data-widget="chat-pane-toggle" data-original-title="Contacts">
                            <i class="fa fa-comments"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                    </div> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" style="height: 350px !important;">

                        <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span
                                    class="direct-chat-timestamp pull-right"><?php echo time_elapsed_string($ticketDetails['date']); ?></span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <!-- <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"> -->
                            <span
                                class="direct-chat-img direct-chat-name"><?php echo userName($ticketDetails['user_id']); ?></span>
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <?php echo $ticketDetails['init_msg']; ?>
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                        @if($ticket_reply_data)
                        @foreach($ticket_reply_data as $val)

                        @if($val->role_id=='1')
                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span
                                    class="direct-chat-timestamp pull-left"><?php echo time_elapsed_string($val->date); ?></span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <span class="direct-chat-img direct-chat-name"><?php echo userName($val->user_id); ?></span>
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <?php echo $val->message; ?>
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        @elseif($val->role_id=='3')
                        <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                                <span
                                    class="direct-chat-timestamp pull-right"><?php echo time_elapsed_string($val->date); ?></span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <span class="direct-chat-img direct-chat-name"><?php echo userName($val->user_id); ?></span>
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <?php echo $val->message; ?>
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                        @endif

                        @endforeach
                        @endif

                    </div>
                    <!--/.direct-chat-messages-->


                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <?php if ($ticketDetails['resolved']) {
                } else { ?>
                <div class="box-footer">
                    <form id="ticketReply" method="post">
                        <div class="input-group">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" name="reply" id="reply"
                                    class="btn btn-primary btn-flat">Send</button>
                            </span>
                            <input type="hidden" name="ticketId" id="ticketId"
                                value="<?php echo $ticketDetails['id']; ?>" />
                        </div>
                    </form>
                </div>
                <?php } ?>
                <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
        </div>
    </div>

</section>
<!-- /.content -->


@endsection

@section('script')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('submit', '#ticketReply', function(event) {
    event.preventDefault();
    $('#reply').attr('disabled', 'disabled');
    var formData = $(this).serialize();
    $.ajax({
        url: "{{url('admin/helpdesk/saveTicketReplies')}}",
        method: "POST",
        data: formData,
        success: function(data) {
            console.log(data);
            $('#ticketReply')[0].reset();
            $('#reply').attr('disabled', false);
            location.reload();
        }
    })
});
</script>
@endsection