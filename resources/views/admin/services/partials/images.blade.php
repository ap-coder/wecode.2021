<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.service.fields.featured_image') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.service.fields.featured_image') }}" data-src="false" data-srcid="{{ get_attachment_url(@$service->featured_image) }}" data-field="featured_image" type="hidden" name="featured_image" value="{{ @$service->featured_image }}" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.service.fields.banner') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.service.fields.banner') }}" data-src="false" data-srcid="{{ get_attachment_url(@$service->banner) }}" data-field="banner" type="hidden" name="banner" value="{{ @$service->banner }}" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.service.fields.content_images') }}</label>

<div class="tacf-input mt-3">
    <div class="tacf-repeater">
        <table class="tacf-table">
            <tbody class="tacf-ui-sortable">
                
                @if (@$service->content_images)
                    @foreach ($service->content_images as $key => $image)
                        <tr class="tacf-row">
                            <td class="tacf-field tacf-col-item">
                                <div class="tacf-input tacf-toggle-content fadeIn">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="featuredimage">
                                                <input class="form-control" data-toggle="fileupload" data-field="content-images-{{$key}}" data-src="false" data-size="thumbnail" type="hidden" name="postmeta[content_images][{{$key}}]" value="{{ $image }}" data-button="{{ trans('cruds.service.fields.content_images') }}" data-srcid="{{ get_attachment_url($image) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                

                <tr class="tacf-row tacf-clone">
                    <td class="tacf-field tacf-col-item">
                        <div class="tacf-input tacf-toggle-content fadeIn">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="featuredimage">
                                        <input class="form-control tacf-input-key tacf-input-fileupload" data-field="content-images-{key}" data-src="false" data-size="thumbnail" type="hidden" data-name="postmeta[content_images][{key}]" data-button="{{ trans('cruds.service.fields.content_images') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            
        </table>
        <div class="tacf-actions mt-3">
            <button type="button" class="tacf-button button button-primary mb-2" data-event="add-row">Add New</button>
        </div>
    </div>
</div>

{{-- <div class="form-group">
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
</div> --}}