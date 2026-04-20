<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = 'colleges';

    protected $fillable = [
        'college_code',
        'college_name'
    ];

    // one college has many students
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
