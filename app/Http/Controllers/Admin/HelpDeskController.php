<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session, Response, Redirect;
use App\Model\Admin\Tickets;
use App\Model\Admin\TicketReplies;
use App\helpers;

class HelpDeskController extends Controller
{
    //
    public function index(Request $request)
    {
        $priority_data = DB::table('priority')->get();
        return view('admin.help_desk.help_desk_index', compact('priority_data'));
    }
    public function listTickets(Request $request)
    {
        $uid = Session::get('UID');
        $role = Session::get('UROLE');
        $params = $columns = $totalRecords = $data = array();
        $params = $request;
        $columns = array(
            0 => 'uniq_id',
            1 => 'title',
            2 => 'user_id',
            3 => 'date',
            4 => 'resolved',

        );

        $query = Tickets::select('id', 'uniq_id', 'user_id', 'title', 'init_msg', 'role', 'date', 'last_reply', 'user_read', 'admin_read', 'resolved', 'priority');

        if ($role != '1') {
            $query->where('user_id', $uid);
        }

        if (!empty($params['search']['value'])) {
            $query->where('uniq_id', 'like', '%' . $params['search']['value'] . '%');
        }

        $query->orderBy('id', 'desc')->take(5);
        // $query->orderBy($columns[$params['order'][0]['column']], $params['order'][0]['dir'])->take($params['start'], $params['length']);
        $rs = $query->get();

        $totalRecords = count($rs);
        $i = 1;
        $disbaled = '';
        // if(!isset($_SESSION["admin"])) {
        if (Session::get("UROLE") != '1') {
            $disbaled = 'disabled';
        }
        foreach ($rs as $val) {
            $status = '';
            if ($val->resolved == 0) {
                $status = '<span class="label label-success">Open</span>';
            } else if ($val->resolved == 1) {
                $status = '<span class="label label-danger">Closed</span>';
            }
            $data[] = array(
                "sr_no" => $i,
                'uniq_id' => $val->uniq_id,
                'title' => $val->title,
                'user_id' => userName($val->user_id),
                'date' => date('d-m-Y', strtotime($val->date)) . ' <br>(' . time_elapsed_string($val->date) . ')',
                'priority' => getPriorityName($val->priority),
                'resolved' => $status,
                'action' => '<a href="' . url('admin/view-ticket') . '/' . $val->id . '" class="btn btn-success btn-xs">View Ticket</a>
                <button type="button" name="update" id="' . $val->id . '" class="btn btn-warning btn-xs update" ' . $disbaled . ' data-toggle="modal" data-target="#ticketModal">Edit</button>
                <button type="button" name="delete" id="' . $val->id . '" class="btn btn-danger btn-xs delete"  ' . $disbaled . '>Close</button>',
            );
            $i++;
        }

        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data,
            // "col" => $columns
        );

        echo json_encode($json_data);
    }
    public function addTicket(Request $request)
    {
        // dd($request->all());
        if (empty($request->ticketId)) {

            if (!empty($request->subject) && !empty($request->message)) {
                $date = date('Y-m-d H:i:s');
                // die;
                $uniqid = uniqid();
                $message = strip_tags($request->subject);
                $ticket_data = new Tickets();
                $ticket_data->uniq_id = $uniqid;
                $ticket_data->user_id = Session::get('UID');
                $ticket_data->title = $request->subject;
                $ticket_data->init_msg = $request->message;
                $ticket_data->role = Session::get('UROLE');
                $ticket_data->date = $date;
                $ticket_data->last_reply = Session::get('UID');
                $ticket_data->user_read = 0;
                $ticket_data->admin_read = 0;
                $ticket_data->resolved = $request->status;
                $ticket_data->priority = $request->priority;

                $res = $ticket_data->save();
                if ($res) {

                    echo 'success ' . $uniqid;
                } else {
                    echo 'Failed to create ticket!!';
                }
            } else {
                echo '<div class="alert error">Please fill in all fields.</div>';
            }
        } else {
            $ticket_data = new Tickets();
            $ticket_data = Tickets::find($request->ticketId);
            $ticket_data->title = $request->subject;
            $ticket_data->init_msg = $request->message;
            $ticket_data->priority = $request->priority;
            $ticket_data->resolved = $request->status;
            $res = $ticket_data->update();
            if ($res) {
                echo 'successfully updated ';
            } else {
                echo 'Failed to update ticket!!';
            }
        }
    }
    public function viewTicket($ticket_id = null)
    {
        // echo $ticket_id;
        $ticketDetails = array();
        $tickets = Tickets::where('id', $ticket_id)->get();
        foreach ($tickets as $val) {
            $ticketDetails = array(
                'id' => $val->id,
                'uniq_id' => $val->uniq_id,
                'user_id' => $val->user_id,
                'title' => $val->title,
                'init_msg' => $val->init_msg,
                'role' => $val->role,
                'date' => $val->date,
                'resolved' => $val->resolved,
                'priority' => $val->priority,
                'created_at' => $val->created_at,
            );
        }

        $ticket_reply_data = DB::table('ticket_replies as tr')
            ->select('tr.id', 'tr.text as message', 'tr.date', 'tr.user_id', 'users.username as creater', 'role.role_name', 'role.id as role_id')
            ->leftJoin('tickets as t', 'tr.ticket_id', '=', 't.id')
            ->leftJoin('users', 'tr.user_id', '=', 'users.uid')
            ->leftJoin('role', 'users.role', '=', 'role.id')
            ->where('tr.ticket_id', $ticket_id)
            ->get();
        // dd($ticket_reply_data);
        return view('admin.help_desk.help_desk_reply', compact('ticketDetails', 'ticket_reply_data'));
    }
    public function getTicketDetails(Request $request)
    {
        // dd($request->ticketID);
        $data = array();
        $ticket_details = Tickets::select('id', 'uniq_id', 'user_id', 'title', 'init_msg', 'role', 'date', 'priority', 'resolved')
            ->where('id', $request->ticketId)
            ->get();
        // dd($ticket_details);
        foreach ($ticket_details as $val) {

            $data = array(
                'id' => $val->id,
                'uniq_id' => $val->uniq_id,
                'user_id' => $val->user_id,
                'title' => $val->title,
                'init_msg' => $val->init_msg,
                'user_id' => $val->user_id,
                'date' => ($val->date),
                'priority' => ($val->priority),
                'resolved' => $val->resolved,
            );
        }
        // print_r($data);
        echo json_encode($data);
    }
    public function closeTicket(Request $request)
    {
        $response = array();
        $ticket_data = new Tickets();
        $ticket_data = Tickets::find($request->ticketId);
        $ticket_data->resolved = '1';
        $res = $ticket_data->update();
        // $res = true;
        if ($res) {
            $response = array(
                'success' => true,
                'msg' => 'successfully closed'
            );
        } else {
            $response = array(
                'success' => false,
                'msg' => 'failed!!!'
            );
        }
        echo json_encode($response);
    }
    public function saveTicketReplies(Request $request)
    {
        // dd($request->all());
        $response = array();

        $ticket_data = new Tickets();
        $ticket_data = Tickets::find($request->ticketId);
        $ticket_data->last_reply = Session::get('UID');
        $ticket_data->user_read = '0';
        $ticket_data->admin_read = '0';
        $res = $ticket_data->update();


        $tickt_reply = new TicketReplies();
        $tickt_reply->user_id = Session::get('UID');
        $tickt_reply->text = $request->message;
        $tickt_reply->ticket_id = $request->ticketId;
        $tickt_reply->date = date('Y-m-d H:i:s');
        $res = $tickt_reply->save();
        if ($res) {
            $response = array(
                'success' => true,
                'msg' => 'successfully sent'
            );
        } else {
            $response = array(
                'success' => false,
                'msg' => 'Something Wrong,Try again later..'
            );
        }
        echo json_encode($response);
    }
}