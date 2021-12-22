@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.page.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.pages.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.page.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_title">{{ trans('cruds.page.fields.sub_title') }}</label>
                            <input class="form-control" type="text" name="sub_title" id="sub_title" value="{{ old('sub_title', '') }}">
                            @if($errors->has('sub_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.sub_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="excerpt">{{ trans('cruds.page.fields.excerpt') }}</label>
                            <textarea class="form-control" name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                            @if($errors->has('excerpt'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('excerpt') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.excerpt_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="path">{{ trans('cruds.page.fields.path') }}</label>
                            <input class="form-control" type="text" name="path" id="path" value="{{ old('path', '') }}">
                            @if($errors->has('path'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('path') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.path_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="slug">{{ trans('cruds.page.fields.slug') }}</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                            @if($errors->has('slug'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('slug') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.page.fields.slug_helper') }}</span>
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