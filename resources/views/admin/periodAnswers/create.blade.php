@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.periodAnswer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.period-answers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="question_id">{{ trans('cruds.periodAnswer.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id" required>
                    @foreach($questions as $id => $entry)
                        <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.periodAnswer.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="period">{{ trans('cruds.periodAnswer.fields.period') }}</label>
                <input class="form-control {{ $errors->has('period') ? 'is-invalid' : '' }}" type="text" name="period" id="period" value="{{ old('period', '') }}" required>
                @if($errors->has('period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.periodAnswer.fields.period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="answer">{{ trans('cruds.periodAnswer.fields.answer') }}</label>
                <input class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" type="text" name="answer" id="answer" value="{{ old('answer', '') }}">
                @if($errors->has('answer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('answer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.periodAnswer.fields.answer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="probability_id">{{ trans('cruds.periodAnswer.fields.probability') }}</label>
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
                <span class="help-block">{{ trans('cruds.periodAnswer.fields.probability_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="impact_id">{{ trans('cruds.periodAnswer.fields.impact') }}</label>
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
                <span class="help-block">{{ trans('cruds.periodAnswer.fields.impact_helper') }}</span>
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