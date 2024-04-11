<?php

namespace App\Http\Requests;

use App\Models\ControlKey;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreControlKeyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('control_key_create');
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
            'indice' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
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
