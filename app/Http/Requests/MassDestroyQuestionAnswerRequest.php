<?php

namespace App\Http\Requests;

use App\Models\QuestionAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQuestionAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('question_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:question_answers,id',
        ];
    }
}
