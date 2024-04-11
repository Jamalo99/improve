@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.macroprocess.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.macroprocesses.update", [$macroprocess->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="capital_id">{{ trans('cruds.macroprocess.fields.capital') }}</label>
                <select class="form-control select2 {{ $errors->has('capital') ? 'is-invalid' : '' }}" name="capital_id" id="capital_id" required>
                    @foreach($capitals as $id => $entry)
                        <option value="{{ $id }}" {{ (old('capital_id') ? old('capital_id') : $macroprocess->capital->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('capital'))
                    <div class="invalid-feedback">
                        {{ $errors->first('capital') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.macroprocess.fields.capital_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.macroprocess.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $macroprocess->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.macroprocess.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="index">{{ trans('cruds.macroprocess.fields.index') }}</label>
                <input class="form-control {{ $errors->has('index') ? 'is-invalid' : '' }}" type="text" name="index" id="index" value="{{ old('index', $macroprocess->index) }}" required>
                @if($errors->has('index'))
                    <div class="invalid-feedback">
                        {{ $errors->first('index') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.macroprocess.fields.index_helper') }}</span>
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