
<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.page.fields.featured_image') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.page.fields.featured_image') }}" data-src="false" data-srcid="{{ @get_attachment_url(@$page->featured_image) }}" data-field="featured_image" type="hidden" name="featured_image" value="{{ @$page->featured_image }}" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.page.fields.photos') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.page.fields.photos') }}" data-src="false" data-srcid="" data-field="photo" type="hidden" name="photo" value="" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.page.fields.attachments') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.page.fields.attachments') }}" data-src="false" data-srcid="" data-field="attachments" type="hidden" name="attachments" value="" >
</div>
{{-- <div class="form-group">
    <label for="featured_image">{{ trans('cruds.page.fields.featured_image') }}</label>
    <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
    </div>
    @if($errors->has('featured_image'))
        <span class="text-danger">{{ $errors->first('featured_image') }}</span>
    @endif
    <span class="help-block">This is the page masthead. 1200x500</span>
</div>


<div class="form-group">
    <label for="photos">{{ trans('cruds.page.fields.photos') }}</label>
    <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
    </div>
    @if($errors->has('photos'))
        <span class="text-danger">{{ $errors->first('photos') }}</span>
    @endif
    <span class="help-block">Root Path: site/img/landing-pages/ | {{ trans('cruds.page.fields.photos_helper') }}</span>
</div>


<div class="form-group">
    <label for="attachments">{{ trans('cruds.page.fields.attachments') }}</label>
    <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
    </div>
    @if($errors->has('attachments'))
        <span class="text-danger">{{ $errors->first('attachments') }}</span>
    @endif
    <span class="help-block">Root Path: site/attachments/landing-pages/ | {{ trans('cruds.page.fields.attachments_helper') }}</span>
</div>

  --}}