<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'mentors';
    protected $fillable=[
        'mentor_name',
        'subject'
    ];

    public function classroom(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }

}
