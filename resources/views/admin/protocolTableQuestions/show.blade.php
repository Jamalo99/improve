@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.protocolTableQuestion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.protocol-table-questions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.protocolTableQuestion.fields.id') }}
                        </th>
                        <td>
                            {{ $protocolTableQuestion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocolTableQuestion.fields.protocol') }}
                        </th>
                        <td>
                            {{ $protocolTableQuestion->protocol->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocolTableQuestion.fields.desc_activity') }}
                        </th>
                        <td>
                            {{ $protocolTableQuestion->desc_activity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocolTableQuestion.fields.desc_control') }}
                        </th>
                        <td>
                            {{ $protocolTableQuestion->desc_control }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocolTableQuestion.fields.support_info') }}
                        </th>
                        <td>
                            {{ $protocolTableQuestion->support_info }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocolTableQuestion.fields.probability') }}
                        </th>
                        <td>
                            {{ $protocolTableQuestion->probability->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocolTableQuestion.fields.impact') }}
                        </th>
                        <td>
                            {{ $protocolTableQuestion->impact->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.protocol-table-questions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection