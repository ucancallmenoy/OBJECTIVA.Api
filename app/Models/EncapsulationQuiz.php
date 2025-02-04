<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EncapsulationQuiz extends Model
{
    // Specify the table name (if it's different from the default "abstraction_quizzes")
    protected $table = 'encapsulation_quizzes';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'question', 
        'a', 
        'b', 
        'c', 
        'd', 
        'correct', 
        'explanation',
        'code', // Optional, if you are storing code in your database
    ];

    // If you're not using Laravel's default timestamps, you can set this to false
    public $timestamps = true;
}
