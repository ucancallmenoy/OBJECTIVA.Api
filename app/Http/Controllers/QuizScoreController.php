<?php

namespace App\Http\Controllers;

use App\Models\QuizScore;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class QuizScoreController extends Controller
{
    public function getScores()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            $scores = QuizScore::where('user_id', $user->id)
                ->get()
                ->keyBy('quiz_id');

            return response()->json([
                'success' => true,
                'data' => $scores
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getCurrentScore($quizId)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            $score = QuizScore::where('user_id', $user->id)
                ->where('quiz_id', $quizId)
                ->first();

            return response()->json([
                'success' => true,
                'data' => $score ? $score->score : null
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function saveScore(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            $request->validate([
                'quiz_id' => 'required|string',
                'score' => 'required|integer',
                'total_questions' => 'required|integer'
            ]);

            $score = QuizScore::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'quiz_id' => $request->quiz_id
                ],
                [
                    'score' => $request->score,
                    'total_questions' => $request->total_questions,
                    'last_attempt_at' => now()
                ]
            );

            return response()->json([
                'success' => true,
                'data' => $score
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}