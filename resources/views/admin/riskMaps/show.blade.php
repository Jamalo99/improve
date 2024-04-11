@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.riskMap.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.risk-maps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.id') }}
                        </th>
                        <td>
                            {{ $riskMap->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.workspace') }}
                        </th>
                        <td>
                            {{ $riskMap->workspace->owner ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.capital') }}
                        </th>
                        <td>
                            {{ $riskMap->capital->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.macroprocess') }}
                        </th>
                        <td>
                            {{ $riskMap->macroprocess->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.probability') }}
                        </th>
                        <td>
                            {{ $riskMap->probability->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.impact') }}
                        </th>
                        <td>
                            {{ $riskMap->impact->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.risk_owner') }}
                        </th>
                        <td>
                            {{ $riskMap->risk_owner }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.desc_risk') }}
                        </th>
                        <td>
                            {{ $riskMap->desc_risk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riskMap.fields.controlkey') }}
                        </th>
                        <td>
                            @foreach($riskMap->controlkeys as $key => $controlkey)
                                <span class="label label-info">{{ $controlkey->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.risk-maps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection