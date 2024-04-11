<?php

namespace App\Http\Requests;

use App\Models\Probability;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProbabilityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('probability_create');
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
