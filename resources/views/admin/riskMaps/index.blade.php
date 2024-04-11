@extends('layouts.admin')
@section('content')
@can('risk_map_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.risk-maps.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.riskMap.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.riskMap.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RiskMap">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.workspace') }}
                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.capital') }}
                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.macroprocess') }}
                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.probability') }}
                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.impact') }}
                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.risk_owner') }}
                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.desc_risk') }}
                        </th>
                        <th>
                            {{ trans('cruds.riskMap.fields.controlkey') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riskMaps as $key => $riskMap)
                        <tr data-entry-id="{{ $riskMap->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $riskMap->id ?? '' }}
                            </td>
                            <td>
                                {{ $riskMap->workspace->owner ?? '' }}
                            </td>
                            <td>
                                {{ $riskMap->capital->name ?? '' }}
                            </td>
                            <td>
                                {{ $riskMap->macroprocess->name ?? '' }}
                            </td>
                            <td>
                                {{ $riskMap->probability->name ?? '' }}
                            </td>
                            <td>
                                {{ $riskMap->impact->name ?? '' }}
                            </td>
                            <td>
                                {{ $riskMap->risk_owner ?? '' }}
                            </td>
                            <td>
                                {{ $riskMap->desc_risk ?? '' }}
                            </td>
                            <td>
                                @foreach($riskMap->controlkeys as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('risk_map_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.risk-maps.show', $riskMap->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('risk_map_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.risk-maps.edit', $riskMap->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('risk_map_delete')
                                    <form action="{{ route('admin.risk-maps.destroy', $riskMap->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('risk_map_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.risk-maps.massDestroy') }}",
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
  let table = $('.datatable-RiskMap:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection