
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
            </div>