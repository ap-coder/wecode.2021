


<div class="form-row">
    <div class="col-md-3">
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


<div class="form-row">
    <div class="col-md-3">
        <div class="form-group">
            <div class="form-check {{ $errors->has('add_to_sitemap') ? 'is-invalid' : '' }}">
                <input type="hidden" name="add_to_sitemap" value="0">
                @if (isset($page))
                <input class="form-check-input" type="checkbox" name="add_to_sitemap" id="add_to_sitemap" value="1" {{ $page->add_to_sitemap || old('add_to_sitemap', 0) === 1 ? 'checked' : '' }}>
                @else
                    <input class="form-check-input" type="checkbox" name="add_to_sitemap" id="add_to_sitemap" value="1" {{ old('add_to_sitemap', 0) == 1 || old('add_to_sitemap') === null ? 'checked' : '' }}>
                @endif
                
                <label class="form-check-label" for="add_to_sitemap">{{ trans('cruds.page.fields.add_to_sitemap') }}</label>
            </div>
            @if($errors->has('add_to_sitemap'))
                <span class="text-danger">{{ $errors->first('add_to_sitemap') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.page.fields.add_to_sitemap_helper') }}</span>
        </div>
    </div>

</div>

<div class="form-row">
    <div class="col-md-3">
        <div class="form-group">
            <div class="form-check {{ $errors->has('use_rev_slider') ? 'is-invalid' : '' }}">
                <input type="hidden" name="use_rev_slider" value="0">
                @if (isset($page))
                <input class="form-check-input" type="checkbox" name="use_rev_slider" id="use_rev_slider" value="1" {{ $page->use_rev_slider || old('use_rev_slider', 0) === 1 ? 'checked' : '' }}>
                @else
                    <input class="form-check-input" type="checkbox" name="use_rev_slider" id="use_rev_slider" value="1" {{ old('use_rev_slider', 0) == 1 || old('use_rev_slider') === null ? 'checked' : '' }}>
                @endif
                
                <label class="form-check-label" for="use_rev_slider">{{ trans('cruds.page.fields.use_rev_slider') }}</label>
            </div>
            @if($errors->has('use_rev_slider'))
                <span class="text-danger">{{ $errors->first('use_rev_slider') }}</span>
            @endif
            <span class="help-block">{{ trans('cruds.page.fields.use_rev_slider_helper') }}</span>
        </div>
    </div>

</div>
 

<div class="form-group">
    <label for="custom_css">{{ trans('cruds.page.fields.custom_css') }}</label>
    <textarea class="prism-live language-css" name="custom_css" id="custom_css">{{ old('custom_css', @$page->custom_css) }}</textarea>
</div>