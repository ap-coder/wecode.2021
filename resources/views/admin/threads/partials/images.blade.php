
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
</div>