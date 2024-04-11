@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('macroprocess_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.macroprocesses.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.macroprocess.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.macroprocess.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Macroprocess">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.macroprocess.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.macroprocess.fields.capital') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.macroprocess.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.macroprocess.fields.index') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($macroprocesses as $key => $macroprocess)
                                    <tr data-entry-id="{{ $macroprocess->id }}">
                                        <td>
                                            {{ $macroprocess->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $macroprocess->capital->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $macroprocess->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $macroprocess->index ?? '' }}
                                        </td>
                                        <td>
                                            @can('macroprocess_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.macroprocesses.show', $macroprocess->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('macroprocess_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.macroprocesses.edit', $macroprocess->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('macroprocess_delete')
                                                <form action="{{ route('frontend.macroprocesses.destroy', $macroprocess->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('macroprocess_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.macroprocesses.massDestroy') }}",
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
  let table = $('.datatable-Macroprocess:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection