@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.protocolTableQuestion.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.protocol-table-questions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="protocol_id">{{ trans('cruds.protocolTableQuestion.fields.protocol') }}</label>
                            <select class="form-control select2" name="protocol_id" id="protocol_id" required>
                                @foreach($protocols as $id => $entry)
                                    <option value="{{ $id }}" {{ old('protocol_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('protocol'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('protocol') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocolTableQuestion.fields.protocol_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="desc_activity">{{ trans('cruds.protocolTableQuestion.fields.desc_activity') }}</label>
                            <input class="form-control" type="text" name="desc_activity" id="desc_activity" value="{{ old('desc_activity', '') }}">
                            @if($errors->has('desc_activity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('desc_activity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocolTableQuestion.fields.desc_activity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="desc_control">{{ trans('cruds.protocolTableQuestion.fields.desc_control') }}</label>
                            <input class="form-control" type="text" name="desc_control" id="desc_control" value="{{ old('desc_control', '') }}">
                            @if($errors->has('desc_control'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('desc_control') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocolTableQuestion.fields.desc_control_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="support_info">{{ trans('cruds.protocolTableQuestion.fields.support_info') }}</label>
                            <input class="form-control" type="text" name="support_info" id="support_info" value="{{ old('support_info', '') }}">
                            @if($errors->has('support_info'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('support_info') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocolTableQuestion.fields.support_info_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="probability_id">{{ trans('cruds.protocolTableQuestion.fields.probability') }}</label>
                            <select class="form-control select2" name="probability_id" id="probability_id">
                                @foreach($probabilities as $id => $entry)
                                    <option value="{{ $id }}" {{ old('probability_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('probability'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('probability') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocolTableQuestion.fields.probability_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="impact_id">{{ trans('cruds.protocolTableQuestion.fields.impact') }}</label>
                            <select class="form-control select2" name="impact_id" id="impact_id">
                                @foreach($impacts as $id => $entry)
                                    <option value="{{ $id }}" {{ old('impact_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('impact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('impact') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.protocolTableQuestion.fields.impact_helper') }}</span>
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