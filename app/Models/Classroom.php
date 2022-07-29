<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id', 'id');
    }
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id', 'id');
    }
}
