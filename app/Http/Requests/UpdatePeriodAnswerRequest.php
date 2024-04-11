<?php

namespace App\Http\Requests;

use App\Models\PeriodAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePeriodAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('period_answer_edit');
    }

    public function rules()
    {
        return [
            'question_id' => [
                'required',
                'integer',
            ],
            'period' => [
                'string',
                'required',
            ],
            'answer' => [
                'string',
                'nullable',
            ],
        ];
    }
}
