<?php

namespace App\Http\Requests;

use App\Models\Probability;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProbabilityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('probability_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:probabilities,id',
        ];
    }
}
