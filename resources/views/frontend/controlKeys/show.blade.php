@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.controlKey.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.control-keys.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.workspace') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->workspace->owner ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.capital') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->capital->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.macroprocess') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->macroprocess->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.indice') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->indice }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.control_manager') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->control_manager }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.control_deputy') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->control_deputy }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.controlKey.fields.cadence') }}
                                    </th>
                                    <td>
                                        {{ $controlKey->cadence->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.control-keys.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection