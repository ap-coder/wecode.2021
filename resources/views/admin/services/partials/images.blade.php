<div class="form-group">
    <label for="featured_image">{{ trans('cruds.service.fields.featured_image') }}</label>
    <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
    </div>
    @if($errors->has('featured_image'))
        <span class="text-danger">{{ $errors->first('featured_image') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.featured_image_helper') }}</span>
</div>
<div class="form-group">
    <label for="content_images">{{ trans('cruds.service.fields.content_images') }}</label>
    <div class="needsclick dropzone {{ $errors->has('content_images') ? 'is-invalid' : '' }}" id="content_images-dropzone">
    </div>
    @if($errors->has('content_images'))
        <span class="text-danger">{{ $errors->first('content_images') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.content_images_helper') }}</span>
</div>
<div class="form-group">
    <label for="banner">{{ trans('cruds.service.fields.banner') }}</label>
    <div class="needsclick dropzone {{ $errors->has('banner') ? 'is-invalid' : '' }}" id="banner-dropzone">
    </div>
    @if($errors->has('banner'))
        <span class="text-danger">{{ $errors->first('banner') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.service.fields.banner_helper') }}</span>
</div>