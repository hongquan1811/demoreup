<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'schools';
    protected $fillable =
        [
            'school_name',
            'address'
        ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function scopeSearch($query)
    {
        if ($school_infor = \request()->search) {
            $query = $query->where('school_name', 'LIKE', "%$school_infor%")
                ->orWhere('address', 'LIKE', "%$school_infor%");
        }
        return $query;
    }
}
