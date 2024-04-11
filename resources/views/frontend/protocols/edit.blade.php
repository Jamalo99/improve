@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.protocol.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.protocols.update", [$protocol->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="workspace_id">{{ trans('cruds.protocol.fields.workspace') }}</label>
                            <select class="form-control select2" name="workspace_id" id="workspace_id" required>
                                @foreach($workspaces as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('workspace_id') ? old('workspace_id') : $protocol->workspace->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('workspace'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('workspace') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocol.fields.workspace_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="capital_id">{{ trans('cruds.protocol.fields.capital') }}</label>
                            <select class="form-control select2" name="capital_id" id="capital_id" required>
                                @foreach($capitals as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('capital_id') ? old('capital_id') : $protocol->capital->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('capital'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('capital') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocol.fields.capital_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="macroprocess_id">{{ trans('cruds.protocol.fields.macroprocess') }}</label>
                            <select class="form-control select2" name="macroprocess_id" id="macroprocess_id" required>
                                @foreach($macroprocesses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('macroprocess_id') ? old('macroprocess_id') : $protocol->macroprocess->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('macroprocess'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('macroprocess') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocol.fields.macroprocess_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.protocol.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $protocol->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocol.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="index">{{ trans('cruds.protocol.fields.index') }}</label>
                            <input class="form-control" type="text" name="index" id="index" value="{{ old('index', $protocol->index) }}" required>
                            @if($errors->has('index'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('index') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocol.fields.index_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="control_manager">{{ trans('cruds.protocol.fields.control_manager') }}</label>
                            <input class="form-control" type="text" name="control_manager" id="control_manager" value="{{ old('control_manager', $protocol->control_manager) }}" required>
                            @if($errors->has('control_manager'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('control_manager') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocol.fields.control_manager_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="control_deputy">{{ trans('cruds.protocol.fields.control_deputy') }}</label>
                            <input class="form-control" type="text" name="control_deputy" id="control_deputy" value="{{ old('control_deputy', $protocol->control_deputy) }}">
                            @if($errors->has('control_deputy'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('control_deputy') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocol.fields.control_deputy_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status_id">{{ trans('cruds.protocol.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $protocol->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocol.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection