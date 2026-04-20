<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $primaryKey = 'id'; 

    protected $fillable = [
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'suffix_name',
        'gender',
        'birth_date',
        'email',
        'contact_number',
        'course_id'
    ];

    // RELATIONSHIOPS
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
