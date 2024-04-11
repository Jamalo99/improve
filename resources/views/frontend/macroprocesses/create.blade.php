@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.macroprocess.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.macroprocesses.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="capital_id">{{ trans('cruds.macroprocess.fields.capital') }}</label>
                            <select class="form-control select2" name="capital_id" id="capital_id" required>
                                @foreach($capitals as $id => $entry)
                                    <option value="{{ $id }}" {{ old('capital_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.macroprocess.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="index">{{ trans('cruds.macroprocess.fields.index') }}</label>
                            <input class="form-control" type="text" name="index" id="index" value="{{ old('index', '') }}" required>
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

        </div>
    </div>
</div>
@endsection