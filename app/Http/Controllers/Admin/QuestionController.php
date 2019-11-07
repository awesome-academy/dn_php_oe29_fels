<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\StoreQuestionRequest;
use App\Http\Requests\Question\UpdateQuestionRequest;
use App\Models\AnswerOption;
use App\Models\Lesson;
use App\Models\Question;
use Cassandra\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('answers_correct')->paginate(config('constants.page_limit.question'));

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lesson::all();

        return view('admin.questions.create', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->all());
        $optionAnswers = collect();

        foreach ($request->option_answer as $key => $value) {
            $optionAnswers->push([
                'content' => $value,
                'is_correct' => $key != $request->correct ? config('constants.result.incorrect') : config('constants.result.correct'),
                'question_id' => $question->id,
            ]);
        }

        $optionAnswers = $optionAnswers->shuffle();

        $optionAnswers->each(function ($item, $key) {
            AnswerOption::create($item);
        });

        return redirect()->route('questions.index')->with('success', __('success.create_question'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $question = Question::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        };

        $lessons = Lesson::all();

        return view('admin.questions.edit', compact('lessons', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        try {
            Question::findOrFail($id)->update($request->all());
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('questions.index')->withErrors($exception->getMessage())->withInput();
        }

        return redirect()->route('questions.index')->with('success', __('success.update_question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);

        return redirect()->back()->with('success', __('success.delete_question'));
    }
}
