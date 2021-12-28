<div class="form-group">
    <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
        <input type="hidden" name="published" value="0">
        <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ @$project->published || old('published', 0) === 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="published">{{ trans('cruds.project.fields.published') }}</label>
    </div>
    @if($errors->has('published'))
        <span class="text-danger">{{ $errors->first('published') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.published_helper') }}</span>
</div>