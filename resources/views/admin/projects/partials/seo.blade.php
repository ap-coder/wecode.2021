
            <div class="form-group">
                <label for="meta_title">{{ trans('cruds.project.fields.meta_title') }}</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', @$project->meta_title) }}">
                @if($errors->has('meta_title'))
                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.meta_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_description">{{ trans('cruds.project.fields.meta_description') }}</label>
                <input class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', @$project->meta_description) }}">
                @if($errors->has('meta_description'))
                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.meta_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fb_title">{{ trans('cruds.project.fields.fb_title') }}</label>
                <input class="form-control {{ $errors->has('fb_title') ? 'is-invalid' : '' }}" type="text" name="fb_title" id="fb_title" value="{{ old('fb_title', @$project->fb_title) }}">
                @if($errors->has('fb_title'))
                    <span class="text-danger">{{ $errors->first('fb_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.fb_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tw_title">{{ trans('cruds.project.fields.tw_title') }}</label>
                <input class="form-control {{ $errors->has('tw_title') ? 'is-invalid' : '' }}" type="text" name="tw_title" id="tw_title" value="{{ old('tw_title', @$project->tw_title) }}">
                @if($errors->has('tw_title'))
                    <span class="text-danger">{{ $errors->first('tw_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.tw_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fb_description">{{ trans('cruds.project.fields.fb_description') }}</label>
                <input class="form-control {{ $errors->has('fb_description') ? 'is-invalid' : '' }}" type="text" name="fb_description" id="fb_description" value="{{ old('fb_description', @$project->fb_description) }}">
                @if($errors->has('fb_description'))
                    <span class="text-danger">{{ $errors->first('fb_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.fb_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tw_description">{{ trans('cruds.project.fields.tw_description') }}</label>
                <input class="form-control {{ $errors->has('tw_description') ? 'is-invalid' : '' }}" type="text" name="tw_description" id="tw_description" value="{{ old('tw_description', @$project->tw_description) }}">
                @if($errors->has('tw_description'))
                    <span class="text-danger">{{ $errors->first('tw_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.project.fields.tw_description_helper') }}</span>
            </div>