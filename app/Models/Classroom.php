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
}
