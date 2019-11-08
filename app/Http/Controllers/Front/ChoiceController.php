<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\AnswerOption;
use App\Models\Choice;
use App\Models\Question;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Auth;

class ChoiceController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::user();
        $optionAnswer = AnswerOption::find($request->answer_option_id);
        $query = Question::where('lesson_id', $optionAnswer->question->lesson_id);
        $query->whereDoesntHave('choices', function ($subQuery) use ($user) {
            $subQuery->where('user_id', $user->id);
        });

        $data = $request->all();
        $data['result'] = $optionAnswer->is_correct;
        $data['user_id'] = $user->id;
        Choice::create($data);

        if ($query->count() == config('constants.zero')) {
            UserLesson::updateOrCreate(
                ['user_id' => $user->id, 'lesson_id' => $optionAnswer->question->lesson_id],
                ['status' => config('constants.lesson_status.done')]
            );
        }

        if ($optionAnswer->is_correct == config('constants.result.correct')) {
            Activity::create([
                'user_id' => $user->id,
                'action_type' => config('constants.activity_type.learned'),
                'action_id' => $optionAnswer->question_id,
            ]);
        }

        return redirect()->route('lessons.get-each-question', $request->lesson_id);
    }
}
