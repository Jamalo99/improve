@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.periodAnswer.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.period-answers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $periodAnswer->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.question') }}
                                    </th>
                                    <td>
                                        {{ $periodAnswer->question->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.period') }}
                                    </th>
                                    <td>
                                        {{ $periodAnswer->period }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.answer') }}
                                    </th>
                                    <td>
                                        {{ $periodAnswer->answer }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.probability') }}
                                    </th>
                                    <td>
                                        {{ $periodAnswer->probability->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.impact') }}
                                    </th>
                                    <td>
                                        {{ $periodAnswer->impact->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.period-answers.index') }}">
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