@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.section.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Section">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.section.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.section.fields.control_key_reference') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.section.fields.section_name') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $key => $section)
                                    <tr data-entry-id="{{ $section->id }}">
                                        <td>
                                            {{ $section->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $section->control_key_reference->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $section->section_name ?? '' }}
                                        </td>
                                        <td>



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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Section:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection