<div class="card">
    <div class="card-header cursor-pointer" data-toggle="collapse" data-target="#collapseSectionThree" aria-expanded="false"
        style="cursor: pointer;" aria-controls="collapseSectionThree">
        {{ trans('formulary.controlKey.section.risk-assessment.title') }}
    </div>
    <div class="collapse" id="collapseSectionThree">
        <div class="card-body">
            <form id="updateControlKeySectionThreeQuestionsOne" method="POST"
                action="{{ route('frontend.question-answers.update') }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" name="controlKeyId" value="{{ $controlKey->id }}">

                <div class="container-fluid">
                    @foreach ($questionsBySection as $sectionId => $sectionQuestions)
                        @if ($sectionId === 'section 3')
                            @php
                                $limitedQuestions = array_slice($sectionQuestions, 0, 3);
                            @endphp
                            @foreach ($limitedQuestions as $question)
                                <div class="form-group flex-fill">
                                    <label for="title">{{ $question['title'] }}.</label>
                                    <textarea name="{{ $question['id'] }}" class="form-control" placeholder="{{ trans('global.writeHere') }}"
                                        style="height: 100px">
@if (isset($question['answers']) && isset($question['answers'][0]))
{{ $question['answers'][0] }}
@endif
</textarea>
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.controlKey.fields.title_helper') }}</span>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </form>

            <div class="container-fluid">
                <div class="mb-3">{{ trans('formulary.controlKey.section.risk-assessment.risk-factor-estimation') }}:</div>
                <div class="d-flex justify-content-between w-100 pt-4 pb-4">
                    <div class="w-50">
                        <form id="riskUpdate" method="POST" action="{{ route('frontend.risks.update', [$risk->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="container-fluid d-flex justify-content-around">
                                <div>
                                    <label class="required"
                                        for="impact_id">{{ trans('cruds.controlKey.fields.impact') }}</label>
                                    <select id="impact" class="form-control mt-1 block w-full" name="impact">
                                        @foreach ($impacts as $impact)
                                            <option value="{{ $impact->id }}"
                                                @if ($risk->impact_id == $impact->id) selected @endif>{{ $impact->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div id="impactShow"
                                        class="d-flex justify-content-center align-items-center rounded mt-2 bg-dark text-white"
                                        style="width: 100%; height: 10rem;">
                                    </div>
                                </div>

                                <div>
                                    <label class="required"
                                        for="probability_id">{{ trans('cruds.controlKey.fields.probability') }}</label>
                                    <select id="probability" class="form-control mt-1 block w-full" name="probability">
                                        <option value="" @if ($risk->probability_id == null) selected @endif>---
                                        </option>
                                        @foreach ($probabilities as $probability)
                                            <option value="{{ $probability->id }}"
                                                @if ($risk->probability_id == $probability->id) selected @endif>
                                                {{ $probability->name }}</option>
                                        @endforeach
                                    </select>

                                    <div id="probabilityShow"
                                        class="d-flex justify-content-center align-items-center rounded mt-2 bg-dark text-white"
                                        style="width: 100%; height: 10rem;">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <x-risk-matrix class="w-50" />
                </div>

                <div class="font-weight-medium h5 text-gray-700">
                    {{ trans('formulary.controlKey.section.risk-assessment.final-outcome') }}.</div>
                <div class="d-flex w-50 align-items-center">
                    <div id="riskFactor"
                        class="d-flex justify-content-center align-items-center h2 border rounded w-25 pt-3 pb-3">
                        -
                    </div>
                    <div class="font-weight-bold h5 ml-5">
                        {{ trans('formulary.controlKey.section.risk-assessment.up100') }}</div>
                </div>
                <div class="mt-3 font-weight-medium h6 text-gray-700">
                    {{ trans('formulary.controlKey.section.risk-assessment.final-result') }}:</div>
                <div id="finalRiskResult">-</div>
            </div>

            <div class="container-fluid mt-5">
                <div class="mb-2">{{ trans('formulary.controlKey.section.risk-assessment.desc-activity') }}.</div>
                @include('components.activity-table')
            </div>

            <form id="updateControlKeySectionThreeQuestionsTwo" method="POST" class="mt-5"
                action="{{ route('frontend.question-answers.update') }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" name="controlKeyId" value="{{ $controlKey->id }}">

                <div class="container-fluid">
                    @foreach ($questionsBySection as $sectionId => $sectionQuestions)
                        @if ($sectionId === 'section 3')
                            @php
                                $limitedQuestions = array_slice($sectionQuestions, 4, 6);
                            @endphp
                            @foreach ($limitedQuestions as $question)
                                <div class="form-group flex-fill">
                                    <label for="title">{{ $question['title'] }}.</label>
                                    <textarea name="{{ $question['id'] }}" class="form-control" placeholder="{{ trans('global.writeHere') }}"
                                        style="height: 100px">
@if (isset($question['answers']) && isset($question['answers'][0]))
{{ $question['answers'][0] }}
@endif
</textarea>
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.controlKey.fields.title_helper') }}</span>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </form>


            <div class="form-group d-flex justify-content-end align-items-center">
                <svg id="checkSectionThree" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    fill="green" class="bi bi-check-circle mr-4" style="display: none;" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                </svg>
                <button id="saveBtnSectionThree" class="btn btn-dark" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            <div id="updateDateSectionThree" class="d-flex justify-content-end" style="display: none;"><span
                    id="savedTimeSectionThree"></span>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //Save header
        $('#saveBtnSectionThree').on('click', function(event) {
            event.preventDefault();

            $('#checkSectionThree').hide();
            $('#updateDateSectionThree').hide();

            //answer update
            jQuery.ajax({
                url: "{{ route('frontend.question-answers.update') }}",
                data: jQuery(
                        '#updateControlKeySectionThreeQuestionsOne, #updateControlKeySectionThreeQuestionsTwo'
                    ).serialize() +
                    "&_token={{ csrf_token() }}",
                type: 'PUT',

                success: function() {
                    // Show the SVG on success
                    $('#checkSectionThree').show();

                    // Get the current timestamp
                    var saveTime = Date.now();

                    // Set the value of hidden input and update displayed time
                    $('#savedTimeSectionThree').val(saveTime);
                    $('#savedTimeSectionThree').text(new Date(saveTime).toLocaleString());

                    $('#updateDateSectionThree').show();

                    $('.text-red-500').text(
                        ""); // Hide all elements with class 'text-red-500'
                },
                error: function(xhr, status, error) {
                    // Se la richiesta fallisce...
                    var errors = xhr.responseJSON.errors;

                    // Mostrare i messaggi di errore
                    $.each(errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            });

            jQuery.ajax({
                url: "{{ route('frontend.risks.update', [$risk->id]) }}",
                data: jQuery('#riskUpdate').serialize() +
                    "&_token={{ csrf_token() }}",
                type: 'PUT',

                success: function(response) {
                    console.log(response)
                    // Show the SVG on success
                    $('#checkSectionThree').show();

                    // Get the current timestamp
                    var saveTime = Date.now();

                    // Set the value of hidden input and update displayed time
                    $('#savedTimeSectionThree').val(saveTime);
                    $('#savedTimeSectionThree').text(new Date(saveTime).toLocaleString());

                    $('#updateDateSectionThree').show();

                    $('.text-red-500').text(
                        ""); // Hide all elements with class 'text-red-500'
                },
                error: function(xhr, status, error) {
                    // Se la richiesta fallisce...
                    var errors = xhr.responseJSON.errors;

                    // Mostrare i messaggi di errore
                    $.each(errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            });
        });

        /*Script for the risk table */

        function calcFinalRisk(row, col) {
            var result1 = (10 / 5) * row
            var result2 = (10 / 5) * col

            var finalResult = ((result1 * result2) / 100).toFixed(2)

            if (finalResult) {
                return (finalResult)
            } else {
                return null
            }
        }

        function messageRisk(risk) {
            if (risk >= 60) {
                $('#finalRiskResult').empty().removeClass().text(
                    "{{ trans('cruds.controlKey.fields.high_risk') }}").addClass(
                    'text-danger h3'
                );
            } else if (risk > 25) {
                $('#finalRiskResult').empty().removeClass().text(
                    "{{ trans('cruds.controlKey.fields.medium_risk') }}").addClass(
                    'text-warning h3'
                );
            } else {
                $('#finalRiskResult').empty().removeClass().text(
                    "{{ trans('cruds.controlKey.fields.low_risk') }}").addClass(
                    'text-success h3'
                );
            }
        }

        // Initialisation of row and col values
        var col = $("#probability").val();
        var row = $("#impact").val();

        if (row && col) {
            // Shows the initial risk
            showRisk(row, col);

            var selectedValue = $('<div>').addClass('display-1').text(col);
            $('#probabilityShow').empty().append(selectedValue);

            var selectedValue = $('<div>').addClass('display-1').text(row);
            $('#impactShow').empty().append(selectedValue);

            var resultFinalRisk = calcFinalRisk(row, col) * 100;
            $('#riskFactor').empty().text(resultFinalRisk + '%');

            messageRisk(resultFinalRisk);
        }

        // Updates row and col values when select value changes
        $("#probability, #impact").change(function() {
            col = $("#probability").val();
            row = $("#impact").val();

            console.log(col, row)

            $('#riskFactor').empty().text('-');
            $('#finalRiskResult').empty().removeClass().text('-');

            if (row && col) {
                var selectedValue = $('<div>').addClass('display-1').text(col);
                $('#probabilityShow').empty().append(selectedValue);

                var selectedValue = $('<div>').addClass('display-1').text(row);
                $('#impactShow').empty().append(selectedValue);

                showRisk(row, col);

                var resultFinalRisk = calcFinalRisk(row, col) * 100;
                $('#riskFactor').empty().text(resultFinalRisk + '%');

                messageRisk(resultFinalRisk);

            } else if (col) {
                var selectedValue = $('<div>').addClass('display-1').text(col);
                $('#probabilityShow').empty().append(selectedValue)

                $('#impactShow').empty()
                showRisk();
            } else if (row) {
                var selectedValue = $('<div>').addClass('display-1').text(row);
                $('#impactShow').empty().append(selectedValue);

                $('#probabilityShow').empty()
                showRisk();
            } else {
                $('#probabilityShow').empty()
                $('#impactShow').empty()
                showRisk();
            }
        });

    });
</script>
