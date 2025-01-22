<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizScore extends Model
{
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'total_questions',
        'last_attempt_at'
    ];

    protected $casts = [
        'last_attempt_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
