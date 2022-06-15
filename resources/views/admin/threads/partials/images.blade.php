
<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.thread.fields.photo') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.thread.fields.photo') }}" data-src="false" data-srcid="{{ get_attachment_url(@$thread->photo) }}" data-field="photo" type="hidden" name="photo" value="{{ @$thread->photo }}" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.thread.fields.additional_photos') }}</label>

<div class="tacf-input mt-3">
    <div class="tacf-repeater">
        <table class="tacf-table">
            <tbody class="tacf-ui-sortable">
                
                @if (@$thread->additional_photos)
                    @foreach ($thread->additional_photos as $key => $photo)
                        <tr class="tacf-row">
                            <td class="tacf-field tacf-col-item">
                                <div class="tacf-input tacf-toggle-content fadeIn">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="featuredimage">
                                                <input class="form-control" data-toggle="fileupload" data-field="additional-photos-{{$key}}" data-src="false" data-size="thumbnail" type="hidden" name="postmeta[additional_photos][{{$key}}]" value="{{ $photo }}" data-button="{{ trans('cruds.thread.fields.additional_photos') }}" data-srcid="{{ get_attachment_url($photo) }}">
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
                                        <input class="form-control tacf-input-key tacf-input-fileupload" data-field="additional-photos-{key}" data-src="false" data-size="thumbnail" type="hidden" data-name="postmeta[additional_photos][{key}]" data-button="{{ trans('cruds.thread.fields.additional_photos') }}">
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

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.thread.fields.attachments') }}</label>

<div class="tacf-input mt-3">
    <div class="tacf-repeater">
        <table class="tacf-table">
            <tbody class="tacf-ui-sortable">
                
                @if (@$thread->attachments)
                    @foreach ($thread->attachments as $key => $image)
                        <tr class="tacf-row">
                            <td class="tacf-field tacf-col-item">
                                <div class="tacf-input tacf-toggle-content fadeIn">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="featuredimage">
                                                <input class="form-control" data-toggle="fileupload" data-field="attachment-{{$key}}" data-src="false" data-size="thumbnail" type="hidden" name="postmeta[attachments][{{$key}}]" value="{{ $image }}" data-button="{{ trans('cruds.thread.fields.attachments') }}" data-srcid="{{ get_attachment_url($image) }}">
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
                                        <input class="form-control tacf-input-key tacf-input-fileupload" data-field="attachment-{key}" data-src="false" data-size="thumbnail" type="hidden" data-name="postmeta[attachments][{key}]" data-button="{{ trans('cruds.thread.fields.attachments') }}">
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
{{-- 
<div class="form-group">
    <label for="photo">{{ trans('cruds.thread.fields.photo') }}</label>
    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
    </div>
    @if($errors->has('photo'))
        <span class="text-danger">{{ $errors->first('photo') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.photo_helper') }}</span>
</div>
<div class="form-group">
    <label for="additional_photos">{{ trans('cruds.thread.fields.additional_photos') }}</label>
    <div class="needsclick dropzone {{ $errors->has('additional_photos') ? 'is-invalid' : '' }}" id="additional_photos-dropzone">
    </div>
    @if($errors->has('additional_photos'))
        <span class="text-danger">{{ $errors->first('additional_photos') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.additional_photos_helper') }}</span>
</div>
<div class="form-group">
    <label for="attachments">{{ trans('cruds.thread.fields.attachments') }}</label>
    <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
    </div>
    @if($errors->has('attachments'))
        <span class="text-danger">{{ $errors->first('attachments') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.attachments_helper') }}</span>
</div> --}}