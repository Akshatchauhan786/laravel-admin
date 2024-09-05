<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class BAIST2018Import implements FromCollection , WithHeadings
{ 

        protected $coursyear;
    
        function __construct($coursyear) {
                $this->coursyear = $coursyear;
        }


    public function headings(): array
    {
        return [
            'Cours Name',
            'Name',
            'Father',
            'Mobile',
            'Address',
            'Balance Fee',
        ];
    }
    /**
    * @param Collection $collection
    */
    public function collection()
    {
        return DB::table('r_student')
        ->leftJoin('students', 'students.id', '=', 'r_student.student_id')
        ->leftJoin('fees', 'fees.student_id', '=', 'students.id')
        ->where('r_student.course_name', '=', $this->coursyear)
        ->select('r_student.course_name','students.student_name','students.father_name','students.mobile_number','students.permanent_address','fees.balance_fee')
        ->get();;
    }
}
