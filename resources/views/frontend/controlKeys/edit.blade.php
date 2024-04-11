@extends('layouts.frontend')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-between text-white" style="background-color: #C5C09A">
                        {{ trans('global.edit') }} {{ trans('cruds.controlKey.title_singular') }}
                        <span class="text-white">{{ trans('global.lastUpdate') }}: {{ $controlKey->updated_at }}</span>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center w-100 mb-4" style="gap: 1rem;">
                            <div>
                                <div class="d-flex justify-content-center align-items-center">{{ trans('global.deadline') }}</div>
                                <div id="deadlineInfo" class="border rounded d-flex justify-content-center align-items-center" style="width: 8rem; height: 4rem;"></div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-center align-items-center">{{ trans('global.status') }}</div>
                                <div id="statusInfo" class="border rounded d-flex justify-content-center align-items-center" style="width: 8rem; height: 4rem;"></div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-center align-items-center">{{ trans('global.risk') }}</div>
                                <div id="riskInfo" class="border rounded d-flex justify-content-center align-items-center" style="width: 8rem; height: 4rem;"></div>
                            </div>
                        </div>
                        <form id="updateControlKeyHeader" method="POST"
                            action="{{ route('frontend.control-keys.update', [$controlKey->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="container-fluid">
                                <div class="d-flex justify-content-between">
                                    <div class="form-group w-50 pr-4">
                                        <label class="required"
                                            for="capital_id">{{ trans('cruds.controlKey.fields.capital') }}</label>
                                        <select class="form-control" name="capital_id" id="capital_id" required>
                                            @foreach ($capitals as $id => $entry)
                                                <option value="{{ $id }}"
                                                    {{ (old('capital_id') ? old('capital_id') : $controlKey->capital->id ?? '') == $id ? 'selected' : '' }}>
                                                    {{ $entry }}</option>
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
                                    <div class="form-group w-50">
                                        <label class="required"
                                            for="macroprocess_id">{{ trans('cruds.controlKey.fields.macroprocess') }}</label>
                                        <select class="form-control" name="macroprocess_id" id="macroprocess_id" required>
                                            @foreach ($macroprocesses as $id => $entry)
                                                <option value="{{ $id }}"
                                                    {{ (old('macroprocess_id') ? old('macroprocess_id') : $controlKey->macroprocess->id ?? '') == $id ? 'selected' : '' }}>
                                                    {{ $entry }}</option>
                                            @endforeach
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
                                            value="{{ old('title', $controlKey->title) }}" required>
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
                                        <input class="form-control" type="text" name="index" id="index"
                                            value="{{ old('index', $controlKey->index) }}" disabled>
                                        @if ($errors->has('index'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('index') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.controlKey.fields.index_helper') }}</span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="form-group pr-3 flex-fill">
                                        <label class="required"
                                            for="control_manager">{{ trans('cruds.controlKey.fields.control_manager') }}</label>
                                        <input class="form-control" type="text" name="control_manager"
                                            id="control_manager"
                                            value="{{ old('control_manager', $controlKey->control_manager) }}" required>
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
                                            value="{{ old('control_deputy', $controlKey->control_deputy) }}">
                                        @if ($errors->has('control_deputy'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('control_deputy') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.controlKey.fields.control_deputy_helper') }}</span>
                                    </div>
                                </div>

                                <div class="form-group col-3 p-0">
                                    <label class="required"
                                        for="status_id">{{ trans('cruds.controlKey.fields.status') }}</label>
                                    <select class="form-control" name="status_id" id="status_id" required>
                                        @foreach ($statuses as $id => $entry)
                                            <option value="{{ $id }}"
                                                {{ (old('status_id') ? old('status_id') : $controlKey->status->id ?? '') == $id ? 'selected' : '' }}>
                                                {{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('status'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('status') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.controlKey.fields.status_helper') }}</span>
                                </div>
                                <div class="form-group col-3 p-0">
                                    <label for="cadence_id">{{ trans('cruds.controlKey.fields.cadence') }}</label>
                                    <select class="form-control" name="cadence_id" id="cadence_id">
                                        @foreach ($cadences as $id => $entry)
                                            <option value="{{ $id }}"
                                                {{ (old('cadence_id') ? old('cadence_id') : $controlKey->cadence->id ?? '') == $id ? 'selected' : '' }}>
                                                {{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('cadence'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('cadence') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.controlKey.fields.cadence_helper') }}</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($sections as $id => $section)
        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-center">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header cursor-pointer" data-toggle="collapse"
                            data-target="#collapseSection{{ $id }}" aria-expanded="false"
                            style="cursor: pointer;" aria-controls="collapseSection{{ $id }}">
                            {{ $section['title_' . session('language')] }}
                        </div>
                        <div class="collapse" id="collapseSection{{ $id }}">
                            <div class="card-body">
                                <div class="container-fluid">
                                    @if ($section['display_order'] != 40)
                                        @foreach ($section['questions'] as $id => $question)
                                            @if ($section['display_order'] === 30 && $question['display_order'] === 40)
                                                <label
                                                    for="title">{{ $question['title_' . session('language')] }}</label>
                                                <div class="container-fluid d-flex justify-content-around">
                                                    <div class="">
                                                        <form id="riskUpdate" method="POST"
                                                            action="{{ route('frontend.risks.update', [$risk->id]) }}"
                                                            enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            @include('components.risk-select')
                                                        </form>
                                                    </div>
                                                    <div class="">
                                                        @include('components.risk-matrix')
                                                    </div>
                                                </div>
                                            @elseif($section['display_order'] === 30 && $question['display_order'] === 50)
                                                <label
                                                    for="title">{{ $question['title_' . session('language')] }}</label>
                                                @include('components.activity-table')
                                            @else
                                                <div class="form-group flex-fill">
                                                    <label
                                                        for="{{ $question['id'] }}">{{ $question['title_' . session('language')] }}</label>
                                                    <textarea id="{{ $question['id'] }}" name="answer{{ $question['id'] }}" class="form-control simplyAnswer"
                                                        placeholder="{{ trans('global.writeHere') }}" style="height: 100px">
@if (isset($simplyAnswer[$question['id']]))
{{ $simplyAnswer[$question['id']]['answer'] }}
@endif
</textarea>
                                                </div>

                                                @if ($section['display_order'] === 60 && $question['display_order'] === 20)
                                                    @include('components.unforeseen-risk')
                                                @endif
                                            @endif
                                        @endforeach
                                    @else
                                        @include('components.periods-table')
                                        @include('components.fraud-questions')
                                        @foreach ($section['questions'] as $id => $question)
                                            @if ($question['display_order'] == 90)
                                                <div class="form-group flex-fill">
                                                    <label
                                                        for="{{ $question['id'] }}">{{ $question['title_' . session('language')] }}</label>
                                                    <textarea id="{{ $question['id'] }}" name="answer{{ $question['id'] }}" class="form-control simplyAnswer"
                                                        placeholder="{{ trans('global.writeHere') }}" style="height: 100px">
@if (isset($simplyAnswer[$question['id']]))
{{ $simplyAnswer[$question['id']]['answer'] }}
@endif
</textarea>
                                                </div>
                                            @endif
                                        @endforeach

                                        @include('components.auto-risk-matrix')
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="container d-flex justify-content-around align-items-center w-100 mt-5">
        <button id="saveBtn" class="btn btn-success px-5 pt-3 pb-3" type="submit" style="font-size: 1.5rem">
            {{ trans('global.save') }}
        </button>
    </div>

    <script>
        const headerURL = "{{ route('frontend.control-keys.update', [$controlKey->id]) }}";
        const simplyQuestionURL = "{{ route('frontend.question-answers.update') }}";
        const riskURL = "{{ route('frontend.risks.update', [$risk->id]) }}";
        const activityURL = "{{ route('frontend.activities.update') }}";
        const periodQuestionURL = "{{ route('frontend.period-answers.update') }}";
        const fraudAnswerURL = "{{ route('frontend.fraud-answers.update') }}"
        const crfToken = "{{ csrf_token() }}";
        const controlKeyId = "{{ $controlKey->id }}";

        infoShowTime();
        infoShowStatus();

        function infoShowTime(){
            var deadline = new Date("{{$controlKey->updated_at}}")
            var currentDate = new Date()

            deadline.setFullYear(deadline.getFullYear()+1)

            var differenceInDays = Math.floor((deadline - currentDate) / (1000 * 60 * 60 * 24));

            if (differenceInDays > 6) {
                $("#deadlineInfo").css("background-color", "#32de84").empty().append('<img src="{{asset("img/thumb-up.svg")}}" alt="SVG Image" width="35" height="35" style="filter: brightness(0) invert(1);">');
            }else{
                $("#deadlineInfo").css("background-color", "#D2122E").empty().append('<img src="{{asset("img/time-sand-noTime.svg")}}" alt="SVG Image" width="35" height="35" style="filter: brightness(0) invert(1);">');
            }

        }

        function infoShowStatus() {
            var status = "{{$controlKey->status_id}}"
            
            if (status == 3) {
                $("#statusInfo").css("background-color", "#D2122E").empty().append('<img src="{{asset("img/delete.svg")}}" alt="SVG Image" width="35" height="35" style="filter: brightness(0) invert(1);">');
            } else if (status == 2) {
                $("#statusInfo").css("background-color", "#32de84").empty().append('<img src="{{asset("img/thumb-up.svg")}}" alt="SVG Image" width="35" height="35" style="filter: brightness(0) invert(1);">');
            } else if (status == 1) {
                $("#statusInfo").css("background-color", "#FEBE10").empty().append('<img src="{{asset("img/write.svg")}}" alt="SVG Image" width="35" height="35" style="filter: brightness(0) invert(1);">');
            }
        }

        function infoShowRisk(finalRiskValue) {
            if (finalRiskValue >= 0.6) {
                $("#riskInfo").css("background-color", "#D2122E").empty().append('<img src="{{asset("img/emoji-sad.svg")}}" alt="SVG Image" width="35" height="35" style="filter: brightness(0) invert(1);">');
            } else if (finalRiskValue > 0.24) {
                $("#riskInfo").css("background-color", "#FEBE10").empty().append('<img src="{{asset("img/emoji-neutral.svg")}}" alt="SVG Image" width="35" height="35" style="filter: brightness(0) invert(1);">');
            } else if (finalRiskValue <= 0.24) {
                $("#riskInfo").css("background-color", "#32de84").empty().append('<img src="{{asset("img/emoji-laugh.svg")}}" alt="SVG Image" width="35" height="35" style="filter: brightness(0) invert(1);">');
            }
        }

    </script>
    <script src="{{ asset('js/controlKey/controlKeySendData.js') }}"></script>
@endsection
