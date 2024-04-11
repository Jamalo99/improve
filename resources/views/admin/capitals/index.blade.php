@extends('layouts.admin')
@section('content')
@can('capital_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.capitals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.capital.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.capital.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Capital">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.capital.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.capital.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.capital.fields.index') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($capitals as $key => $capital)
                        <tr data-entry-id="{{ $capital->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $capital->id ?? '' }}
                            </td>
                            <td>
                                {{ $capital->name ?? '' }}
                            </td>
                            <td>
                                {{ $capital->index ?? '' }}
                            </td>
                            <td>
                                @can('capital_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.capitals.show', $capital->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('capital_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.capitals.edit', $capital->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('capital_delete')
                                    <form action="{{ route('admin.capitals.destroy', $capital->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('capital_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.capitals.massDestroy') }}",
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
  let table = $('.datatable-Capital:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection