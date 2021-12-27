<div class="form-group">
    <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
        <input type="hidden" name="published" value="0">
        <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $post->published || old('published', 0) === 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="published">{{ trans('cruds.post.fields.published') }}</label>
    </div>
    @if($errors->has('published'))
        <span class="text-danger">{{ $errors->first('published') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.published_helper') }}</span>
</div>
<div class="form-group">
    <label for="video_url">Video URL</label>
    <input class="form-control {{ $errors->has('video_url') ? 'is-invalid' : '' }}" type="text" name="video_url" id="video_url" value="{{ old('video_url', $post->video_url ?? '') }}">
    <span class="help-block">If you add a youtube url here it will act as feature image at top of page instead. </span>
</div>