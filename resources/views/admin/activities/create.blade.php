@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.activity.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.activities.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="section_id">{{ trans('cruds.activity.fields.section') }}</label>
                <select class="form-control select2 {{ $errors->has('section') ? 'is-invalid' : '' }}" name="section_id" id="section_id" required>
                    @foreach($sections as $id => $entry)
                        <option value="{{ $id }}" {{ old('section_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('section'))
                    <div class="invalid-feedback">
                        {{ $errors->first('section') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.section_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.activity.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_activity">{{ trans('cruds.activity.fields.description_activity') }}</label>
                <input class="form-control {{ $errors->has('description_activity') ? 'is-invalid' : '' }}" type="text" name="description_activity" id="description_activity" value="{{ old('description_activity', '') }}">
                @if($errors->has('description_activity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_activity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.description_activity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description_control">{{ trans('cruds.activity.fields.description_control') }}</label>
                <input class="form-control {{ $errors->has('description_control') ? 'is-invalid' : '' }}" type="text" name="description_control" id="description_control" value="{{ old('description_control', '') }}">
                @if($errors->has('description_control'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_control') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.description_control_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ctr">{{ trans('cruds.activity.fields.ctr') }}</label>
                <input class="form-control {{ $errors->has('ctr') ? 'is-invalid' : '' }}" type="text" name="ctr" id="ctr" value="{{ old('ctr', '') }}">
                @if($errors->has('ctr'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ctr') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.activity.fields.ctr_helper') }}</span>
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