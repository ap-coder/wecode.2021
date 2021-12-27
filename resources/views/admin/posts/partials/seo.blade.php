<div class="form-group">
    <label for="meta_title">{{ trans('cruds.post.fields.meta_title') }}</label>
    <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}">
    @if($errors->has('meta_title'))
        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.meta_title_helper') }}</span>
</div>
<div class="form-group">
    <label for="meta_description">{{ trans('cruds.post.fields.meta_description') }}</label>
    <input class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', $post->meta_description ?? '') }}">
    @if($errors->has('meta_description'))
        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.meta_description_helper') }}</span>
</div>
<div class="form-group">
    <label for="facebook_title">{{ trans('cruds.post.fields.facebook_title') }}</label>
    <input class="form-control {{ $errors->has('facebook_title') ? 'is-invalid' : '' }}" type="text" name="facebook_title" id="facebook_title" value="{{ old('facebook_title', $post->facebook_title ?? '') }}">
    @if($errors->has('facebook_title'))
        <span class="text-danger">{{ $errors->first('facebook_title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.facebook_title_helper') }}</span>
</div>
<div class="form-group">
    <label for="facebook_desc">{{ trans('cruds.post.fields.facebook_desc') }}</label>
    <input class="form-control {{ $errors->has('facebook_desc') ? 'is-invalid' : '' }}" type="text" name="facebook_desc" id="facebook_desc" value="{{ old('facebook_desc', $post->facebook_desc ?? '') }}">
    @if($errors->has('facebook_desc'))
        <span class="text-danger">{{ $errors->first('facebook_desc') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.facebook_desc_helper') }}</span>
</div>
<div class="form-group">
    <label for="twitter_post_title">{{ trans('cruds.post.fields.twitter_post_title') }}</label>
    <input class="form-control {{ $errors->has('twitter_post_title') ? 'is-invalid' : '' }}" type="text" name="twitter_post_title" id="twitter_post_title" value="{{ old('twitter_post_title', $post->twitter_post_title ?? '') }}">
    @if($errors->has('twitter_post_title'))
        <span class="text-danger">{{ $errors->first('twitter_post_title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.twitter_post_title_helper') }}</span>
</div>
<div class="form-group">
    <label for="twitter_post_description">{{ trans('cruds.post.fields.twitter_post_description') }}</label>
    <input class="form-control {{ $errors->has('twitter_post_description') ? 'is-invalid' : '' }}" type="text" name="twitter_post_description" id="twitter_post_description" value="{{ old('twitter_post_description', $post->twitter_post_description ?? '') }}">
    @if($errors->has('twitter_post_description'))
        <span class="text-danger">{{ $errors->first('twitter_post_description') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.twitter_post_description_helper') }}</span>
</div>