<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'school', 'class','roll', 'phone','fee'
    ];

    public function fee()
    {
        return $this->hasOne('App\Models\Fee');
    }
}
