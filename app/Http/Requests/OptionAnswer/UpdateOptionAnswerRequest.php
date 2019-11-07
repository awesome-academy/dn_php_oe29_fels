<?php

namespace App\Http\Requests\OptionAnswer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionAnswerRequest extends FormRequest
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
        return [
            'content' => 'required|max:255',
            'is_correct' => 'required',
            'question_id' => 'required',
        ];
    }
}
