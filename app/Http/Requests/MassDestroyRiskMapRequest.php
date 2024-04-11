<?php

namespace App\Http\Requests;

use App\Models\RiskMap;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRiskMapRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('risk_map_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:risk_maps,id',
        ];
    }
}
