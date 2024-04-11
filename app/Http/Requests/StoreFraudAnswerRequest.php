<?php

namespace App\Http\Requests;

use App\Models\FraudAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFraudAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fraud_answer_create');
    }

    public function rules()
    {
        return [
            'fraud_question_id' => [
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
