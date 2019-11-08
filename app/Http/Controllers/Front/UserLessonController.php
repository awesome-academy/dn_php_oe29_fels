<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\UserLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLessonController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = [
            'user_id' => $user->id,
            'lesson_id' => $request->lesson_id,
            'status' =>config('constants.lesson_status.doing'),
        ];

        UserLesson::firstOrCreate($data);

        return redirect()->route('lessons.get-each-question', $request->lesson_id);
    }
}
