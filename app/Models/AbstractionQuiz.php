<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Auth;

class AbstractionQuiz extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'abstraction_quizzes';

    protected $fillable = [
        'question', 
        'a', 
        'b', 
        'c', 
        'd', 
        'correct', 
        'explanation',
        'code',
        'user_id', // Associate quizzes with users
    ];

    public $timestamps = true;

    /**
     * Define the relationship between AbstractionQuiz and User.
     * Each quiz belongs to a user (creator).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Ensure only admin users can access this model.
     */
    protected static function boot()
    {
        parent::boot();

        static::retrieved(function ($quiz) {
            if (!Auth::check() || !Auth::user()->is_admin) {
                abort(403, 'Unauthorized action.');
            }
        });
    }
}