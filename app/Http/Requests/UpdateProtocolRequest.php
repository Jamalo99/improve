<?php

namespace App\Http\Requests;

use App\Models\Protocol;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProtocolRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('protocol_edit');
    }

    public function rules()
    {
        return [
            'workspace_id' => [
                'required',
                'integer',
            ],
            'capital_id' => [
                'required',
                'integer',
            ],
            'macroprocess_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'index' => [
                'string',
                'required',
            ],
            'control_manager' => [
                'string',
                'required',
            ],
            'control_deputy' => [
                'string',
                'nullable',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
