<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    // public $incrementing=false;
    protected $fillable =['name','faculty_id'];

    public function fuculty()
    {
       return $this->belongsTo(Faculty::class,'faculty_id','id');
    }

    public function users()
    {
       return $this->hasMany(User::class,'major_id','id');
    }
    public function courses(){
        return $this->hasMany(Course::class,'major_id','id');

    }

}

