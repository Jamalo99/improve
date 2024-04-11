<?php

namespace App\Http\Requests;

use App\Models\Cadence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCadenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cadence_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:cadences,name,' . request()->route('cadence')->id,
            ],
        ];
    }
}
