<?php

namespace App\Http\Requests;

use App\Models\RiskMap;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRiskMapRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('risk_map_edit');
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
            'risk_owner' => [
                'string',
                'nullable',
            ],
            'desc_risk' => [
                'string',
                'nullable',
            ],
            'controlkeys.*' => [
                'integer',
            ],
            'controlkeys' => [
                'array',
            ],
        ];
    }
}
