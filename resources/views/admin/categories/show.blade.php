@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.category.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $category->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.slug') }}
                        </th>
                        <td>
                            {{ $category->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.description') }}
                        </th>
                        <td>
                            {{ $category->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.photo') }}
                        </th>
                        <td>
                            @if($category->photo)
                                <a href="{{ $category->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $category->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.homepage') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $category->homepage ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
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
            <a class="nav-link" href="#category_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.post.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#category_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="category_posts">
            @includeIf('admin.categories.relationships.categoryPosts', ['posts' => $category->categoryPosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="category_projects">
            @includeIf('admin.categories.relationships.categoryProjects', ['projects' => $category->categoryProjects])
        </div>
    </div>
</div>

@endsection