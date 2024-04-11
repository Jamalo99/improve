@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.section.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sections.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="control_key_reference_id">{{ trans('cruds.section.fields.control_key_reference') }}</label>
                <select class="form-control select2 {{ $errors->has('control_key_reference') ? 'is-invalid' : '' }}" name="control_key_reference_id" id="control_key_reference_id" required>
                    @foreach($control_key_references as $id => $entry)
                        <option value="{{ $id }}" {{ old('control_key_reference_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('control_key_reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('control_key_reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.control_key_reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="section_name">{{ trans('cruds.section.fields.section_name') }}</label>
                <input class="form-control {{ $errors->has('section_name') ? 'is-invalid' : '' }}" type="text" name="section_name" id="section_name" value="{{ old('section_name', '') }}" required>
                @if($errors->has('section_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('section_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.section_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_it">{{ trans('cruds.section.fields.title_it') }}</label>
                <input class="form-control {{ $errors->has('title_it') ? 'is-invalid' : '' }}" type="text" name="title_it" id="title_it" value="{{ old('title_it', '') }}">
                @if($errors->has('title_it'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_it') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.title_it_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title_en">{{ trans('cruds.section.fields.title_en') }}</label>
                <input class="form-control {{ $errors->has('title_en') ? 'is-invalid' : '' }}" type="text" name="title_en" id="title_en" value="{{ old('title_en', '') }}">
                @if($errors->has('title_en'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_en') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.title_en_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="display_order">{{ trans('cruds.section.fields.display_order') }}</label>
                <input class="form-control {{ $errors->has('display_order') ? 'is-invalid' : '' }}" type="number" name="display_order" id="display_order" value="{{ old('display_order', '10') }}" step="1" required>
                @if($errors->has('display_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('display_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.display_order_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('original') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="original" value="0">
                    <input class="form-check-input" type="checkbox" name="original" id="original" value="1" {{ old('original', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="original">{{ trans('cruds.section.fields.original') }}</label>
                </div>
                @if($errors->has('original'))
                    <div class="invalid-feedback">
                        {{ $errors->first('original') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.section.fields.original_helper') }}</span>
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