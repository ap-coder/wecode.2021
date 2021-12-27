<div class="form-group">
    <label for="featured_image">{{ trans('cruds.post.fields.featured_image') }}</label>
    <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
    </div>
    @if($errors->has('featured_image'))
        <span class="text-danger">{{ $errors->first('featured_image') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.featured_image_helper') }}</span>
</div>
<div class="form-group">
    <label for="attachments">{{ trans('cruds.post.fields.attachments') }}</label>
    <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
    </div>
    @if($errors->has('attachments'))
        <span class="text-danger">{{ $errors->first('attachments') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.attachments_helper') }}</span>
</div>