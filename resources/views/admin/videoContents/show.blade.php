@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.videoContent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.video-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.id') }}
                        </th>
                        <td>
                            {{ $videoContent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $videoContent->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.public_everywhere') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $videoContent->public_everywhere ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.title') }}
                        </th>
                        <td>
                            {{ $videoContent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.alternate_title') }}
                        </th>
                        <td>
                            {{ $videoContent->alternate_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.content_area') }}
                        </th>
                        <td>
                            {!! $videoContent->content_area !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.youtube') }}
                        </th>
                        <td>
                            {{ $videoContent->youtube }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.vimeo') }}
                        </th>
                        <td>
                            {{ $videoContent->vimeo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.other_video') }}
                        </th>
                        <td>
                            {{ $videoContent->other_video }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.meta_title') }}
                        </th>
                        <td>
                            {{ $videoContent->meta_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.meta_description') }}
                        </th>
                        <td>
                            {{ $videoContent->meta_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.fbt') }}
                        </th>
                        <td>
                            {{ $videoContent->fbt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.fbd') }}
                        </th>
                        <td>
                            {{ $videoContent->fbd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.twt') }}
                        </th>
                        <td>
                            {{ $videoContent->twt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.twd') }}
                        </th>
                        <td>
                            {{ $videoContent->twd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.notes_area') }}
                        </th>
                        <td>
                            {{ $videoContent->notes_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.video_type') }}
                        </th>
                        <td>
                            {{ App\Models\VideoContent::VIDEO_TYPE_RADIO[$videoContent->video_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.placeholder') }}
                        </th>
                        <td>
                            @if($videoContent->placeholder)
                                <a href="{{ @get_attachment_url(@$videoContent->placeholder,'full') }}" target="_blank" style="display: inline-block">
                                    <img src="{{ @get_attachment_url(@$videoContent->placeholder) }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.thread') }}
                        </th>
                        <td>
                            {{ $videoContent->thread->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.pages') }}
                        </th>
                        <td>
                            @foreach($videoContent->pages as $key => $pages)
                                <span class="label label-info">{{ $pages->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.videoContent.fields.order') }}
                        </th>
                        <td>
                            {{ $videoContent->order }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.video-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection