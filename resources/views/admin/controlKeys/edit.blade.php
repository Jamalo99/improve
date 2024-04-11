@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.controlKey.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.control-keys.update", [$controlKey->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="workspace_id">{{ trans('cruds.controlKey.fields.workspace') }}</label>
                <select class="form-control select2 {{ $errors->has('workspace') ? 'is-invalid' : '' }}" name="workspace_id" id="workspace_id" required>
                    @foreach($workspaces as $id => $entry)
                        <option value="{{ $id }}" {{ (old('workspace_id') ? old('workspace_id') : $controlKey->workspace->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('workspace'))
                    <div class="invalid-feedback">
                        {{ $errors->first('workspace') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.workspace_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="capital_id">{{ trans('cruds.controlKey.fields.capital') }}</label>
                <select class="form-control select2 {{ $errors->has('capital') ? 'is-invalid' : '' }}" name="capital_id" id="capital_id" required>
                    @foreach($capitals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('capital_id') ? old('capital_id') : $controlKey->capital->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('capital'))
                    <div class="invalid-feedback">
                        {{ $errors->first('capital') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.capital_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="macroprocess_id">{{ trans('cruds.controlKey.fields.macroprocess') }}</label>
                <select class="form-control select2 {{ $errors->has('macroprocess') ? 'is-invalid' : '' }}" name="macroprocess_id" id="macroprocess_id" required>
                    @foreach($macroprocesses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('macroprocess_id') ? old('macroprocess_id') : $controlKey->macroprocess->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('macroprocess'))
                    <div class="invalid-feedback">
                        {{ $errors->first('macroprocess') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.macroprocess_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.controlKey.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $controlKey->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="indice">{{ trans('cruds.controlKey.fields.indice') }}</label>
                <input class="form-control {{ $errors->has('indice') ? 'is-invalid' : '' }}" type="number" name="indice" id="indice" value="{{ old('indice', $controlKey->indice) }}" step="1" required>
                @if($errors->has('indice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.indice_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="control_manager">{{ trans('cruds.controlKey.fields.control_manager') }}</label>
                <input class="form-control {{ $errors->has('control_manager') ? 'is-invalid' : '' }}" type="text" name="control_manager" id="control_manager" value="{{ old('control_manager', $controlKey->control_manager) }}" required>
                @if($errors->has('control_manager'))
                    <div class="invalid-feedback">
                        {{ $errors->first('control_manager') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.control_manager_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="control_deputy">{{ trans('cruds.controlKey.fields.control_deputy') }}</label>
                <input class="form-control {{ $errors->has('control_deputy') ? 'is-invalid' : '' }}" type="text" name="control_deputy" id="control_deputy" value="{{ old('control_deputy', $controlKey->control_deputy) }}">
                @if($errors->has('control_deputy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('control_deputy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.control_deputy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.controlKey.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $controlKey->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cadence_id">{{ trans('cruds.controlKey.fields.cadence') }}</label>
                <select class="form-control select2 {{ $errors->has('cadence') ? 'is-invalid' : '' }}" name="cadence_id" id="cadence_id">
                    @foreach($cadences as $id => $entry)
                        <option value="{{ $id }}" {{ (old('cadence_id') ? old('cadence_id') : $controlKey->cadence->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('cadence'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cadence') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.controlKey.fields.cadence_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection