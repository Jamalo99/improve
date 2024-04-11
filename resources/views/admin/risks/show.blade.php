@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.risk.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.risks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.id') }}
                        </th>
                        <td>
                            {{ $risk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.control_key') }}
                        </th>
                        <td>
                            {{ $risk->control_key->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.probability') }}
                        </th>
                        <td>
                            {{ $risk->probability->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.impact') }}
                        </th>
                        <td>
                            {{ $risk->impact->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.risks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection