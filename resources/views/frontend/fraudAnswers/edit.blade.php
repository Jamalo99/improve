@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.fraudAnswer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.fraud-answers.update", [$fraudAnswer->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="question_id">{{ trans('cruds.fraudAnswer.fields.question') }}</label>
                            <select class="form-control select2" name="question_id" id="question_id">
                                @foreach($questions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('question_id') ? old('question_id') : $fraudAnswer->question->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fraudAnswer.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="protocol_id">{{ trans('cruds.fraudAnswer.fields.protocol') }}</label>
                            <select class="form-control select2" name="protocol_id" id="protocol_id">
                                @foreach($protocols as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('protocol_id') ? old('protocol_id') : $fraudAnswer->protocol->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('protocol'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('protocol') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fraudAnswer.fields.protocol_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fraud_question_id">{{ trans('cruds.fraudAnswer.fields.fraud_question') }}</label>
                            <select class="form-control select2" name="fraud_question_id" id="fraud_question_id" required>
                                @foreach($fraud_questions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('fraud_question_id') ? old('fraud_question_id') : $fraudAnswer->fraud_question->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fraud_question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fraud_question') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fraudAnswer.fields.fraud_question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="answer">{{ trans('cruds.fraudAnswer.fields.answer') }}</label>
                            <input class="form-control" type="text" name="answer" id="answer" value="{{ old('answer', $fraudAnswer->answer) }}">
                            @if($errors->has('answer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('answer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.fraudAnswer.fields.answer_helper') }}</span>
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