@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.section.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sections.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="control_key_reference_id">{{ trans('cruds.section.fields.control_key_reference') }}</label>
                            <select class="form-control select2" name="control_key_reference_id" id="control_key_reference_id" required>
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
                            <input class="form-control" type="text" name="section_name" id="section_name" value="{{ old('section_name', '') }}" required>
                            @if($errors->has('section_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('section_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.section.fields.section_name_helper') }}</span>
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