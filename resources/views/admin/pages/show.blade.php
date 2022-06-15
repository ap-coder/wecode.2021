@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.page.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.id') }}
                        </th>
                        <td>
                            {{ $page->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.title') }}
                        </th>
                        <td>
                            {{ $page->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.featured_image') }}
                        </th>
                        <td>
                            @if($page->featured_image)
                                <a href="{{ @get_attachment_url(@$page->featured_image,'full') }}" target="_blank" style="display: inline-block">
                                    <img src="{{ @get_attachment_url(@$page->featured_image) }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.sub_title') }}
                        </th>
                        <td>
                            {{ $page->sub_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.excerpt') }}
                        </th>
                        <td>
                            {{ $page->excerpt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.path') }}
                        </th>
                        <td>
                            {{ $page->path }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.slug') }}
                        </th>
                        <td>
                            {{ $page->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.meta_title') }}
                        </th>
                        <td>
                            {{ $page->meta_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.meta_description') }}
                        </th>
                        <td>
                            {{ $page->meta_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.facebook_title') }}
                        </th>
                        <td>
                            {{ $page->facebook_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.facebook_desc') }}
                        </th>
                        <td>
                            {{ $page->facebook_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.twitter_post_title') }}
                        </th>
                        <td>
                            {{ $page->twitter_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.twitter_post_description') }}
                        </th>
                        <td>
                            {{ $page->twitter_description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
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
            <a class="nav-link" href="#pages_video_contents" role="tab" data-toggle="tab">
                {{ trans('cruds.videoContent.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#pages_pagesections" role="tab" data-toggle="tab">
                {{ trans('cruds.pagesection.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#pages_content_sections" role="tab" data-toggle="tab">
                {{ trans('cruds.contentSection.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="pages_video_contents">
            @includeIf('admin.pages.relationships.pagesVideoContents', ['videoContents' => $page->pagesVideoContents])
        </div>
        <div class="tab-pane" role="tabpanel" id="pages_pagesections">
            @includeIf('admin.pages.relationships.pagesPagesections', ['pagesections' => $page->pagesPagesections])
        </div>
        <div class="tab-pane" role="tabpanel" id="pages_content_sections">
            @includeIf('admin.pages.relationships.pagesContentSections', ['contentSections' => $page->pagesContentSections])
        </div>
    </div>
</div>

@endsection