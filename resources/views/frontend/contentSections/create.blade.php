@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.contentSection.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.content-sections.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="section_title">{{ trans('cruds.contentSection.fields.section_title') }}</label>
                            <input class="form-control" type="text" name="section_title" id="section_title" value="{{ old('section_title', '') }}" required>
                            @if($errors->has('section_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('section_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentSection.fields.section_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="order">{{ trans('cruds.contentSection.fields.order') }}</label>
                            <input class="form-control" type="number" name="order" id="order" value="{{ old('order', '') }}" step="1">
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentSection.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="section">{{ trans('cruds.contentSection.fields.section') }}</label>
                            <textarea class="form-control" name="section" id="section">{{ old('section') }}</textarea>
                            @if($errors->has('section'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('section') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentSection.fields.section_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.contentSection.fields.location') }}</label>
                            <select class="form-control" name="location" id="location">
                                <option value disabled {{ old('location', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ContentSection::LOCATION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('location', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('location'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('location') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentSection.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.contentSection.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentSection.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pages">{{ trans('cruds.contentSection.fields.pages') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="pages[]" id="pages" multiple>
                                @foreach($pages as $id => $page)
                                    <option value="{{ $id }}" {{ in_array($id, old('pages', [])) ? 'selected' : '' }}>{{ $page }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pages'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pages') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentSection.fields.pages_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="posts">{{ trans('cruds.contentSection.fields.posts') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="posts[]" id="posts" multiple>
                                @foreach($posts as $id => $post)
                                    <option value="{{ $id }}" {{ in_array($id, old('posts', [])) ? 'selected' : '' }}>{{ $post }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('posts'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('posts') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentSection.fields.posts_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="threads">{{ trans('cruds.contentSection.fields.threads') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="threads[]" id="threads" multiple>
                                @foreach($threads as $id => $thread)
                                    <option value="{{ $id }}" {{ in_array($id, old('threads', [])) ? 'selected' : '' }}>{{ $thread }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('threads'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('threads') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentSection.fields.threads_helper') }}</span>
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