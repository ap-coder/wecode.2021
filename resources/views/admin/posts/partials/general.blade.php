<div class="form-group">
    <label class="required" for="title">{{ trans('cruds.post.fields.title') }}</label>
    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', @$post->title) }}" required>
    @if($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.title_helper') }}</span>
</div>
<div class="form-group">
    <label for="body_text">{{ trans('cruds.post.fields.body_text') }}</label>
    {{-- <textarea class="form-control ckeditor {{ $errors->has('body_text') ? 'is-invalid' : '' }}" name="body_text" id="body_text">{!! old('body_text', @$post->body_text) !!}</textarea> --}}

    <textarea rows="20" autocomplete="off" name="body_text" class="articleeditor-content {{ $errors->has('body_text') ? 'is-invalid' : '' }}" id="body_text">{!! old('body_text', @$post->body_text) !!}</textarea>

    @if($errors->has('body_text'))
        <span class="text-danger">{{ $errors->first('body_text') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.body_text_helper') }}</span>
</div>
<div class="form-group">
    <label for="excerpt">{{ trans('cruds.post.fields.excerpt') }}</label>
    <textarea class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" name="excerpt" id="excerpt">{{ old('excerpt', @$post->excerpt) }}</textarea>
    @if($errors->has('excerpt'))
        <span class="text-danger">{{ $errors->first('excerpt') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.excerpt_helper') }}</span>
</div>
<div class="form-group">
    <label for="read_time">{{ trans('cruds.post.fields.read_time') }}</label>
    <input class="form-control {{ $errors->has('read_time') ? 'is-invalid' : '' }}" type="text" name="read_time" id="read_time" value="{{ old('read_time', @$post->read_time ?? '') }}" disabled>
    @if($errors->has('read_time'))
        <span class="text-danger">{{ $errors->first('read_time') }}</span>
    @endif

</div>
<div class="form-group">
    <label for="category_id">{{ trans('cruds.post.fields.category') }}</label>
    <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
        @foreach($categories as $id => $entry)
            <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : @$post->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
        @endforeach
    </select>
    @if($errors->has('category'))
        <span class="text-danger">{{ $errors->first('category') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.category_helper') }}</span>
</div>
<div class="form-group">
    <label for="menu_order">{{ trans('cruds.post.fields.menu_order') }}</label>
    <input class="form-control {{ $errors->has('menu_order') ? 'is-invalid' : '' }}" type="number" name="menu_order" id="menu_order" value="{{ old('menu_order', @$post->menu_order ?? '0') }}" step="1">
    @if($errors->has('menu_order'))
        <span class="text-danger">{{ $errors->first('menu_order') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.menu_order_helper') }}</span>
</div>
<div class="form-group">
    <label>{{ trans('cruds.post.fields.comment_status') }}</label>
    <select class="form-control {{ $errors->has('comment_status') ? 'is-invalid' : '' }}" name="comment_status" id="comment_status">
        <option value disabled {{ old('comment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach(App\Models\Post::COMMENT_STATUS_SELECT as $key => $label)
            <option value="{{ $key }}" {{ old('comment_status', @$post->comment_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($errors->has('comment_status'))
        <span class="text-danger">{{ $errors->first('comment_status') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.comment_status_helper') }}</span>
</div>
<div class="form-group">
    <label for="post_password">{{ trans('cruds.post.fields.post_password') }}</label>
    <input class="form-control {{ $errors->has('post_password') ? 'is-invalid' : '' }}" type="password" name="post_password" id="post_password">
    @if($errors->has('post_password'))
        <span class="text-danger">{{ $errors->first('post_password') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.post_password_helper') }}</span>
</div>
<div class="form-group">
    <label for="comment_count">{{ trans('cruds.post.fields.comment_count') }}</label>
    <input class="form-control {{ $errors->has('comment_count') ? 'is-invalid' : '' }}" type="number" name="comment_count" id="comment_count" value="{{ old('comment_count', @$post->comment_count) }}" step="1">
    @if($errors->has('comment_count'))
        <span class="text-danger">{{ $errors->first('comment_count') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.comment_count_helper') }}</span>
</div>
<div class="form-group">
    <div class="form-check {{ $errors->has('ping_status') ? 'is-invalid' : '' }}">
        <input type="hidden" name="ping_status" value="0">
        <input class="form-check-input" type="checkbox" name="ping_status" id="ping_status" value="1" {{ @$post->ping_status || old('ping_status', 0) === 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="ping_status">{{ trans('cruds.post.fields.ping_status') }}</label>
    </div>
    @if($errors->has('ping_status'))
        <span class="text-danger">{{ $errors->first('ping_status') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.ping_status_helper') }}</span>
</div>

<div class="form-group">
    <label for="slug">{{ trans('cruds.post.fields.slug') }}</label>
    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', @$post->slug) }}">
    @if($errors->has('slug'))
        <span class="text-danger">{{ $errors->first('slug') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.slug_helper') }}</span>
</div>