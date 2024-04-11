<?php

namespace App\Http\Requests;

use App\Models\Capital;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCapitalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('capital_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:capitals,name,' . request()->route('capital')->id,
            ],
            'index' => [
                'string',
                'required',
            ],
        ];
    }
}
