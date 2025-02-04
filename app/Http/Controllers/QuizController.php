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
}