<div class="form-group">
    <label for="title">{{ trans('cruds.thread.fields.title') }}</label>
    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', @$thread->title) }}">
    @if($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.title_helper') }}</span>
</div>
<div class="form-group">
    <label for="body">{{ trans('cruds.thread.fields.body') }}</label>
    <textarea class="form-control ckeditor {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body">{!! old('body', @$thread->body) !!}</textarea>
    @if($errors->has('body'))
        <span class="text-danger">{{ $errors->first('body') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.body_helper') }}</span>
</div>

<div class="form-group">
    <div class="form-check {{ $errors->has('closed') ? 'is-invalid' : '' }}">
        <input type="hidden" name="closed" value="0">
        <input class="form-check-input" type="checkbox" name="closed" id="closed" value="1" {{ @$thread->closed || old('closed', 0) === 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="closed">{{ trans('cruds.thread.fields.closed') }}</label>
    </div>
    @if($errors->has('closed'))
        <span class="text-danger">{{ $errors->first('closed') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.closed_helper') }}</span>
</div>
<div class="form-group">
    <label for="slug">{{ trans('cruds.thread.fields.slug') }}</label>
    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', @$thread->slug) }}">
    @if($errors->has('slug'))
        <span class="text-danger">{{ $errors->first('slug') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.slug_helper') }}</span>
</div>