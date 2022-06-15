
<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.project.fields.header_image') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.project.fields.header_image') }}" data-src="false" data-srcid="{{ @get_attachment_url(@$project->header_image) }}" data-field="header_image" type="hidden" name="header_image" value="{{ @$project->header_image }}" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.project.fields.featured_image') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.project.fields.featured_image') }}" data-src="false" data-srcid="{{ @get_attachment_url(@$project->featured_image) }}" data-field="featured_image" type="hidden" name="featured_image" value="{{ @$project->featured_image }}" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.project.fields.challenge_image') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.project.fields.challenge_image') }}" data-src="false" data-srcid="{{ @get_attachment_url(@$project->challenge_image) }}" data-field="challenge_image" type="hidden" name="challenge_image" value="{{ @$project->challenge_image }}" >
</div>

<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.project.fields.solution_image') }}</label>
<div class="featuredimage">
    <input class="form-control" data-toggle="fileupload" data-size="thumbnail" data-button="{{ trans('cruds.project.fields.solution_image') }}" data-src="false" data-srcid="{{ @get_attachment_url(@$project->solution_image) }}" data-field="solution_image" type="hidden" name="solution_image" value="{{ @$project->solution_image }}" >
</div>


<label class="w-100 border-bottom mb-3 pb-2">{{ trans('cruds.project.fields.additional_images') }}</label>

<div class="tacf-input mt-3">
    <div class="tacf-repeater">
        <table class="tacf-table">
            <tbody class="tacf-ui-sortable">
                
                @if (@$project->additional_images)
                    @foreach ($project->additional_images as $key => $photo)
                        <tr class="tacf-row">
                            <td class="tacf-field tacf-col-item">
                                <div class="tacf-input tacf-toggle-content fadeIn">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="featuredimage">
                                                <input class="form-control" data-toggle="fileupload" data-field="additional-images-{{$key}}" data-src="false" data-size="thumbnail" type="hidden" name="postmeta[additional_images][{{$key}}]" value="{{ $photo }}" data-button="{{ trans('cruds.project.fields.additional_images') }}" data-srcid="{{ get_attachment_url($photo) }}">
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
                                        <input class="form-control tacf-input-key tacf-input-fileupload" data-field="additional-images-{key}" data-src="false" data-size="thumbnail" type="hidden" data-name="postmeta[additional_images][{key}]" data-button="{{ trans('cruds.project.fields.additional_images') }}">
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
                <label for="header_image">{{ trans('cruds.project.fields.header_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('header_image') ? 'is-invalid' : '' }}" id="header_image-dropzone">
                </div>
                @if($errors->has('header_image'))
                    <span class="text-danger">{{ $errors->first('header_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.header_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="featured_image">{{ trans('cruds.project.fields.featured_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                </div>
                @if($errors->has('featured_image'))
                    <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.featured_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="additional_images">{{ trans('cruds.project.fields.additional_images') }}</label>
                <div class="needsclick dropzone {{ $errors->has('additional_images') ? 'is-invalid' : '' }}" id="additional_images-dropzone">
                </div>
                @if($errors->has('additional_images'))
                    <span class="text-danger">{{ $errors->first('additional_images') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.additional_images_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="challenge_image">{{ trans('cruds.project.fields.challenge_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('challenge_image') ? 'is-invalid' : '' }}" id="challenge_image-dropzone">
                </div>
                @if($errors->has('challenge_image'))
                    <span class="text-danger">{{ $errors->first('challenge_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.challenge_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="solution_image">{{ trans('cruds.project.fields.solution_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('solution_image') ? 'is-invalid' : '' }}" id="solution_image-dropzone">
                </div>
                @if($errors->has('solution_image'))
                    <span class="text-danger">{{ $errors->first('solution_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.solution_image_helper') }}</span>
            </div> --}}