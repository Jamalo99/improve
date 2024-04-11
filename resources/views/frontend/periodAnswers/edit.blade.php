@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.periodAnswer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.period-answers.update", [$periodAnswer->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="question_id">{{ trans('cruds.periodAnswer.fields.question') }}</label>
                            <select class="form-control select2" name="question_id" id="question_id" required>
                                @foreach($questions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('question_id') ? old('question_id') : $periodAnswer->question->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="text" name="period" id="period" value="{{ old('period', $periodAnswer->period) }}" required>
                            @if($errors->has('period'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('period') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.periodAnswer.fields.period_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="answer">{{ trans('cruds.periodAnswer.fields.answer') }}</label>
                            <input class="form-control" type="text" name="answer" id="answer" value="{{ old('answer', $periodAnswer->answer) }}">
                            @if($errors->has('answer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('answer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.periodAnswer.fields.answer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="probability_id">{{ trans('cruds.periodAnswer.fields.probability') }}</label>
                            <select class="form-control select2" name="probability_id" id="probability_id">
                                @foreach($probabilities as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('probability_id') ? old('probability_id') : $periodAnswer->probability->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control select2" name="impact_id" id="impact_id">
                                @foreach($impacts as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('impact_id') ? old('impact_id') : $periodAnswer->impact->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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

        </div>
    </div>
</div>
@endsection