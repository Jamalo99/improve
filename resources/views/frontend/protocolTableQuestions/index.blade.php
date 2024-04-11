@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.protocolTableQuestion.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ProtocolTableQuestion">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.protocolTableQuestion.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocolTableQuestion.fields.protocol') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocolTableQuestion.fields.desc_activity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocolTableQuestion.fields.desc_control') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocolTableQuestion.fields.support_info') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocolTableQuestion.fields.probability') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.protocolTableQuestion.fields.impact') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($protocolTableQuestions as $key => $protocolTableQuestion)
                                    <tr data-entry-id="{{ $protocolTableQuestion->id }}">
                                        <td>
                                            {{ $protocolTableQuestion->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocolTableQuestion->protocol->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocolTableQuestion->desc_activity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocolTableQuestion->desc_control ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocolTableQuestion->support_info ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocolTableQuestion->probability->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $protocolTableQuestion->impact->name ?? '' }}
                                        </td>
                                        <td>

                                            @can('protocol_table_question_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.protocol-table-questions.edit', $protocolTableQuestion->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('protocol_table_question_delete')
                                                <form action="{{ route('frontend.protocol-table-questions.destroy', $protocolTableQuestion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('protocol_table_question_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.protocol-table-questions.massDestroy') }}",
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
  let table = $('.datatable-ProtocolTableQuestion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection