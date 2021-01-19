<?php

use Illuminate\Support\Facades\DB;

function get_schedule_name($arr)
{
    $arr = explode(',', $arr);
    // print_r($arr);
    // die;
    $data = array();
    // foreach ($arr as $val) {
    return $set_schedule_data = DB::table('schedule')
        ->select('schedule.schedule_id', 'schedule.time_from', 'schedule.time_to')
        ->whereIN('schedule.schedule_id', array($arr))
        ->get();
    // print_r($set_schedule_data[0]->time_from);
    // die;
    // array_push($data, $set_schedule_data->time_from);
    // }
    // return $data;
}
function get_time($schedule_ids, $course_id)
{
    $q = array();
    $users = DB::table('schedule')
        ->select('schedule_id', 'time_from', 'time_to')
        ->whereIn('schedule_id', explode(",", $schedule_ids))
        ->get()->toArray();
    foreach ($users as $kk => $v) {
        $qq = ([
            'time_from' => $v->time_from,
            'time_to' => $v->time_to,
            // 'schedule_id' => $v->schedule_id,
        ]);
        array_push($q, implode(',', $qq));
    }
    return $q;
}
function getPriorityName($id)
{
    // $q = array();
    $users = DB::table('priority')
        ->select('priority_name')
        ->where('id', $id)
        ->get();
    // dd($users);
    return $users[0]->priority_name;
}
function userName($id)
{
    // $q = array();
    $users = DB::table('users')
        ->select('username')
        ->where('uid', $id)
        ->get();
    // dd($users);
    return $users[0]->username;
}
function roleName($id)
{
    // $q = array();
    $users = DB::table('role')
        ->select('role_name')
        ->where('id', $id)
        ->get();
    // dd($users);
    return $users[0]->role_name;
}
function time_elapsed_string($datetime, $full = false)
{
    $now = new \DateTime;
    $ago = new \DateTime(@$datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}