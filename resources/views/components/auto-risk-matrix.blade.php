<div class="d-flex">
    <div class="border col-8">
        <div>
            <div class="d-flex justify-content-around p-4">
                <div class="container" style="max-width: 12rem;">
                    <label class="text-muted">{{ trans('cruds.impact.title') }}</label>
                    <div id="impactShowAuto"
                        class="d-flex justify-content-center align-items-center rounded mt-2 bg-dark text-white"
                        style="width: 100%; height: 12rem;">
                    </div>
                </div>
                <div class="container" style="max-width: 12rem;">
                    <label class="text-muted">{{ trans('cruds.probability.title') }}</label>
                    <div id="probabilityShowAuto"
                        class="d-flex justify-content-center align-items-center rounded mt-2 bg-dark text-white"
                        style="width: 100%; height: 12rem;">
                    </div>
                </div>
            </div>
            <div class="container mt-5 mb-5">
                <div class="font-weight-medium h5 text-gray-700">
                    {{ trans('global.final_outcome') }}</div>
                <div class="d-flex w-60 align-items-center">
                    <div id="riskFactorAuto"
                        class="d-flex justify-content-center align-items-center h2 border rounded w-25 pt-3 pb-3 px-5">
                        -
                    </div>
                    <div class="font-weight-bold h5 ml-5">
                        {{ trans('global.up100') }}%</div>
                </div>
                <div class="mt-3 font-weight-medium h6 text-gray-700">
                    {{ trans('global.final_result') }}</div>
                <div id="finalRiskResultAuto">-</div>
            </div>
        </div>
    </div>
    <div class="border col-4 p-3">
        <div class="container">
            <div>
                <div class="d-flex w-100">
                    <div class="border px-4 py-2 text-center"
                        style="writing-mode: vertical-lr; transform: rotate(180deg); text-align:center">
                        {{ trans('cruds.impact.title') }}
                    </div>
                    <div class="w-100">
                        <table id="riskMatrixAuto" class="w-100 m-0 table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="border px-4 py-2 text-center">5</th>
                                    <td id="autoCell_1_1" class="border px-4 py-2 text-center"
                                        style="background-color: #F6E05E;"></td>
                                    <td id="autoCell_1_2" class="border px-4 py-2 text-center"
                                        style="background-color: #F97316;"></td>
                                    <td id="autoCell_1_3" class="border px-4 py-2 text-center"
                                        style="background-color: #E53E3E;"></td>
                                    <td id="autoCell_1_4" class="border px-4 py-2 text-center"
                                        style="background-color: #E53E3E;"></td>
                                    <td id="autoCell_1_5" class="border px-4 py-2 text-center"
                                        style="background-color: #E53E3E;"></td>
                                </tr>
                                <tr>
                                    <th class="border px-4 py-2 text-center">4</th>
                                    <td id="autoCell_2_1" class="border px-4 py-2 text-center"
                                        style="background-color: #F6E05E;"></td>
                                    <td id="autoCell_2_2" class="border px-4 py-2 text-center"
                                        style="background-color: #F97316;"></td>
                                    <td id="autoCell_2_3" class="border px-4 py-2 text-center"
                                        style="background-color: #F97316;"></td>
                                    <td id="autoCell_2_4" class="border px-4 py-2 text-center"
                                        style="background-color: #E53E3E;"></td>
                                    <td id="autoCell_2_5" class="border px-4 py-2 text-center"
                                        style="background-color: #E53E3E;"></td>
                                </tr>
                                <tr>
                                    <th class="border px-4 py-2 text-center">3</th>
                                    <td id="autoCell_3_1" class="border px-4 py-2 text-center"
                                        style="background-color: #48BB78;"></td>
                                    <td id="autoCell_3_2" class="border px-4 py-2 text-center"
                                        style="background-color: #F6E05E;"></td>
                                    <td id="autoCell_3_3" class="border px-4 py-2 text-center"
                                        style="background-color: #F97316;"></td>
                                    <td id="autoCell_3_4" class="border px-4 py-2 text-center"
                                        style="background-color: #F97316;"></td>
                                    <td id="autoCell_3_5" class="border px-4 py-2 text-center"
                                        style="background-color: #E53E3E;"></td>
                                </tr>
                                <tr>
                                    <th class="border px-4 py-2 text-center">2</th>
                                    <td id="autoCell_4_1" class="border px-4 py-2 text-center"
                                        style="background-color: #48BB78;"></td>
                                    <td id="autoCell_4_2" class="border px-4 py-2 text-center"
                                        style="background-color: #F6E05E;"></td>
                                    <td id="autoCell_4_3" class="border px-4 py-2 text-center"
                                        style="background-color: #F6E05E;"></td>
                                    <td id="autoCell_4_4" class="border px-4 py-2 text-center"
                                        style="background-color: #F97316;"></td>
                                    <td id="autoCell_4_5" class="border px-4 py-2 text-center"
                                        style="background-color: #F97316;"></td>
                                </tr>
                                <tr>
                                    <th class="border px-4 py-2 text-center">1</th>
                                    <td id="autoCell_5_1" class="border px-4 py-2 text-center"
                                        style="background-color: #48BB78;"></td>
                                    <td id="autoCell_5_2" class="border px-4 py-2 text-center"
                                        style="background-color: #48BB78;"></td>
                                    <td id="autoCell_5_3" class="border px-4 py-2 text-center"
                                        style="background-color: #48BB78;"></td>
                                    <td id="autoCell_5_4" class="border px-4 py-2 text-center"
                                        style="background-color: #F6E05E;"></td>
                                    <td id="autoCell_5_5" class="border px-4 py-2 text-center"
                                        style="background-color: #F6E05E;"></td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2 text-center"></td>
                                    <td class="border px-4 py-2 text-center font-weight-bold">1</td>
                                    <td class="border px-4 py-2 text-center font-weight-bold">2</td>
                                    <td class="border px-4 py-2 text-center font-weight-bold">3</td>
                                    <td class="border px-4 py-2 text-center font-weight-bold">4</td>
                                    <td class="border px-4 py-2 text-center font-weight-bold">5</td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="border px-4 py-2 text-center">
                                        {{ trans('cruds.probability.title') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function highlightCellAuto(row, col) {

        var tableId = "riskMatrixAuto";

        // Remove any previous highlights
        $(`#${tableId} .highlight`).text('').removeClass('highlight');

        // Add the X to the specified cell
        const cellId = `autoCell_${row}_${col}`;
        $(`#${cellId}`).text('X').addClass('highlight');
    }

    // Function to handle input coordinates and call highlighting
    function showRiskAuto(row, col) {

        var tableId = "riskMatrixAuto";

        if (row && col) {
            const newRow = 6 - row;
            const newCol = col;
            highlightCellAuto(newRow, newCol);
        } else {
            $(`#${tableId} .highlight`).text('').removeClass('highlight');
            return null;
        }
    }

    function calcFinalRiskAuto(row, col) {
        var result1 = (10 / 5) * row
        var result2 = (10 / 5) * col

        var finalResult = ((result1 * result2) / 100).toFixed(2)

        if (finalResult) {
            return (finalResult)
        } else {
            return null
        }
    }

    function messageRiskAuto(risk) {
        if (risk >= 60) {
            $('#finalRiskResultAuto').empty().removeClass().text(
                "{{ trans('cruds.controlKey.fields.high_risk') }}").addClass(
                'text-danger h3'
            );
        } else if (risk > 25) {
            $('#finalRiskResultAuto').empty().removeClass().text(
                "{{ trans('cruds.controlKey.fields.medium_risk') }}").addClass(
                'text-warning h3'
            );
        } else {
            $('#finalRiskResultAuto').empty().removeClass().text(
                "{{ trans('cruds.controlKey.fields.low_risk') }}").addClass(
                'text-success h3'
            );
        }
    }


    function getDataPeriod() {
        var periodQuestionToSend = {};

        $('table[name="period-question-table"]').each(function() {
            var table = $(this)
            var tableId = table.data('id')
            var rowData = {}

            table.find('tbody tr').each(function(index) {
                var row = $(this);

                if (index === 0) {
                    row.find('td').each(function() {
                        var cell = $(this)

                        var period = cell.data('id')
                        var answerData = cell.find('select[name="answer"]')
                            .val()

                        rowData[period] = {
                            answer: answerData
                        }
                    })
                } else if (index === 1) {
                    row.find('td').each(function() {
                        var cell = $(this)

                        var period = cell.data('id')
                        var impactData = cell.find('select[name="impact"]')
                            .val()

                        if (typeof impactData !== 'undefined') {
                            rowData[period].impact = impactData;
                        }
                    })
                } else {
                    row.find('td').each(function() {
                        var cell = $(this)

                        var period = cell.data('id')
                        var probabilityData = cell.find(
                                'select[name="probability"]')
                            .val()

                        if (typeof probabilityData !== 'undefined') {
                            rowData[period].probability = probabilityData;
                        }
                    })
                }

            })

            periodQuestionToSend[tableId] = rowData;
        })

        return periodQuestionToSend
    }



    function calculateAvarageMaxRisk(data) {

        var maxRisk = [];
        var avarageMaxRisk = {}

        $.each(data, function(id, rowData) {
            var sumAnswer = 0;
            var sumProbability = 0;
            var sumImpact = 0;
            var lengthImpact = 0;
            var lengthProbability = 0
            var quotientAnswer = 0;
            var RatedToRisk = {};
            var periodCount = Object.keys(rowData).length;
            $.each(rowData, function(period, periodValue) {
                if (periodValue.answer != '') {
                    if (periodValue.answer === 'no') {
                        sumAnswer += 0.95
                    } else if (periodValue.answer === 'partial') {
                        sumAnswer += 0.75
                    } else if (periodValue.answer === 'yes') {
                        sumAnswer += 0.05
                    } else {
                        sumAnswer += 0
                    }
                }

                if (periodValue.probability != '') {
                    sumProbability += parseInt(periodValue.probability)
                    lengthProbability++
                }

                if (periodValue.impact != '') {
                    sumImpact += parseInt(periodValue.probability)
                    lengthImpact++
                }

            })
            quotientAnswer = (sumAnswer / periodCount) * 100;
            RatedToRisk.probability = (((quotientAnswer * 5) / 100) + (sumProbability)) / (lengthProbability +
                1)
            RatedToRisk.impact = (((quotientAnswer * 5) / 100) + (sumImpact)) / (lengthImpact + 1)
            maxRisk.push(RatedToRisk);
        })

        //Avarage probability
        var probabilities = maxRisk.map(item => item.probability);
        var sumProbability = probabilities.reduce((acc, val) => acc + val, 0);
        avarageMaxRisk.averageProbability = Math.round(sumProbability / probabilities.length);

        //Avarage impact
        var impacts = maxRisk.map(item => item.impact);
        var sumImpact = impacts.reduce((acc, val) => acc + val, 0);
        avarageMaxRisk.averageImpact = Math.round(sumImpact / impacts.length);

        return avarageMaxRisk;
    }

    //Recalculates according to changes in select periods
    $('#periodsQuestionForm select').on('change', function() {
        var result = calculateAvarageMaxRisk(getDataPeriod())

        if (!isNaN(result.averageProbability) && !isNaN(result.averageImpact)) {

            var selectedValue = $('<div>').addClass('display-1').text(result.averageProbability);
            $('#probabilityShowAuto').empty().append(selectedValue);

            var selectedValue = $('<div>').addClass('display-1').text(result.averageImpact);
            $('#impactShowAuto').empty().append(selectedValue);

            showRiskAuto(result.averageImpact, result.averageProbability);

            var resultFinalRisk = calcFinalRiskAuto(result.averageImpact, result.averageProbability) * 100;
            $('#riskFactorAuto').empty().text(resultFinalRisk + '%');

            messageRiskAuto(resultFinalRisk);
            procedurePercent();
            criticPercent();

        } else {
            $('#impactShowAuto').empty()
            $('#probabilityShowAuto').empty()
            $('#riskFactorAuto').empty()
            $('#finalRiskResultAuto').empty()
        }


    })

    //Initial result
    var result = calculateAvarageMaxRisk(getDataPeriod())

    var selectedValue = $('<div>').addClass('display-1').text(result.averageProbability);
    $('#probabilityShowAuto').empty().append(selectedValue);

    var selectedValue = $('<div>').addClass('display-1').text(result.averageImpact);
    $('#impactShowAuto').empty().append(selectedValue);

    showRiskAuto(result.averageImpact, result.averageProbability);

    var resultFinalRisk = calcFinalRiskAuto(result.averageImpact, result.averageProbability) * 100;
    $('#riskFactorAuto').empty().text(resultFinalRisk + '%');

    messageRiskAuto(resultFinalRisk);
</script>
