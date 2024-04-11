@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.capital.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.capitals.update", [$capital->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.capital.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $capital->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.capital.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="index">{{ trans('cruds.capital.fields.index') }}</label>
                            <input class="form-control" type="text" name="index" id="index" value="{{ old('index', $capital->index) }}" required>
                            @if($errors->has('index'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('index') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.capital.fields.index_helper') }}</span>
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