


<div class="form-row">
    <div class="col-md-2">
        <div class="form-group">
            <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                <input type="hidden" name="published" value="0">
                @if (isset($page))
                <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $page->published || old('published', 0) === 1 ? 'checked' : '' }}>
                @else
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                @endif
                
                <label class="form-check-label" for="published">{{ trans('cruds.page.fields.published') }}</label>
            </div>
            @if($errors->has('published'))
                <span class="text-danger">{{ $errors->first('published') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.page.fields.published_helper') }}</span>
        </div>
    </div>

</div>