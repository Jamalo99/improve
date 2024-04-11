<div class="table-responsive">
    <table id="activityTable" class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">
                    {{trans('global.activity_name')}}
                </th>
                <th scope="col">
                    {{trans('global.activity_description')}}
                </th>
                <th scope="col">
                    {{trans('global.description_control')}}
                </th>
                <th scope="col">
                    {{trans('global.ctr')}}
                </th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="table-body-activity">
            @foreach ($activities as $activity)
                <tr data-id="{{ $activity->id }}">
                    <td>
                        <textarea id="activity-name" rows="1" class="form-control">{{ old('activity_name', $activity->activity) }}</textarea>
                    </td>
                    <td>
                        <textarea id="desc-activity" rows="1" class="form-control">{{ old('desc_activity', $activity->description_activity) }}</textarea>
                    </td>
                    <td>
                        <textarea id="desc-control" rows="1" class="form-control">{{ old('desc_control', $activity->description_control) }}</textarea>
                    </td>
                    <td>
                        <select id='ctr' class='form-control'>
                            <option value='automatic' {{ $activity->ctr == 'automatic' ? 'selected' : '' }}>{{trans('global.automatic')}}
                            </option>
                            <option value='manual' {{ $activity->ctr == 'manual' ? 'selected' : '' }}>{{trans('global.manual')}}</option>
                        </select>
                    </td>
                    <td class='text-center'>
                        <div class='remove-row btn btn-danger'>X</div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div id="add-row-btn" class="btn btn-primary mt-2 mb-4">
        {{trans('global.add_new_row')}}
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#add-row-btn').on('click', function() {
            var newRow = '<tr data-id=null class="bg-danger rounded-lg">' +
                '<td>' +
                '<textarea id="activity-name" rows="1" class="form-control"></textarea>' +
                '</td>' +
                '<td>' +
                '<textarea id="desc-activity" rows="1" class="form-control"></textarea>' +
                '</td>' +
                '<td>' +
                '<textarea id="desc-control" rows="1" class="form-control"></textarea>' +
                '</td>' +
                '<td>' +
                '<select id="ctr" class="form-control">' +
                '<option value="automatic">Automatic</option>' +
                '<option value="manual">Manual</option>' +
                '</select>' +
                '</td>' +
                '<td class="text-center">' +
                '<div class="remove-row btn btn-danger">X</div>' +
                '</td>' +
                '</tr>';

            $('#table-body-activity').append(newRow);

            procedurePercent();
            criticPercent();
        });

        $('#table-body-activity').on('click', '.remove-row', function() {

            procedurePercent();
            criticPercent();

            var row = $(this).closest('tr');

            var dataId = row.data('id');
            var csrfToken = $('input[name="_token"]').val();
            var dataName = row.find('#activity-name').val();

            Swal.fire({
                title: "Are you sure to delete " + dataName,
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    if (dataId === null) {
                        row.remove();
                    } else {
                        $.ajax({
                            url: "{{ route('frontend.activities.destroy') }}",
                            data: {
                                controlKey: {{ $controlKey->id }},
                                activity: dataId,
                                _token: '{{ csrf_token() }}'
                            },
                            type: 'DELETE',
                            success: function() {
                                row.remove();
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: "Error!",
                                    text: "An error occurred while deleting.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                }
            });
        });
    });
</script>
