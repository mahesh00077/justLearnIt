<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class WeeklyCourseExport implements FromCollection, WithHeadings
{
    protected $course_id;
    protected $start_date;
    protected $end_date;

    function __construct($course_id, $start_date, $end_date)
    {
        $this->course_id = $course_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $start_date = $this->start_date ? $this->start_date : '';
        $end_date = $this->end_date ? $this->end_date : '';
        $courseID = $this->course_id ? $this->course_id : '';

        $postsQuery = DB::table('registered_course_info as rci');

        if ($start_date && $end_date) {

            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));

            $postsQuery->whereRaw("date(rci.created_at) >= '" . $start_date . "' AND date(rci.created_at) <= '" . $end_date . "'");
        }

        if ($courseID != 'all') {
            $postsQuery->where('rci.course_id', $courseID);
            $postsQuery->orWhere('course.course_id', $courseID);
        }

        // $postsQuery->where('rci.status', '1');
        return $res = $course_wise_data = $postsQuery->selectRaw('course.course_name,count(uid) as uid,rci.created_at')->groupBy('course.course_id')
            ->rightJoin('course', 'rci.course_id', '=', 'course.course_id')
            ->get();

        /* $i = 1;
        $custom_array = [];
        foreach ($res as $value) {
            $custom_array[] = array(
                'sr_no' => $i,
                'course_name' => $value->course_name ? $value->course_name : '-',
                'uid' => $value->uid ? $value->uid : 0,
                'created_at' => $value->created_at ? $value->created_at : '-',
            );
            $i++;
        }
        return (object)$custom_array; */
    }
    public function headings(): array
    {
        return [
            'Sr.No',
            'Course Name',
            'Registered Students count',
            'Date',
        ];
    }
}