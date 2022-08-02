<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable =
        [
            'student_name',
            'school_id',
            'classroom_id',
            'phone',
            'description'
        ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function scopeSearch($query)
    {
        if ($student_infor = \request()->search) {
            $query = $query->where('student_name', 'LIKE', "%$student_infor%")
                ->join('classrooms', 'students.classroom_id', '=',
                    'classrooms.id')
                ->orwhere('classrooms.classroom_name', 'LIKE',
                    "%$student_infor%")
                ->join('schools', 'students.school_id', '=', 'schools.id')
                ->orwhere('schools.school_name', 'LIKE', "%$student_infor%")
                ->orwhere('phone', 'LIKE', "%$student_infor%")
                ->orwhere('description', 'LIKE', "%$student_infor%");
        }
        return $query;
    }
}
