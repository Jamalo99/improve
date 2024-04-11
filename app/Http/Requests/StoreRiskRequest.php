<?php

namespace App\Http\Requests;

use App\Models\Risk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRiskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('risk_create');
    }

    public function rules()
    {
        return [
            'control_key_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
