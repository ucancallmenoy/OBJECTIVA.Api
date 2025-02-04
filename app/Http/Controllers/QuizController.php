<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbstractionQuiz;
use App\Models\PolymorphismQuiz;
use App\Models\InheritanceQuiz;
use App\Models\EncapsulationQuiz;
use App\Models\IntroductionToJavaQuiz;
use App\Models\IntroductionToOopQuiz;
use Illuminate\Http\JsonResponse;


class QuizController extends Controller
{
    public function getAbstractionQuizzes(): JsonResponse
    {
        $quizzes = AbstractionQuiz::all();
        return response()->json($quizzes);
    }

    public function getPolymorphismQuizzes(): JsonResponse
    {
        $quizzes = PolymorphismQuiz::all();
        return response()->json($quizzes);
    }

    public function getInheritanceQuizzes(): JsonResponse
    {
        $quizzes = InheritanceQuiz::all();
        return response()->json($quizzes);
    }

    public function getEncapsulationQuizzes(): JsonResponse
    {
        $quizzes = EncapsulationQuiz::all();
        return response()->json($quizzes);
    }

    public function getIntroductionToJavaQuizzes(): JsonResponse
    {
        $quizzes = IntroductionToJavaQuiz::all();
        return response()->json($quizzes);
    }

    public function getIntroductionToOopQuizzes(): JsonResponse
    {
        $quizzes = IntroductionToOopQuiz::all();
        return response()->json($quizzes);
    }

    /**
     * Get all Abstraction Quizzes with admin access
     */
    public function getAdminAbstractionQuizzes(): JsonResponse
    {
        $quizzes = AbstractionQuiz::all();
        return response()->json($quizzes);
    }

    /**
     * Add a new Abstraction Quiz
     */
    public function addAbstractionQuiz(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string',
            'a' => 'required|string',
            'b' => 'required|string',
            'c' => 'required|string',
            'd' => 'required|string',
            'correct' => 'required|in:a,b,c,d',
            'explanation' => 'nullable|string',
            'code' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $quiz = AbstractionQuiz::create($request->all());

        return response()->json($quiz, 201);
    }

    /**
     * Update an existing Abstraction Quiz
     */
    public function updateAbstractionQuiz(Request $request, $id): JsonResponse
    {
        $quiz = AbstractionQuiz::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'question' => 'sometimes|required|string',
            'a' => 'sometimes|required|string',
            'b' => 'sometimes|required|string',
            'c' => 'sometimes|required|string',
            'd' => 'sometimes|required|string',
            'correct' => 'sometimes|required|in:a,b,c,d',
            'explanation' => 'nullable|string',
            'code' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $quiz->update($request->all());

        return response()->json($quiz);
    }

    /**
     * Delete an Abstraction Quiz
     */
    public function deleteAbstractionQuiz($id): JsonResponse
    {
        $quiz = AbstractionQuiz::findOrFail($id);
        $quiz->delete();

        return response()->json(null, 204);
    }
}