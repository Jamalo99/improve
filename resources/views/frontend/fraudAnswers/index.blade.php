@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.fraudAnswer.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-FraudAnswer">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.fraudAnswer.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fraudAnswer.fields.question') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fraudAnswer.fields.protocol') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fraudAnswer.fields.fraud_question') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.fraudAnswer.fields.answer') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fraudAnswers as $key => $fraudAnswer)
                                    <tr data-entry-id="{{ $fraudAnswer->id }}">
                                        <td>
                                            {{ $fraudAnswer->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fraudAnswer->question->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fraudAnswer->protocol->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fraudAnswer->fraud_question->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $fraudAnswer->answer ?? '' }}
                                        </td>
                                        <td>

                                            @can('fraud_answer_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.fraud-answers.edit', $fraudAnswer->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('fraud_answer_delete')
                                                <form action="{{ route('frontend.fraud-answers.destroy', $fraudAnswer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('fraud_answer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.fraud-answers.massDestroy') }}",
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
  let table = $('.datatable-FraudAnswer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection