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
<div class="form-group">
    <div class="form-check {{ $errors->has('use_on_clients') ? 'is-invalid' : '' }}">
        <input type="hidden" name="use_on_clients" value="0">
        <input class="form-check-input" type="checkbox" name="use_on_clients" id="use_on_clients" value="1" {{ @$project->use_on_clients || old('use_on_clients', 0) === 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="use_on_clients">{{ trans('cruds.project.fields.use_on_clients') }}</label>
    </div>
    @if($errors->has('use_on_clients'))
        <span class="text-danger">{{ $errors->first('use_on_clients') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.use_on_clients_helper') }}</span>
</div>