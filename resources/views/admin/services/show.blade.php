@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.service.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.id') }}
                        </th>
                        <td>
                            {{ $service->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.title') }}
                        </th>
                        <td>
                            {{ $service->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.sub_title') }}
                        </th>
                        <td>
                            {{ $service->sub_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.service_text') }}
                        </th>
                        <td>
                            {!! $service->service_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.service_text_2') }}
                        </th>
                        <td>
                            {!! $service->service_text_2 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.excerpt') }}
                        </th>
                        <td>
                            {{ $service->excerpt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.price') }}
                        </th>
                        <td>
                            {{ $service->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.featured_image') }}
                        </th>
                        <td>
                            @if($service->featured_image)
                                <a href="{{ @get_attachment_url($service->featured_image,'full') }}" target="_blank" style="display: inline-block">
                                    <img src="{{ @get_attachment_url($service->featured_image) }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.content_images') }}
                        </th>
                        <td>
                            @foreach($service->content_images as $key => $media)
                                <a href="{{ @get_attachment_url($media,'full') }}" target="_blank" style="display: inline-block">
                                    <img src="{{ @get_attachment_url($media) }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.meta_title') }}
                        </th>
                        <td>
                            {{ $service->meta_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.meta_description') }}
                        </th>
                        <td>
                            {{ $service->meta_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.facebook_title') }}
                        </th>
                        <td>
                            {{ $service->facebook_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.facebook_desc') }}
                        </th>
                        <td>
                            {{ $service->facebook_desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.banner') }}
                        </th>
                        <td>
                            @if($service->banner)
                                <a href="{{ @get_attachment_url($service->banner,'full') }}" target="_blank" style="display: inline-block">
                                    <img src="{{ @get_attachment_url($service->banner) }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $service->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.slug') }}
                        </th>
                        <td>
                            {{ $service->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection