<?php

namespace App\Http\Requests;

use App\Models\Macroprocess;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMacroprocessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('macroprocess_edit');
    }

    public function rules()
    {
        return [
            'capital_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
                'unique:macroprocesses,name,' . request()->route('macroprocess')->id,
            ],
            'index' => [
                'string',
                'required',
            ],
        ];
    }
}
