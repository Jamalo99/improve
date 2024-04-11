<?php

namespace App\Http\Requests;

use App\Models\Probability;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProbabilityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('probability_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
