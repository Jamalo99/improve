@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.riskMap.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.risk-maps.update", [$riskMap->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="workspace_id">{{ trans('cruds.riskMap.fields.workspace') }}</label>
                            <select class="form-control select2" name="workspace_id" id="workspace_id" required>
                                @foreach($workspaces as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('workspace_id') ? old('workspace_id') : $riskMap->workspace->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('workspace'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('workspace') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.riskMap.fields.workspace_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="capital_id">{{ trans('cruds.riskMap.fields.capital') }}</label>
                            <select class="form-control select2" name="capital_id" id="capital_id" required>
                                @foreach($capitals as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('capital_id') ? old('capital_id') : $riskMap->capital->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('capital'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('capital') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.riskMap.fields.capital_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="macroprocess_id">{{ trans('cruds.riskMap.fields.macroprocess') }}</label>
                            <select class="form-control select2" name="macroprocess_id" id="macroprocess_id" required>
                                @foreach($macroprocesses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('macroprocess_id') ? old('macroprocess_id') : $riskMap->macroprocess->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('macroprocess'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('macroprocess') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.riskMap.fields.macroprocess_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="probability_id">{{ trans('cruds.riskMap.fields.probability') }}</label>
                            <select class="form-control select2" name="probability_id" id="probability_id">
                                @foreach($probabilities as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('probability_id') ? old('probability_id') : $riskMap->probability->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('probability'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('probability') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.riskMap.fields.probability_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="impact_id">{{ trans('cruds.riskMap.fields.impact') }}</label>
                            <select class="form-control select2" name="impact_id" id="impact_id">
                                @foreach($impacts as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('impact_id') ? old('impact_id') : $riskMap->impact->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('impact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('impact') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.riskMap.fields.impact_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="risk_owner">{{ trans('cruds.riskMap.fields.risk_owner') }}</label>
                            <input class="form-control" type="text" name="risk_owner" id="risk_owner" value="{{ old('risk_owner', $riskMap->risk_owner) }}">
                            @if($errors->has('risk_owner'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('risk_owner') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.riskMap.fields.risk_owner_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="desc_risk">{{ trans('cruds.riskMap.fields.desc_risk') }}</label>
                            <input class="form-control" type="text" name="desc_risk" id="desc_risk" value="{{ old('desc_risk', $riskMap->desc_risk) }}">
                            @if($errors->has('desc_risk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('desc_risk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.riskMap.fields.desc_risk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="controlkeys">{{ trans('cruds.riskMap.fields.controlkey') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="controlkeys[]" id="controlkeys" multiple>
                                @foreach($controlkeys as $id => $controlkey)
                                    <option value="{{ $id }}" {{ (in_array($id, old('controlkeys', [])) || $riskMap->controlkeys->contains($id)) ? 'selected' : '' }}>{{ $controlkey }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('controlkeys'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('controlkeys') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.riskMap.fields.controlkey_helper') }}</span>
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