@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.activity.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.activities.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.activity.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $activity->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.activity.fields.section') }}
                                    </th>
                                    <td>
                                        {{ $activity->section->section_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.activity.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $activity->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.activity.fields.description_activity') }}
                                    </th>
                                    <td>
                                        {{ $activity->description_activity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.activity.fields.description_control') }}
                                    </th>
                                    <td>
                                        {{ $activity->description_control }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.activity.fields.ctr') }}
                                    </th>
                                    <td>
                                        {{ $activity->ctr }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.activities.index') }}">
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