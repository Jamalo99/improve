@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fraudAnswer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fraud-answers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="question_id">{{ trans('cruds.fraudAnswer.fields.question') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id">
                    @foreach($questions as $id => $entry)
                        <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <select class="form-control select2 {{ $errors->has('protocol') ? 'is-invalid' : '' }}" name="protocol_id" id="protocol_id">
                    @foreach($protocols as $id => $entry)
                        <option value="{{ $id }}" {{ old('protocol_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <select class="form-control select2 {{ $errors->has('fraud_question') ? 'is-invalid' : '' }}" name="fraud_question_id" id="fraud_question_id" required>
                    @foreach($fraud_questions as $id => $entry)
                        <option value="{{ $id }}" {{ old('fraud_question_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <input class="form-control {{ $errors->has('answer') ? 'is-invalid' : '' }}" type="text" name="answer" id="answer" value="{{ old('answer', '') }}">
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



@endsection