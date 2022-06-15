@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reply.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.replies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.id') }}
                        </th>
                        <td>
                            {{ $reply->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.author') }}
                        </th>
                        <td>
                            {{ $reply->author->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $reply->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.private') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $reply->private ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.best_answer') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $reply->best_answer ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.thread') }}
                        </th>
                        <td>
                            {{ $reply->thread->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.content_area') }}
                        </th>
                        <td>
                            {!! $reply->content_area !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.attachments') }}
                        </th>
                        <td>
                            @if($reply->attachments)
                                @foreach($reply->attachments as $key => $media)
                                    <a href="{{ @get_attachment_url($media,'full') }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            @endif
                            
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.main_photo') }}
                        </th>
                        <td>
                            @if($reply->main_photo)
                                <a href="{{ @get_attachment_url(@$reply->main_photo,'full') }}" target="_blank" style="display: inline-block">
                                    <img src="{{ @get_attachment_url(@$reply->main_photo) }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reply.fields.additional_photos') }}
                        </th>
                        <td>
                            @if ($reply->additional_photos)
                            @foreach($reply->additional_photos as $key => $media)
                            <a href="{{ @get_attachment_url($media,'full') }}" target="_blank" style="display: inline-block">
                                <img src="{{ @get_attachment_url($media) }}">
                            </a>
                        @endforeach
                            @endif
                            
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.replies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection