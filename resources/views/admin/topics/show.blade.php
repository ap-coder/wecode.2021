@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.topic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.topics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.topic.fields.id') }}
                        </th>
                        <td>
                            {{ $topic->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topic.fields.name') }}
                        </th>
                        <td>
                            {{ $topic->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topic.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $topic->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topic.fields.slug') }}
                        </th>
                        <td>
                            {{ $topic->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topic.fields.description') }}
                        </th>
                        <td>
                            {{ $topic->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topic.fields.photo') }}
                        </th>
                        <td>
                            @if($topic->photo)
                                <a href="{{ @get_attachment_url($topic->photo,'full') }}" target="_blank" style="display: inline-block">
                                    <img src="{{ @get_attachment_url($topic->photo) }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.topics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection