
<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.post.fields.featured_image') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.post.fields.featured_image') }}" data-src="false" data-srcid="{{ get_attachment_url(@$post->featured_image) }}" data-field="featured_image" type="hidden" name="featured_image" value="{{ @$post->featured_image }}" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.post.fields.attachments') }}</label>

<div class="tacf-input mt-3">
    <div class="tacf-repeater">
        <table class="tacf-table">
            <tbody class="tacf-ui-sortable">
                
                @if (@$post->attachments)
                    @foreach ($post->attachments as $key => $image)
                        <tr class="tacf-row">
                            <td class="tacf-field tacf-col-item">
                                <div class="tacf-input tacf-toggle-content fadeIn">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="featuredimage">
                                                <input class="form-control" data-toggle="fileupload" data-field="attachment-{{$key}}" data-src="false" data-size="thumbnail" type="hidden" name="postmeta[attachments][{{$key}}]" value="{{ $image }}" data-button="{{ trans('cruds.post.fields.attachments') }}" data-srcid="{{ get_attachment_url($image) }}">
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
                                        <input class="form-control tacf-input-key tacf-input-fileupload" data-field="attachment-{key}" data-src="false" data-size="thumbnail" type="hidden" data-name="postmeta[attachments][{key}]" data-button="{{ trans('cruds.post.fields.attachments') }}">
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
</div> --}}