@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('protocol_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.protocols.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.protocol.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.protocol.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Protocol">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.protocol.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocol.fields.workspace') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocol.fields.capital') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocol.fields.macroprocess') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocol.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocol.fields.index') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocol.fields.control_manager') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocol.fields.control_deputy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocol.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($protocols as $key => $protocol)
                                    <tr data-entry-id="{{ $protocol->id }}">
                                        <td>
                                            {{ $protocol->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocol->workspace->owner ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocol->capital->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocol->macroprocess->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocol->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocol->index ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocol->control_manager ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocol->control_deputy ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocol->status->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('protocol_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.protocols.show', $protocol->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('protocol_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.protocols.edit', $protocol->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('protocol_delete')
                                                <form action="{{ route('frontend.protocols.destroy', $protocol->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('protocol_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.protocols.massDestroy') }}",
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
  let table = $('.datatable-Protocol:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection