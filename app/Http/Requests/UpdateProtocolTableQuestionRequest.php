<?php

namespace App\Http\Requests;

use App\Models\ProtocolTableQuestion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProtocolTableQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('protocol_table_question_edit');
    }

    public function rules()
    {
        return [
            'protocol_id' => [
                'required',
                'integer',
            ],
            'desc_activity' => [
                'string',
                'nullable',
            ],
            'desc_control' => [
                'string',
                'nullable',
            ],
            'support_info' => [
                'string',
                'nullable',
            ],
        ];
    }
}
