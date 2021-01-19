<?php

namespace App\Exports;

// use App\course;
use App\Model\Admin\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Course::select('course_id', 'course_name', 'duration', 'price')->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'course name',
            'Duration',
            'Price',
        ];
    }
}