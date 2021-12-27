@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                        </th>
                        <td>
                            {{ $project->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.intro') }}
                        </th>
                        <td>
                            {{ $project->intro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.body_content') }}
                        </th>
                        <td>
                            {!! $project->body_content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.category') }}
                        </th>
                        <td>
                            {{ $project->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $project->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.slug') }}
                        </th>
                        <td>
                            {{ $project->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.client') }}
                        </th>
                        <td>
                            {{ $project->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.start_date') }}
                        </th>
                        <td>
                            {{ $project->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.project_type') }}
                        </th>
                        <td>
                            {{ App\Models\Project::PROJECT_TYPE_SELECT[$project->project_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.challenges') }}
                        </th>
                        <td>
                            {!! $project->challenges !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.solutions') }}
                        </th>
                        <td>
                            {!! $project->solutions !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.header_image') }}
                        </th>
                        <td>
                            @if($project->header_image)
                                <a href="{{ $project->header_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->header_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.featured_image') }}
                        </th>
                        <td>
                            @if($project->featured_image)
                                <a href="{{ $project->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->featured_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.additional_images') }}
                        </th>
                        <td>
                            @foreach($project->additional_images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.challenge_image') }}
                        </th>
                        <td>
                            @if($project->challenge_image)
                                <a href="{{ $project->challenge_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->challenge_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.solution_image') }}
                        </th>
                        <td>
                            @if($project->solution_image)
                                <a href="{{ $project->solution_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->solution_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.meta_title') }}
                        </th>
                        <td>
                            {{ $project->meta_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.meta_description') }}
                        </th>
                        <td>
                            {{ $project->meta_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.fb_title') }}
                        </th>
                        <td>
                            {{ $project->fb_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.tw_title') }}
                        </th>
                        <td>
                            {{ $project->tw_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.fb_description') }}
                        </th>
                        <td>
                            {{ $project->fb_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.tw_description') }}
                        </th>
                        <td>
                            {{ $project->tw_description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
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
            <a class="nav-link" href="#projects_technologies" role="tab" data-toggle="tab">
                {{ trans('cruds.technology.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="projects_technologies">
            @includeIf('admin.projects.relationships.projectsTechnologies', ['technologies' => $project->projectsTechnologies])
        </div>
    </div>
</div>

@endsection