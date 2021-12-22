@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.staff.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.staff.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.id') }}
                        </th>
                        <td>
                            {{ $staff->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.name') }}
                        </th>
                        <td>
                            {{ $staff->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.job_title') }}
                        </th>
                        <td>
                            {{ $staff->job_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.short_intro') }}
                        </th>
                        <td>
                            {{ $staff->short_intro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.bio') }}
                        </th>
                        <td>
                            {!! $staff->bio !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.picture') }}
                        </th>
                        <td>
                            @if($staff->picture)
                                <a href="{{ $staff->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $staff->picture->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $staff->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.slug') }}
                        </th>
                        <td>
                            {{ $staff->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.linkedin_link') }}
                        </th>
                        <td>
                            {{ $staff->linkedin_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.facebook_link') }}
                        </th>
                        <td>
                            {{ $staff->facebook_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.youtube_link') }}
                        </th>
                        <td>
                            {{ $staff->youtube_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.twitter_link') }}
                        </th>
                        <td>
                            {{ $staff->twitter_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.other_link') }}
                        </th>
                        <td>
                            {{ $staff->other_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.staff_email') }}
                        </th>
                        <td>
                            {{ $staff->staff_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.gravatar') }}
                        </th>
                        <td>
                            {{ $staff->gravatar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.in_teams') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $staff->in_teams ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.is_author') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $staff->is_author ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.order') }}
                        </th>
                        <td>
                            {{ $staff->order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.list_on_about') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $staff->list_on_about ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staff.fields.user') }}
                        </th>
                        <td>
                            {{ $staff->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.staff.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection