@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.periodAnswer.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PeriodAnswer">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.question') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.period') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.answer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.probability') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.periodAnswer.fields.impact') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($periodAnswers as $key => $periodAnswer)
                                    <tr data-entry-id="{{ $periodAnswer->id }}">
                                        <td>
                                            {{ $periodAnswer->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $periodAnswer->question->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $periodAnswer->period ?? '' }}
                                        </td>
                                        <td>
                                            {{ $periodAnswer->answer ?? '' }}
                                        </td>
                                        <td>
                                            {{ $periodAnswer->probability->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $periodAnswer->impact->name ?? '' }}
                                        </td>
                                        <td>

                                            @can('period_answer_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.period-answers.edit', $periodAnswer->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('period_answer_delete')
                                                <form action="{{ route('frontend.period-answers.destroy', $periodAnswer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('period_answer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.period-answers.massDestroy') }}",
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
  let table = $('.datatable-PeriodAnswer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection