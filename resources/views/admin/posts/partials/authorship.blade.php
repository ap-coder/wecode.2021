<div class="form-group">

    <label for="author_id">{{ trans('cruds.post.fields.author') }}</label>
    <select class="form-control select2 {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author_id" id="author_id" style="width: 100%;" >
        @foreach($authors as $id => $author)
        <option value="{{ $id }}" {{ (old('author_id') ? old('author_id') : @$post->author->id ?? '') == $id ? 'selected' : '' }}>{{ $author }}</option>
        @endforeach
    </select>
    @if($errors->has('author'))
        <span class="text-danger">{{ $errors->first('author') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.author_helper') }}</span>
</div>
<div class="form-group">
    <label for="contributor">{{ trans('cruds.post.fields.contributor') }}</label>
    <input class="form-control {{ $errors->has('contributor') ? 'is-invalid' : '' }}" type="text" name="contributor" id="contributor" value="{{ old('contributor', @$post->contributor) }}">
    @if($errors->has('contributor'))
        <span class="text-danger">{{ $errors->first('contributor') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.contributor_helper') }}</span>
</div>
<div class="form-group">
    <label for="contributor_link">{{ trans('cruds.post.fields.contributor_link') }}</label>
    <input class="form-control {{ $errors->has('contributor_link') ? 'is-invalid' : '' }}" type="text" name="contributor_link" id="contributor_link" value="{{ old('contributor_link', @$post->contributor_link) }}">
    @if($errors->has('contributor_link'))
        <span class="text-danger">{{ $errors->first('contributor_link') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.contributor_link_helper') }}</span>
</div>
<div class="form-group">
    <label for="contributor_2">{{ trans('cruds.post.fields.contributor_2') }}</label>
    <input class="form-control {{ $errors->has('contributor_2') ? 'is-invalid' : '' }}" type="text" name="contributor_2" id="contributor_2" value="{{ old('contributor_2', @$post->contributor_2) }}">
    @if($errors->has('contributor_2'))
        <span class="text-danger">{{ $errors->first('contributor_2') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.contributor_2_helper') }}</span>
</div>
<div class="form-group">
    <label for="contributor_2_link">{{ trans('cruds.post.fields.contributor_2_link') }}</label>
    <input class="form-control {{ $errors->has('contributor_2_link') ? 'is-invalid' : '' }}" type="text" name="contributor_2_link" id="contributor_2_link" value="{{ old('contributor_2_link', @$post->contributor_2_link) }}">
    @if($errors->has('contributor_2_link'))
        <span class="text-danger">{{ $errors->first('contributor_2_link') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.post.fields.contributor_2_link_helper') }}</span>
</div>