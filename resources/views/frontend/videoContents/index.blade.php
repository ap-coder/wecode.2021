@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('video_content_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.video-contents.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.videoContent.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.videoContent.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-VideoContent">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.videoContent.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.videoContent.fields.published') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.videoContent.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.videoContent.fields.video_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.videoContent.fields.order') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videoContents as $key => $videoContent)
                                    <tr data-entry-id="{{ $videoContent->id }}">
                                        <td>
                                            {{ $videoContent->id ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $videoContent->published ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $videoContent->published ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $videoContent->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\VideoContent::VIDEO_TYPE_RADIO[$videoContent->video_type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $videoContent->order ?? '' }}
                                        </td>
                                        <td>
                                            @can('video_content_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.video-contents.show', $videoContent->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('video_content_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.video-contents.edit', $videoContent->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('video_content_delete')
                                                <form action="{{ route('frontend.video-contents.destroy', $videoContent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('video_content_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.video-contents.massDestroy') }}",
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
  let table = $('.datatable-VideoContent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection