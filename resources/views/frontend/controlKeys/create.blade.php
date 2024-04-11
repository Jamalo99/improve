@extends('layouts.frontend')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="container-fluid col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ trans('global.create') }} {{ trans('cruds.controlKey.title_singular') }}
                    </div>

                    <div class="card-body">
                        <form class="" method="POST" action="{{ route('frontend.control-keys.store') }}"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="container-fluid">
                                <div class="d-flex justify-content-between">
                                    <div class="form-group w-50 pr-4">
                                        <label class="required"
                                            for="capital_id">{{ trans('cruds.controlKey.fields.capital') }}</label>
                                        <select class="form-control " name="capital_id" id="capital_id" required>
                                            @foreach ($capitals as $id => $entry)
                                                <option value="{{ $id }}"
                                                    {{ old('capital_id') == $id ? 'selected' : '' }}>{{ $entry }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('capital'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('capital') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.controlKey.fields.capital_helper') }}</span>
                                    </div>
                                    <div class="form-group flex-fill">
                                        <label class="required"
                                            for="macroprocess_id">{{ trans('cruds.controlKey.fields.macroprocess') }}</label>
                                        <select class="form-control" name="macroprocess_id" id="macroprocess_id" required>
                                            <option value="">
                                                {{ trans('global.pleaseSelectFirst') }}
                                            </option>
                                        </select>
                                        @if ($errors->has('macroprocess'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('macroprocess') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.controlKey.fields.macroprocess_helper') }}</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="form-group flex-fill">
                                        <label class="required"
                                            for="title">{{ trans('cruds.controlKey.fields.title') }}</label>
                                        <input class="form-control" type="text" name="title" id="title"
                                            value="{{ old('title', '') }}" required>
                                        @if ($errors->has('title'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.controlKey.fields.title_helper') }}</span>
                                    </div>
                                    <div class="form-group pl-3">
                                        <label class="required"
                                            for="index">{{ trans('cruds.controlKey.fields.index') }}</label>
                                        <input class="form-control {{ $errors->has('index') ? 'invalid-select' : '' }}"
                                            type="text" name="index" id="index" value="{{ old('index', '') }}"
                                            required>
                                        @if ($errors->has('index'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('index') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.controlKey.fields.index_helper') }}</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="form-group flex-fill pr-3">
                                        <label class="required"
                                            for="control_manager">{{ trans('cruds.controlKey.fields.control_manager') }}</label>
                                        <input class="form-control" type="text" name="control_manager"
                                            id="control_manager" value="{{ old('control_manager', '') }}" required>
                                        @if ($errors->has('control_manager'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('control_manager') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.controlKey.fields.control_manager_helper') }}</span>
                                    </div>
                                    <div class="form-group flex-fill">
                                        <label
                                            for="control_deputy">{{ trans('cruds.controlKey.fields.control_deputy') }}</label>
                                        <input class="form-control" type="text" name="control_deputy" id="control_deputy"
                                            value="{{ old('control_deputy', '') }}">
                                        @if ($errors->has('control_deputy'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('control_deputy') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.controlKey.fields.control_deputy_helper') }}</span>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="form-group col-3 p-0">
                                        <label class="required"
                                            for="status_id">{{ trans('cruds.controlKey.fields.status') }}</label>
                                        <select class="form-control" name="status_id" id="status_id" required>
                                            @foreach ($statuses as $id => $entry)
                                                <option value="{{ $id }}"
                                                    {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('status'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('status') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.controlKey.fields.status_helper') }}</span>
                                    </div>
                                    <div class="form-group col-3 p-0">
                                        <label for="cadence_id">{{ trans('cruds.controlKey.fields.cadence') }}</label>
                                        <select class="form-control" name="cadence_id" id="cadence_id">
                                            @foreach ($cadences as $id => $entry)
                                                <option value="{{ $id }}"
                                                    {{ old('cadence_id') == $id ? 'selected' : '' }}>{{ $entry }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('cadence'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('cadence') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.controlKey.fields.cadence_helper') }}</span>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-danger" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Funzione per caricare i macroprocessi
            function loadMacroprocesses(capital_index) {
                jQuery.ajax({
                    url: '/fetch-macroprocess',
                    data: {
                        capital_id: capital_index,
                        _token: '{{ csrf_token() }}'
                    },
                    type: 'GET',

                    success: function(result) {
                        var select = $('#macroprocess_id');

                        // Svuota le opzioni esistenti (opzionale)
                        if (select.prop('options').length > 0) {
                            select.empty();
                        }

                        // Create new options from the result object
                        $.each(result[0], function(key, value) {
                            var option = $('<option></option>');
                            option.attr('value', key); // Set the option value
                            option.text(value); // Set the option text

                            select.append(option); // Add the option to the select element
                        });
                    }
                });
            }

            // Carica i macroprocessi quando la pagina viene ricaricata
            var initialCapitalId = $('#capital_id').val();
            if (initialCapitalId) {
                loadMacroprocesses(initialCapitalId);
            }

            // Carica i macroprocessi quando il capital_id cambia
            $('#capital_id').on('change', function() {
                event.preventDefault();
                var capital_index = this.value;
                loadMacroprocesses(capital_index);
            });
        });
    </script>
@endsection
