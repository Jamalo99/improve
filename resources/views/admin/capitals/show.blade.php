@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.capital.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.capitals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.capital.fields.id') }}
                        </th>
                        <td>
                            {{ $capital->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.capital.fields.name') }}
                        </th>
                        <td>
                            {{ $capital->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.capital.fields.index') }}
                        </th>
                        <td>
                            {{ $capital->index }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.capitals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection