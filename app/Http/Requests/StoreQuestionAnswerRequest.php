<?php

namespace App\Http\Requests;

use App\Models\QuestionAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('question_answer_create');
    }

    public function rules()
    {
        return [
            'question_id' => [
                'required',
                'integer',
            ],
            'answer' => [
                'string',
                'nullable',
            ],
        ];
    }
}
