<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classrooms';
    protected $fillable
        = [
            'classroom_name',
            'mentor_id',
            'roof'
        ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function scopeSearch($query)
    {
        if ($classroom_infor = \request()->search) {
            $query = $query->where('classroom_name', 'LIKE',
                "%$classroom_infor%")
                ->join('mentors', 'classrooms.mentor_id', '=', 'mentors.id')
                ->orwhere('mentors.mentor_name', 'LIKE', "%$classroom_infor%")
                ->orwhere('roof', 'LIKE', "%$classroom_infor%");
        }

        return $query;
    }
}
