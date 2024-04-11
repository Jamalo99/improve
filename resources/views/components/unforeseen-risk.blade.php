<div>
    <div class="d-flex">
        <div class="container border col-5">
            <div class="row align-items-center h-100 p-4">
                <div class="col container">
                    <div class="row h5">{{ trans('global.final_result_imprevist') }}:</div>
                    <div class="row">
                        <div class="d-flex w-60 align-items-center">
                            <div id="imprevistFactor"
                                class="d-flex justify-content-center align-items-center h2 border rounded w-25 pt-3 pb-3 px-5">
                                -
                            </div>
                            <div class="font-weight-bold h5 ml-5">
                                {{ trans('global.up100') }}%</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="h5">{{ trans('global.final_result') }}</div>
                    </div>
                    <div class="row">
                        <div class="" id="finalImprevistFactor">-</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="border col-7 p-4 container w-100">
            <div class="row">
                <div class="container w-100">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center align-middle">{{ trans('global.procedure_percent') }}</td>
                                <td class="text-center align-middle">{{ trans('global.critic_percent') }}</td>
                                <td class="text-center align-middle">{{ trans('global.procedures') }}</td>
                                <td class="text-center align-middle">{{ trans('global.critics') }}</td>
                                <td class="text-center align-middle">{{ trans('global.unforseen_factor') }}</td>
                                <td class="text-center align-middle">{{ trans('global.unexpected') }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="procedureUnforseenPercent" class="text-center align-middle">-</td>
                                <td id="criticalUnforseenPercent" class="text-center align-middle"></td>
                                <td id="procedureUnforseen" class="text-center align-middle">-</td>
                                <td id="criticalUnforseen" class="text-center align-middle">-</td>
                                <td id="factorUnforseen" class="text-center align-middle"></td>
                                <td class="text-center align-middle">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-8">
                    <div class="d-flex w-100">
                        <div class="border px-4 py-2 text-center"
                            style="writing-mode: vertical-lr; transform: rotate(180deg); text-align:center">
                            {{ trans('global.critics') }}
                        </div>
                        <div class="w-100">
                            <table id="riskImprevistMatrix" class="w-100 m-0 table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="border px-4 py-2 text-center">5</th>
                                        <td id="imprevistCell_1_1" class="border px-4 py-2 text-center"
                                            style="background-color: #5ed0f6;"></td>
                                        <td id="imprevistCell_1_2" class="border px-4 py-2 text-center"
                                            style="background-color: #b87ef5;"></td>
                                        <td id="imprevistCell_1_3" class="border px-4 py-2 text-center"
                                            style="background-color: #e53ea8;"></td>
                                        <td id="imprevistCell_1_4" class="border px-4 py-2 text-center"
                                            style="background-color: #e53ea8;"></td>
                                        <td id="imprevistCell_1_5" class="border px-4 py-2 text-center"
                                            style="background-color: #e53ea8;"></td>
                                    </tr>
                                    <tr>
                                        <th class="border px-4 py-2 text-center">4</th>
                                        <td id="imprevistCell_2_1" class="border px-4 py-2 text-center"
                                            style="background-color: #5ed0f6;"></td>
                                        <td id="imprevistCell_2_2" class="border px-4 py-2 text-center"
                                            style="background-color: #b87ef5;"></td>
                                        <td id="imprevistCell_2_3" class="border px-4 py-2 text-center"
                                            style="background-color: #b87ef5;"></td>
                                        <td id="imprevistCell_2_4" class="border px-4 py-2 text-center"
                                            style="background-color: #e53ea8;"></td>
                                        <td id="imprevistCell_2_5" class="border px-4 py-2 text-center"
                                            style="background-color: #e53ea8;"></td>
                                    </tr>
                                    <tr>
                                        <th class="border px-4 py-2 text-center">3</th>
                                        <td id="imprevistCell_3_1" class="border px-4 py-2 text-center"
                                            style="background-color: #aee4f1;"></td>
                                        <td id="imprevistCell_3_2" class="border px-4 py-2 text-center"
                                            style="background-color: #5ed0f6;"></td>
                                        <td id="imprevistCell_3_3" class="border px-4 py-2 text-center"
                                            style="background-color: #b87ef5;"></td>
                                        <td id="imprevistCell_3_4" class="border px-4 py-2 text-center"
                                            style="background-color: #b87ef5;"></td>
                                        <td id="imprevistCell_3_5" class="border px-4 py-2 text-center"
                                            style="background-color: #e53ea8;"></td>
                                    </tr>
                                    <tr>
                                        <th class="border px-4 py-2 text-center">2</th>
                                        <td id="imprevistCell_4_1" class="border px-4 py-2 text-center"
                                            style="background-color: #aee4f1;"></td>
                                        <td id="imprevistCell_4_2" class="border px-4 py-2 text-center"
                                            style="background-color: #5ed0f6;"></td>
                                        <td id="imprevistCell_4_3" class="border px-4 py-2 text-center"
                                            style="background-color: #5ed0f6;"></td>
                                        <td id="imprevistCell_4_4" class="border px-4 py-2 text-center"
                                            style="background-color: #b87ef5;"></td>
                                        <td id="imprevistCell_4_5" class="border px-4 py-2 text-center"
                                            style="background-color: #b87ef5;"></td>
                                    </tr>
                                    <tr>
                                        <th class="border px-4 py-2 text-center">1</th>
                                        <td id="imprevistCell_5_1" class="border px-4 py-2 text-center"
                                            style="background-color: #aee4f1;"></td>
                                        <td id="imprevistCell_5_2" class="border px-4 py-2 text-center"
                                            style="background-color: #aee4f1;"></td>
                                        <td id="imprevistCell_5_3" class="border px-4 py-2 text-center"
                                            style="background-color: #aee4f1;"></td>
                                        <td id="imprevistCell_5_4" class="border px-4 py-2 text-center"
                                            style="background-color: #5ed0f6;"></td>
                                        <td id="imprevistCell_5_5" class="border px-4 py-2 text-center"
                                            style="background-color: #5ed0f6;"></td>
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
                                            {{ trans('global.procedures') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var procedureVal = 0;
    var criticVal = 0;

    function highlightCellImprevist(row, col) {

        var tableId = "riskImprevistMatrix";

        // Remove any previous highlights
        $(`#${tableId} .highlight`).text('').removeClass('highlight');

        // Add the X to the specified cell
        const cellId = `imprevistCell_${row}_${col}`;
        $(`#${cellId}`).text('X').addClass('highlight');
    }

    // Function to handle input coordinates and call highlighting
    function showRiskImprevist() {

        var row = criticVal;
        var col = procedureVal;

        console.log(row, col)

        var tableId = "riskImprevistMatrix";

        if (row && col) {
            const newRow = 6 - row;
            const newCol = col;
            highlightCellImprevist(newRow, newCol);
        } else {
            $(`#${tableId} .highlight`).text('').removeClass('highlight');
            return null;
        }
    }

    function messageRiskImprevist(risk) {
        if (risk >= 60) {
            $('#finalImprevistFactor').empty().removeClass().text(
                "{{ trans('cruds.controlKey.fields.high_risk') }}").addClass(
                'text-danger h3'
            );
        } else if (risk > 25) {
            $('#finalImprevistFactor').empty().removeClass().text(
                "{{ trans('cruds.controlKey.fields.medium_risk') }}").addClass(
                'text-warning h3'
            );
        } else {
            $('#finalImprevistFactor').empty().removeClass().text(
                "{{ trans('cruds.controlKey.fields.low_risk') }}").addClass(
                'text-success h3'
            );
        }
    }

    function unexpectedFactor() {
        var result1 = 2 * criticVal;
        var result2 = 2 * procedureVal

        var finalResult = result1*result2

        messageRiskImprevist(finalResult)

        var value = $('<div>').addClass('h5 m-0 p-2').text(finalResult + "%");
        $('#factorUnforseen').empty().append(value);
        $('#imprevistFactor').empty().text(finalResult + "%");
    }

    function procedurePercent() {
        var descActivityCount = $("#table-body-activity td #desc-activity").filter(function() {
            return $(this).val().trim() !== '';
        }).length;

        var descControlCount = $("#table-body-activity td #desc-control").filter(function() {
            return $(this).val().trim() !== '';
        }).length;

        var activityDataCountQuotient = descControlCount / descActivityCount

        if (isFinite(activityDataCountQuotient)) {
            if (activityDataCountQuotient == 1) {
                activityDataCountQuotient = 0.99 * 100
                var value = $('<div>').addClass('h5 m-0 p-2').text(activityDataCountQuotient + "%");
                $('#procedureUnforseenPercent').empty().append(value);
            } else if (activityDataCountQuotient == 0) {
                activityDataCountQuotient = 0.01 * 100
                var value = $('<div>').addClass('h5 m-0 p-2').text(activityDataCountQuotient + "%");
                $('#procedureUnforseenPercent').empty().append(value);
            } else {
                activityDataCountQuotient = Math.round(activityDataCountQuotient * 100)
                var value = $('<div>').addClass('h5 m-0 p-2').text(activityDataCountQuotient + "%");
                $('#procedureUnforseenPercent').empty().append(value);
            }

            procedure(activityDataCountQuotient);

        } else {
            $('#procedureUnforseenPercent').empty().append("-");
        }

        showRiskImprevist()
        unexpectedFactor()
    }

    function criticPercent() {
        var countCtrManual = 0;
        var countCtrAutomatic = 0;

        $('#table-body-activity').find('select#ctr').each(function() {
            if ($(this).val() === 'manual') {
                countCtrManual++;
            } else if ($(this).val() === 'automatic') {
                countCtrAutomatic++;
            }
        });

        var descActivityCount = $("#table-body-activity td #desc-activity").filter(function() {
            return $(this).val().trim() !== '';
        }).length;

        var valueManual = (0.8 / descActivityCount * countCtrManual);
        var valueAutomatic = (0.99 / descActivityCount * countCtrAutomatic)

        if (!isFinite(valueManual)) {
            valueManual = 0;
        } else if (!isFinite(valueAutomatic)) {
            valueAutomatic = 0;
        }

        var maxValueDescActivityCount = (parseFloat((1 - Math.max(valueAutomatic, valueManual)).toFixed(2))) * 100

        var value = $('<div>').addClass('h5 m-0 p-2').text(maxValueDescActivityCount + "%");
        $('#criticalUnforseenPercent').empty().append(value);

        criticalities(maxValueDescActivityCount);
        showRiskImprevist();
        unexpectedFactor()
    }

    function procedure(value) {

        var result = calculateAvarageMaxRisk(getDataPeriod())

        if (value > 80) {
            value = 5
        } else if (value > 60) {
            value = 4;
        } else if (value > 40) {
            value = 3
        } else if (value > 20) {
            value = 2
        } else {
            value = 1
        }

        if (value > result.averageProbability) {
            var newValue = $('<div>').addClass('h5 m-0 p-2').text(result.averageProbability);
            $('#procedureUnforseen').empty().append(newValue);

            procedureVal = result.averageProbability

        } else {
            var newValue = $('<div>').addClass('h5 m-0 p-2').text(value);
            $('#procedureUnforseen').empty().append(newValue);

            procedureVal = value
        }

    }

    function criticalities(value) {

        var result = calculateAvarageMaxRisk(getDataPeriod())

        if (value > 80) {
            value = 5
        } else if (value > 60) {
            value = 4;
        } else if (value > 40) {
            value = 3
        } else if (value > 20) {
            value = 2
        } else {
            value = 1
        }


        if (value > result.averageImpact) {
            var newValue = $('<div>').addClass('h5 m-0 p-2').text(result.averageImpact);
            $('#criticalUnforseen').empty().append(newValue);

            criticVal = result.averageImpact

        } else {
            var newValue = $('<div>').addClass('h5 m-0 p-2').text(value);
            $('#criticalUnforseen').empty().append(newValue);

            criticVal = value
        }

    }

    procedurePercent();
    criticPercent();
    unexpectedFactor();

    $('#table-body-activity').on('input', '#desc-activity', function() {
        procedurePercent();
        criticPercent();
    });

    $('#table-body-activity').on('input', '#desc-control', function() {
        procedurePercent();
    });

    $('#table-body-activity').on('change', 'select#ctr', function() {
        criticPercent();
    });
</script>
