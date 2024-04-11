<?php

namespace App\Http\Requests;

use App\Models\Workspace;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWorkspaceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('workspace_edit');
    }

    public function rules()
    {
        return [
            'user_reference_id' => [
                'required',
                'integer',
            ],
            'owner' => [
                'string',
                'required',
            ],
        ];
    }
}
