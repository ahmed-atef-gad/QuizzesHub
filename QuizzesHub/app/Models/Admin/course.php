<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    // public $incrementing=false;
    use SoftDeletes;
    protected $fillable =['name','code'];

    public function exams()
    {
       return $this->hasMany(Exam::class,'course_id','id');
    }


    public function faculties()
    {
        return $this->belongsToMany(Faculty::class, 'course_faculty_major_university', 'course_id', 'faculty_id')->withPivot('degree','major_id')->orderBy('degree','desc');
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class, 'course_faculty_major_university', 'course_id', 'major_id')->withPivot('degree','faculty_id')->orderBy('degree','desc');
    }

    // In Course model
public function courseFacultyMajorUniversity()
{
    return $this->hasMany(CourseFacultyMajorUniversity::class, 'course_id', 'id');
}

}
