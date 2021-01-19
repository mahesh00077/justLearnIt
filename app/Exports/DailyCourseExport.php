<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class DailyCourseExport implements FromCollection, WithHeadings
{
    protected $course_id;
    protected $date;

    function __construct($course_id, $date)
    {
        $this->course_id = $course_id;
        $this->date = $date;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        $daily_date = $this->date;
        $courseID = $this->course_id;

        $postsQuery = DB::table('registered_course_info as rci');

        if ($daily_date) {

            $daily_date = date('Y-m-d', strtotime($daily_date));
            $postsQuery->whereRaw("date(rci.created_at) = '" . $daily_date . "' ");
        }
        if ($courseID != 'all') {
            $postsQuery->where('rci.course_id', $courseID);
            $postsQuery->orWhere('course.course_id', $courseID);
        }

        return $postsQuery->selectRaw('course.course_name,count(uid) as uid,rci.created_at')->groupBy('rci.course_id')
            ->rightJoin('course', 'rci.course_id', '=', 'course.course_id')
            ->get();
    }
    public function headings(): array
    {
        return [
            'Course Name',
            'Registered Students count',
            'Date',
        ];
    }
}