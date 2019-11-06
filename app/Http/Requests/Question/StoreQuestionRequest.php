<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'content' => 'required',
            'lesson_id' => 'required',
        ];

        if ($this->has('option_answer')) {
            $rules['correct'] = 'required';
        }

        return $rules;
    }
}
