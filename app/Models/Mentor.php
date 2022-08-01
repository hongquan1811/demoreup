<?php

namespace App\Models;

use     Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected  $table = 'mentors';
    protected $fillable
        = [
            'mentor_name',
            'subject'
        ];

    public function classroom()
    {
        return $this->hasMany(Classroom::class);
    }
}
