@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.page.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.pages.index') }}">
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
                                        {{ trans('cruds.page.fields.fb_title') }}
                                    </th>
                                    <td>
                                        {{ $page->fb_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.fb_description') }}
                                    </th>
                                    <td>
                                        {{ $page->fb_description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.tw_title') }}
                                    </th>
                                    <td>
                                        {{ $page->tw_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.page.fields.tw_description') }}
                                    </th>
                                    <td>
                                        {{ $page->tw_description }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.pages.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection