<?php

namespace App\Http\Requests;

use App\Models\FraudQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFraudQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fraud_question_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'type_answer' => [
                'string',
                'required',
            ],
        ];
    }
}
