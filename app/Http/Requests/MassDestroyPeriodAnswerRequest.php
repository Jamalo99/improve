<?php

namespace App\Http\Requests;

use App\Models\PeriodAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPeriodAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('period_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:period_answers,id',
        ];
    }
}
