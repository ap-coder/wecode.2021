<div class="form-group">
    <label for="meta_title">{{ trans('cruds.page.fields.meta_title') }}</label>
    <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $page->meta_title ?? '') }}">
    @if($errors->has('meta_title'))
        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.page.fields.meta_title_helper') }}</span>
</div>
<div class="form-group">
    <label for="meta_description">{{ trans('cruds.page.fields.meta_description') }}</label>
    <input class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', $page->meta_description ?? '') }}">
    @if($errors->has('meta_description'))
        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.page.fields.meta_description_helper') }}</span>
</div>
<div class="form-group">
    <label for="facebook_title">{{ trans('cruds.page.fields.facebook_title') }}</label>
    <input class="form-control {{ $errors->has('facebook_title') ? 'is-invalid' : '' }}" type="text" name="facebook_title" id="facebook_title" value="{{ old('facebook_title', $page->facebook_title ?? '') }}">
    @if($errors->has('facebook_title'))
        <span class="text-danger">{{ $errors->first('facebook_title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.page.fields.facebook_title_helper') }}</span>
</div>
<div class="form-group">
    <label for="facebook_description">{{ trans('cruds.page.fields.facebook_desc') }}</label>
    <input class="form-control {{ $errors->has('facebook_description') ? 'is-invalid' : '' }}" type="text" name="facebook_description" id="facebook_description" value="{{ old('facebook_description', $page->facebook_description ?? '') }}">
    @if($errors->has('facebook_description'))
        <span class="text-danger">{{ $errors->first('facebook_description') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.page.fields.facebook_desc_helper') }}</span>
</div>
<div class="form-group">
    <label for="twitter_title">{{ trans('cruds.page.fields.twitter_post_title') }}</label>
    <input class="form-control {{ $errors->has('twitter_title') ? 'is-invalid' : '' }}" type="text" name="twitter_title" id="twitter_title" value="{{ old('twitter_title', $page->twitter_title ?? '') }}">
    @if($errors->has('twitter_title'))
        <span class="text-danger">{{ $errors->first('twitter_title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.page.fields.twitter_post_title_helper') }}</span>
</div>
<div class="form-group">
    <label for="twitter_description">{{ trans('cruds.page.fields.twitter_post_description') }}</label>
    <input class="form-control {{ $errors->has('twitter_description') ? 'is-invalid' : '' }}" type="text" name="twitter_description" id="twitter_description" value="{{ old('twitter_description', $page->twitter_description ?? '') }}">
    @if($errors->has('twitter_description'))
        <span class="text-danger">{{ $errors->first('twitter_description') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.page.fields.twitter_post_description_helper') }}</span>
</div>