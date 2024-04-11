@can('control_key_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.control-keys.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.controlKey.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.controlKey.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userControlKeys">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.controlKey.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.controlKey.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.controlKey.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($controlKeys as $key => $controlKey)
                        <tr data-entry-id="{{ $controlKey->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $controlKey->id ?? '' }}
                            </td>
                            <td>
                                {{ $controlKey->title ?? '' }}
                            </td>
                            <td>
                                {{ $controlKey->user->name ?? '' }}
                            </td>
                            <td>
                                @can('control_key_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.control-keys.show', $controlKey->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('control_key_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.control-keys.edit', $controlKey->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('control_key_delete')
                                    <form action="{{ route('admin.control-keys.destroy', $controlKey->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('control_key_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.control-keys.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-userControlKeys:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection