<?php

namespace App\Http\Requests;

use App\Models\ProtocolTableQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProtocolTableQuestionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('protocol_table_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:protocol_table_questions,id',
        ];
    }
}
