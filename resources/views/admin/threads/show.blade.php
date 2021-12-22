@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.thread.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.threads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.id') }}
                        </th>
                        <td>
                            {{ $thread->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.title') }}
                        </th>
                        <td>
                            {{ $thread->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.body') }}
                        </th>
                        <td>
                            {!! $thread->body !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $thread->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.photo') }}
                        </th>
                        <td>
                            @if($thread->photo)
                                <a href="{{ $thread->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $thread->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.additional_photos') }}
                        </th>
                        <td>
                            @foreach($thread->additional_photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($thread->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.closed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $thread->closed ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thread.fields.slug') }}
                        </th>
                        <td>
                            {{ $thread->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.threads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#threads_content_sections" role="tab" data-toggle="tab">
                {{ trans('cruds.contentSection.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="threads_content_sections">
            @includeIf('admin.threads.relationships.threadsContentSections', ['contentSections' => $thread->threadsContentSections])
        </div>
    </div>
</div>

@endsection