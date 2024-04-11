<?php

namespace App\Http\Requests;

use App\Models\Activity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActivityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('activity_edit');
    }

    public function rules()
    {
        return [
            'section_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'description_activity' => [
                'string',
                'nullable',
            ],
            'description_control' => [
                'string',
                'nullable',
            ],
            'ctr' => [
                'string',
                'nullable',
            ],
        ];
    }
}
