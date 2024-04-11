<?php

namespace App\Http\Requests;

use App\Models\Capital;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCapitalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('capital_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:capitals',
            ],
            'index' => [
                'string',
                'required',
            ],
        ];
    }
}
