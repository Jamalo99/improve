@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.fraudQuestion.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.fraud-questions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.fraudQuestion.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fraudQuestion.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="type_answer">{{ trans('cruds.fraudQuestion.fields.type_answer') }}</label>
                            <input class="form-control" type="text" name="type_answer" id="type_answer" value="{{ old('type_answer', '') }}" required>
                            @if($errors->has('type_answer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type_answer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fraudQuestion.fields.type_answer_helper') }}</span>
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