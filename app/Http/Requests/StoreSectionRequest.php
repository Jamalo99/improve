<?php

namespace App\Http\Requests;

use App\Models\Section;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSectionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('section_create');
    }

    public function rules()
    {
        return [
            'control_key_reference_id' => [
                'required',
                'integer',
            ],
            'section_name' => [
                'string',
                'required',
            ],
            'title_it' => [
                'string',
                'nullable',
            ],
            'title_en' => [
                'string',
                'nullable',
            ],
            'display_order' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
