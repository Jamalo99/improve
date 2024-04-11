@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.section.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Section">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
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
                            {{ trans('cruds.section.fields.title_it') }}
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.title_en') }}
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.display_order') }}
                        </th>
                        <th>
                            {{ trans('cruds.section.fields.original') }}
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

                            </td>
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
                                {{ $section->title_it ?? '' }}
                            </td>
                            <td>
                                {{ $section->title_en ?? '' }}
                            </td>
                            <td>
                                {{ $section->display_order ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $section->original ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $section->original ? 'checked' : '' }}>
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