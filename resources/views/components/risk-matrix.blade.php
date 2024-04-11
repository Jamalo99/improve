<div>
    <div class="d-flex w-100">
        <div class="border px-4 py-2 text-center"
            style="writing-mode: vertical-lr; transform: rotate(180deg); text-align:center">
            {{ trans('cruds.impact.title') }}
        </div>
        <div class="w-100">
            <table id="riskMatrix" class="w-100 m-0 table table-bordered">
                <tbody>
                    <tr>
                        <th class="border px-4 py-2 text-center">5</th>
                        <td id="cell_1_1" class="border px-4 py-2 text-center" style="background-color: #F6E05E;"></td>
                        <td id="cell_1_2" class="border px-4 py-2 text-center" style="background-color: #F97316;"></td>
                        <td id="cell_1_3" class="border px-4 py-2 text-center" style="background-color: #E53E3E;"></td>
                        <td id="cell_1_4" class="border px-4 py-2 text-center" style="background-color: #E53E3E;"></td>
                        <td id="cell_1_5" class="border px-4 py-2 text-center" style="background-color: #E53E3E;"></td>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2 text-center">4</th>
                        <td id="cell_2_1" class="border px-4 py-2 text-center" style="background-color: #F6E05E;"></td>
                        <td id="cell_2_2" class="border px-4 py-2 text-center" style="background-color: #F97316;"></td>
                        <td id="cell_2_3" class="border px-4 py-2 text-center" style="background-color: #F97316;"></td>
                        <td id="cell_2_4" class="border px-4 py-2 text-center" style="background-color: #E53E3E;"></td>
                        <td id="cell_2_5" class="border px-4 py-2 text-center" style="background-color: #E53E3E;"></td>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2 text-center">3</th>
                        <td id="cell_3_1" class="border px-4 py-2 text-center" style="background-color: #48BB78;"></td>
                        <td id="cell_3_2" class="border px-4 py-2 text-center" style="background-color: #F6E05E;"></td>
                        <td id="cell_3_3" class="border px-4 py-2 text-center" style="background-color: #F97316;"></td>
                        <td id="cell_3_4" class="border px-4 py-2 text-center" style="background-color: #F97316;"></td>
                        <td id="cell_3_5" class="border px-4 py-2 text-center" style="background-color: #E53E3E;"></td>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2 text-center">2</th>
                        <td id="cell_4_1" class="border px-4 py-2 text-center" style="background-color: #48BB78;"></td>
                        <td id="cell_4_2" class="border px-4 py-2 text-center" style="background-color: #F6E05E;"></td>
                        <td id="cell_4_3" class="border px-4 py-2 text-center" style="background-color: #F6E05E;"></td>
                        <td id="cell_4_4" class="border px-4 py-2 text-center" style="background-color: #F97316;"></td>
                        <td id="cell_4_5" class="border px-4 py-2 text-center" style="background-color: #F97316;"></td>
                    </tr>
                    <tr>
                        <th class="border px-4 py-2 text-center">1</th>
                        <td id="cell_5_1" class="border px-4 py-2 text-center" style="background-color: #48BB78;"></td>
                        <td id="cell_5_2" class="border px-4 py-2 text-center" style="background-color: #48BB78;"></td>
                        <td id="cell_5_3" class="border px-4 py-2 text-center" style="background-color: #48BB78;"></td>
                        <td id="cell_5_4" class="border px-4 py-2 text-center" style="background-color: #F6E05E;"></td>
                        <td id="cell_5_5" class="border px-4 py-2 text-center" style="background-color: #F6E05E;"></td>
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
                        <td colspan="6" class="border px-4 py-2 text-center">{{ trans('cruds.probability.title') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function highlightCell(row, col) {
        
        var tableId = "riskMatrix";

        // Remove any previous highlights
        $(`#${tableId} .highlight`).text('').removeClass('highlight');

        // Add the X to the specified cell
        const cellId = `cell_${row}_${col}`;
        $('#' + cellId).text('X').addClass('highlight');
    }

    // Function to handle input coordinates and call highlighting
    function showRisk(row, col) {
        var tableId = "riskMatrix";
        if (row && col) {
            const newRow = 6 - parseInt(row);
            const newCol = parseInt(col);
            highlightCell(newRow, newCol);
        } else {
            $(`#${tableId} .highlight`).text('').removeClass('highlight');
            return null;
        }
    }
</script>
