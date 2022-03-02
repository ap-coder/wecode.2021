<div class="form-group">
    <label class="required" for="title">{{ trans('cruds.service.fields.title') }}</label>
    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', @$service->title) }}" required>
    @if($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.title_helper') }}</span>
</div>
<div class="form-group">
    <label for="sub_title">{{ trans('cruds.service.fields.sub_title') }}</label>
    <input class="form-control {{ $errors->has('sub_title') ? 'is-invalid' : '' }}" type="text" name="sub_title" id="sub_title" value="{{ old('sub_title', @$service->sub_title) }}">
    @if($errors->has('sub_title'))
        <span class="text-danger">{{ $errors->first('sub_title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.sub_title_helper') }}</span>
</div>
<div class="form-group">
    <label for="service_text">{{ trans('cruds.service.fields.service_text') }}</label>
    <textarea class="form-control ckeditor {{ $errors->has('service_text') ? 'is-invalid' : '' }}" name="service_text" id="service_text">{!! old('service_text', @$service->service_text) !!}</textarea>
    @if($errors->has('service_text'))
        <span class="text-danger">{{ $errors->first('service_text') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.service_text_helper') }}</span>
</div>
<div class="form-group">
    <label for="service_text_2">{{ trans('cruds.service.fields.service_text_2') }}</label>
    <textarea class="form-control ckeditor {{ $errors->has('service_text_2') ? 'is-invalid' : '' }}" name="service_text_2" id="service_text_2">{!! old('service_text_2', @$service->service_text_2) !!}</textarea>
    @if($errors->has('service_text_2'))
        <span class="text-danger">{{ $errors->first('service_text_2') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.service_text_2_helper') }}</span>
</div>
<div class="form-group">
    <label for="excerpt">{{ trans('cruds.service.fields.excerpt') }}</label>
    <textarea class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" name="excerpt" id="excerpt">{{ old('excerpt', @$service->excerpt) }}</textarea>
    @if($errors->has('excerpt'))
        <span class="text-danger">{{ $errors->first('excerpt') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.excerpt_helper') }}</span>
</div>
<div class="form-group">
    <label for="price">{{ trans('cruds.service.fields.price') }}</label>
    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', @$service->price) }}" step="0.01">
    @if($errors->has('price'))
        <span class="text-danger">{{ $errors->first('price') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.price_helper') }}</span>
</div>
<div class="form-group">
    <label for="slug">{{ trans('cruds.service.fields.slug') }}</label>
    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', @$service->slug) }}">
    @if($errors->has('slug'))
        <span class="text-danger">{{ $errors->first('slug') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.slug_helper') }}</span>
</div>