<?php

namespace App\Http\Requests;

use App\Models\FraudAnswer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFraudAnswerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fraud_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fraud_answers,id',
        ];
    }
}
