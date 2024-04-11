<?php

namespace App\Http\Requests;

use App\Models\Impact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreImpactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('impact_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:impacts',
            ],
        ];
    }
}
