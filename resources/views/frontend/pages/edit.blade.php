@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.page.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.pages.update", [$page->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.page.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $page->title) }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_title">{{ trans('cruds.page.fields.sub_title') }}</label>
                            <input class="form-control" type="text" name="sub_title" id="sub_title" value="{{ old('sub_title', $page->sub_title) }}">
                            @if($errors->has('sub_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.sub_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{ trans('cruds.page.fields.excerpt') }}</label>
                            <textarea class="form-control" name="excerpt" id="excerpt">{{ old('excerpt', $page->excerpt) }}</textarea>
                            @if($errors->has('excerpt'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('excerpt') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.excerpt_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="path">{{ trans('cruds.page.fields.path') }}</label>
                            <input class="form-control" type="text" name="path" id="path" value="{{ old('path', $page->path) }}">
                            @if($errors->has('path'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('path') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.path_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="slug">{{ trans('cruds.page.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}">
                            @if($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.slug_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_title">{{ trans('cruds.page.fields.meta_title') }}</label>
                            <input class="form-control" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $page->meta_title) }}">
                            @if($errors->has('meta_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.meta_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_description">{{ trans('cruds.page.fields.meta_description') }}</label>
                            <input class="form-control" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', $page->meta_description) }}">
                            @if($errors->has('meta_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('meta_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.meta_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fb_title">{{ trans('cruds.page.fields.fb_title') }}</label>
                            <input class="form-control" type="text" name="fb_title" id="fb_title" value="{{ old('fb_title', $page->fb_title) }}">
                            @if($errors->has('fb_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fb_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.fb_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fb_description">{{ trans('cruds.page.fields.fb_description') }}</label>
                            <input class="form-control" type="text" name="fb_description" id="fb_description" value="{{ old('fb_description', $page->fb_description) }}">
                            @if($errors->has('fb_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fb_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.fb_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tw_title">{{ trans('cruds.page.fields.tw_title') }}</label>
                            <input class="form-control" type="text" name="tw_title" id="tw_title" value="{{ old('tw_title', $page->tw_title) }}">
                            @if($errors->has('tw_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tw_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.tw_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tw_description">{{ trans('cruds.page.fields.tw_description') }}</label>
                            <input class="form-control" type="text" name="tw_description" id="tw_description" value="{{ old('tw_description', $page->tw_description) }}">
                            @if($errors->has('tw_description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tw_description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.tw_description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection