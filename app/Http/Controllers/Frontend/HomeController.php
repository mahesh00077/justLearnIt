<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        # code...
        $courses_data = $this->courses();
        return view('front_end.home', compact('courses_data'));
    }
    public function courses()
    {
        $course_data = DB::table('course')
            ->select('course_id', 'course_name', 'duration', 'price')
            ->where('status', '1')
            ->get();
        return $course_data;
    }
    public function openCoursePage(Request $request, $id = null)
    {
        // dd($id);
        if ($id == 'all') {
            $course_data = DB::table('course')
                ->select('course.course_id', 'course.overview', 'duration', 'price', 'course.course_name')
                ->where('course.status', '1')
                ->paginate('10');
            return view('front_end.course_all', compact('course_data'));
        } else {
            $course_data = DB::table('course')
                ->select('course.course_id', 'course.overview', 'duration', 'price', 'course.course_name')
                ->where('course.status', '1')
                ->where('course.course_id', $id)
                ->get();
            $syllabus_data = DB::table('syllabus_contents')
                ->select('id', 'title', 'content')
                ->where('status', '1')
                ->where('course_id', $id)
                ->orderBy('id', 'asc')
                ->get();
            /* $schedule_data = DB::table('schedule')
                ->select('schedule_id', 'time_from', 'time_to')
                ->where('status', '1')
                ->orderBy('schedule_id', 'asc')
                ->get(); */
            $schedule_data = DB::table('schedule_class')
                ->select('id', 'schedule_id')
                ->where('schedule_class.status', '1')
                ->where('schedule_class.course_id', $id)
                ->get()->toArray();
            // echo '<pre>';
            // print_r($schedule_data);
            // die;
            // echo '...........<br>';
            $q = array();

            foreach ($schedule_data as $k => $value) {
                $users = DB::table('schedule')
                    ->select('schedule_id', 'time_from', 'time_to')
                    ->whereIn('schedule_id', explode(",", $value->schedule_id))
                    ->get()->toArray();
                foreach ($users as $kk => $v) {

                    $qq = ([
                        'id' => $value->id,
                        'time_from' => $v->time_from,
                        'time_to' => $v->time_to,
                        'schedule_id' => $v->schedule_id,
                    ]);
                    array_push($q, implode(',', $qq));
                }
            }
            $check_enroll = DB::table('registered_course_info')
                // ->select('status as enroll_status')
                ->where('uid', Session::get('UID'))
                ->where('course_id', $id)
                ->count();
            // print_r($check_enroll);
            // die;
            return view('front_end.course_single', compact('course_data', 'syllabus_data', 'q', 'check_enroll'));
        }
    }
}