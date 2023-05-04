<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id','paid_fee', 'status', 'remarks'
    ];


    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
