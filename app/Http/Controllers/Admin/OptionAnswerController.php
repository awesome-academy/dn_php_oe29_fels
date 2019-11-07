<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionAnswer\StoreOptionAnswerRequest;
use App\Http\Requests\OptionAnswer\UpdateOptionAnswerRequest;
use App\Models\AnswerOption;
use App\Models\Question;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OptionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $optionAnswers = AnswerOption::paginate(config('constants.page_limit.option_answer'));

        return view('admin.option-answers.index', compact('optionAnswers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();

        return view('admin.option-answers.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionAnswerRequest $request)
    {
        AnswerOption::create($request->all());

        return redirect()->route('option-answers.index')->with('success', __('success.create_option_answer'));
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
            $optionAnswer = AnswerOption::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }

        $questions = Question::all();

        return view('admin.option-answers.edit', compact('optionAnswer', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionAnswerRequest $request, $id)
    {
        try {
            AnswerOption::find($id)->update($request->all());
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('option-answers.index')->withErrors($exception->getMessage())->withInput();
        }

        return redirect()->route('option-answers.index')->with('success', __('success.update_option_answer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnswerOption::destroy($id);

        return redirect()->back()->with('success', __('success.deleted_option_answer'));
    }
}
