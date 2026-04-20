<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'college_id',
        'course_code',
        'course_name'
    ];

    // each course belongs to a college
    public function college()
    {
        return $this->belongsTo(College::class);
    }

    // one course has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
