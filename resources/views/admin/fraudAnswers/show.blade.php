@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fraudAnswer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fraud-answers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fraudAnswer.fields.id') }}
                        </th>
                        <td>
                            {{ $fraudAnswer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fraudAnswer.fields.question') }}
                        </th>
                        <td>
                            {{ $fraudAnswer->question->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fraudAnswer.fields.protocol') }}
                        </th>
                        <td>
                            {{ $fraudAnswer->protocol->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fraudAnswer.fields.fraud_question') }}
                        </th>
                        <td>
                            {{ $fraudAnswer->fraud_question->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fraudAnswer.fields.answer') }}
                        </th>
                        <td>
                            {{ $fraudAnswer->answer }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fraud-answers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection