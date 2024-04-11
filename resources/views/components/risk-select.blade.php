<div class="container-fluid d-flex justify-content-around">
    <div>
        <label class="text-muted" for="impact_id">{{ trans('cruds.impact.title') }}</label>
        <select id="impact" class="form-control mt-1 block w-full" name="impact">

            @foreach ($impacts as $id => $impact)
                <option value="{{ $id }}" {{ $risk->impact_id == $id ? 'selected' : '' }}>
                    {{ $impact }}
                </option>
            @endforeach
        </select>

        <div id="impactShow" class="d-flex justify-content-center align-items-center rounded mt-2 bg-dark text-white"
            style="width: 100%; height: 10rem;">
        </div>
    </div>
    <div>
        <label class="text-muted" for="probability_id">{{ trans('cruds.probability.title') }}</label>
        <select id="probability" class="form-control mt-1 block w-full" name="probability">
            @foreach ($probabilities as $id => $probability)
                <option value="{{ $id }}" {{ $risk->probability_id == $id ? 'selected' : '' }}>
                    {{ $probability }}
                </option>
            @endforeach
        </select>

        <div id="probabilityShow"
            class="d-flex justify-content-center align-items-center rounded mt-2 bg-dark text-white"
            style="width: 100%; height: 10rem;">
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="font-weight-medium h5 text-gray-700">
        {{ trans('global.final_outcome') }}</div>
    <div class="d-flex w-60 align-items-center">
        <div id="riskFactor"
            class="d-flex justify-content-center align-items-center h2 border rounded w-25 pt-3 pb-3 px-5">
            -
        </div>
        <div class="font-weight-bold h5 ml-5">
            {{ trans('global.up100') }}%</div>
    </div>
    <div class="mt-3 font-weight-medium h6 text-gray-700">
        {{ trans('global.final_result') }}</div>
    <div id="finalRiskResult">-</div>
</div>


<script>
    $(document).ready(function() {

        /*Script for the risk table */

        function calcFinalRisk(row, col) {
            var result1 = (10 / 5) * row
            var result2 = (10 / 5) * col

            var finalResult = ((result1 * result2) / 100).toFixed(2)

            if (finalResult) {
                infoShowRisk(finalResult);
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

            //console.log(col, row)

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
