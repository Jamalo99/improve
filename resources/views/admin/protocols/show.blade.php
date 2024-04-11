@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.protocol.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.protocols.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.id') }}
                        </th>
                        <td>
                            {{ $protocol->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.workspace') }}
                        </th>
                        <td>
                            {{ $protocol->workspace->owner ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.capital') }}
                        </th>
                        <td>
                            {{ $protocol->capital->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.macroprocess') }}
                        </th>
                        <td>
                            {{ $protocol->macroprocess->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.title') }}
                        </th>
                        <td>
                            {{ $protocol->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.index') }}
                        </th>
                        <td>
                            {{ $protocol->index }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.control_manager') }}
                        </th>
                        <td>
                            {{ $protocol->control_manager }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.control_deputy') }}
                        </th>
                        <td>
                            {{ $protocol->control_deputy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.protocol.fields.status') }}
                        </th>
                        <td>
                            {{ $protocol->status->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.protocols.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection