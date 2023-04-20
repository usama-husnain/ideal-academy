<?php

namespace App\Models;
use App\Models\QuestionModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'test', 'class', 'book', 'category','chapter'
    ];


    public function questions()
    {
        return $this->belongsToMany(QuestionModel::class, 'tests_question');
    }
}
