@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.risk.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.risks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="control_key_id">{{ trans('cruds.risk.fields.control_key') }}</label>
                <select class="form-control select2 {{ $errors->has('control_key') ? 'is-invalid' : '' }}" name="control_key_id" id="control_key_id" required>
                    @foreach($control_keys as $id => $entry)
                        <option value="{{ $id }}" {{ old('control_key_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('control_key'))
                    <div class="invalid-feedback">
                        {{ $errors->first('control_key') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.risk.fields.control_key_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="probability_id">{{ trans('cruds.risk.fields.probability') }}</label>
                <select class="form-control select2 {{ $errors->has('probability') ? 'is-invalid' : '' }}" name="probability_id" id="probability_id">
                    @foreach($probabilities as $id => $entry)
                        <option value="{{ $id }}" {{ old('probability_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('probability'))
                    <div class="invalid-feedback">
                        {{ $errors->first('probability') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.risk.fields.probability_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="impact_id">{{ trans('cruds.risk.fields.impact') }}</label>
                <select class="form-control select2 {{ $errors->has('impact') ? 'is-invalid' : '' }}" name="impact_id" id="impact_id">
                    @foreach($impacts as $id => $entry)
                        <option value="{{ $id }}" {{ old('impact_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('impact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('impact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.risk.fields.impact_helper') }}</span>
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