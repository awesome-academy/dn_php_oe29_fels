<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{

    public function getListsByCourse($course_id)
    {
        $user = Auth::user();
        $query = Lesson::where('course_id', $course_id)->has('questions');
        $query->with(['user_lessons' => function ($subQuery) use ($user) {
            $subQuery->where('user_id', $user->id);
        }]);
        $query->with(['choices' => function ($subQuery) use ($user) {
            $subQuery->where('user_id', $user->id);
            $subQuery->where('result', config('constants.result.correct'));
        }]);

        $lessons = $query->get();

        return view('front.lessons.list', compact('lessons'));
    }

    public function getEachQuestion($lesson_id)
    {
        $user = Auth::user();
        $questions = Question::where('lesson_id', $lesson_id);
        $total = $questions->count();

        $unfinishedQuestions = $questions->whereDoesntHave('choices', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        $question = $unfinishedQuestions->first();
        $progress = $unfinishedQuestions->count();

        if (!$question) {

            return redirect()->route('lessons.get-result', $lesson_id);
        }

        return view('front.questions.show', compact('question', 'total', 'progress'));
    }

    public function getResult($lesson_id)
    {
        $user = Auth::user();
        $lesson = Lesson::find($lesson_id);
        $callback = function ($query) use ($user) {
            $query->where('user_id', $user->id);
        };

        $questions = Question::where('lesson_id', $lesson_id);
        $questions->whereHas('choices', $callback)->with(['choices' => $callback]);
        $questions->with(['answer_options' => function ($query) {
            $query->where('is_correct', config('constants.result.correct'));
        }]);
        $questions = $questions->get();

        return view('front.lessons.result', compact('questions', 'lesson'));
    }

    public function getWords($lesson_id)
    {
        $lesson = Lesson::find($lesson_id);

        $questions = Question::where('lesson_id', $lesson_id);
        $questions->with(['answer_options' => function ($query) {
            $query->where('is_correct', config('constants.result.correct'));
        }]);
        $questions = $questions->get();

        return view('front.lessons.list-word', compact('questions', 'lesson'));
    }
}
