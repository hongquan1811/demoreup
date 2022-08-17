<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $table = 'schools';
    protected $fillable = [
        'school_name',
        'address'
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
