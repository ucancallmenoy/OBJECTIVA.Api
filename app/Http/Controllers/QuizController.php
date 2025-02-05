<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\AbstractionQuiz;
use App\Models\PolymorphismQuiz;
use App\Models\InheritanceQuiz;
use App\Models\EncapsulationQuiz;
use App\Models\IntroductionToJavaQuiz;
use App\Models\IntroductionToOopQuiz;

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
    
    private $models = [
        'abstraction' => AbstractionQuiz::class,
        'polymorphism' => PolymorphismQuiz::class,
        'inheritance' => InheritanceQuiz::class,
        'encapsulation' => EncapsulationQuiz::class,
        'introductionToJava' => IntroductionToJavaQuiz::class,
        'introductionToOop' => IntroductionToOopQuiz::class,
    ];

    public function getQuizzes($type): JsonResponse
    {
        if (!isset($this->models[$type])) {
            return response()->json(['error' => 'Invalid quiz type'], 400);
        }
        return response()->json($this->models[$type]::all());
    }

    public function addQuiz(Request $request, $type): JsonResponse
    {
        if (!isset($this->models[$type])) {
            return response()->json(['error' => 'Invalid quiz type'], 400);
        }
        $quiz = $this->models[$type]::create($request->all());
        return response()->json($quiz, 201);
    }

    public function updateQuiz(Request $request, $type, $id): JsonResponse
    {
        if (!isset($this->models[$type])) {
            return response()->json(['error' => 'Invalid quiz type'], 400);
        }
        $quiz = $this->models[$type]::find($id);
        if (!$quiz) {
            return response()->json(['error' => 'Quiz not found'], 404);
        }
        $quiz->update($request->all());
        return response()->json($quiz);
    }

    public function deleteQuiz($type, $id): JsonResponse
    {
        if (!isset($this->models[$type])) {
            return response()->json(['error' => 'Invalid quiz type'], 400);
        }
        $quiz = $this->models[$type]::find($id);
        if (!$quiz) {
            return response()->json(['error' => 'Quiz not found'], 404);
        }
        $quiz->delete();
        return response()->json(['message' => 'Quiz deleted successfully']);
    }
}
