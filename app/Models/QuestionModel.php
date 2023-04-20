<?php

namespace App\Models;
use App\Models\Test;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    use HasFactory;

    protected $fillable = ['title','answer','class','book','chapter','type','priority'];

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'tests_question');
    }
}
