
 <div class="form-group">
    <label class="required" for="topic_id">{{ trans('cruds.thread.fields.topic') }}</label>
    <select class="form-control select2 {{ $errors->has('topic') ? 'is-invalid' : '' }}" name="topic_id" id="topic_id" required>
        @foreach($topics as $id => $topic)
            <option value="{{ $id }}" {{ (old('topic_id') ? old('topic_id') : $thread->topic->id ?? '') == $id ? 'selected' : '' }}>{{ $topic }}</option>
        @endforeach
    </select>
    @if($errors->has('topic'))
        <span class="text-danger">{{ $errors->first('topic') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.topic_helper') }}</span>
</div>
<div class="form-group">
    <label for="author_id">{{ trans('cruds.thread.fields.author') }}</label>
    <select class="form-control select2 {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author_id" id="author_id">
        @foreach($authors as $id => $author)
            <option value="{{ $id }}" {{ (old('author_id') ? old('author_id') : $thread->author->id ?? '') == $id ? 'selected' : '' }}>{{ $author }}</option>
        @endforeach
    </select>
    @if($errors->has('author'))
        <span class="text-danger">{{ $errors->first('author') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.thread.fields.author_helper') }}</span>
</div>
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
    {{-- <textarea class="form-control ckeditor {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body">{!! old('body', @$thread->body) !!}</textarea> --}}
    <textarea rows="20" autocomplete="off" name="body" class="articleeditor-content {{ $errors->has('body') ? 'is-invalid' : '' }}" id="body">{!! old('body', @$thread->body) !!}</textarea>
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