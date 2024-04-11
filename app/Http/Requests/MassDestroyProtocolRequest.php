<?php

namespace App\Http\Requests;

use App\Models\Protocol;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProtocolRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('protocol_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:protocols,id',
        ];
    }
}
