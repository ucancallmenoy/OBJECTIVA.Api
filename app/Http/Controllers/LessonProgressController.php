<?php

namespace App\Http\Controllers;

use App\Models\LessonProgress;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LessonProgressController extends Controller  // Make sure this extends Controller
{
    // Remove the constructor with middleware since we're handling it in routes
    
    public function updateProgress(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            $request->validate([
                'lesson_id' => 'required|string',
                'completed' => 'required|boolean'
            ]);

            $progress = LessonProgress::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'lesson_id' => $request->lesson_id
                ],
                [
                    'completed' => $request->completed
                ]
            );

            return response()->json([
                'success' => true,
                'data' => $progress
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getProgress(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            $progress = LessonProgress::where('user_id', $user->id)
                ->get()
                ->pluck('completed', 'lesson_id')
                ->toArray();

            return response()->json([
                'success' => true,
                'data' => $progress
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getProgressAdmin(Request $request)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            
            $progress = LessonProgress::where('user_id', $request->query('user_id'))
                ->get()
                ->pluck('completed', 'lesson_id')
                ->toArray();

            return response()->json([
                'success' => true,
                'data' => $progress
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}