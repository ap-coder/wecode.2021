<div class="form-group">
    <label for="name">{{ trans('cruds.project.fields.name') }}</label>
    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', @$project->name) }}">
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.name_helper') }}</span>
</div>
<div class="form-group">
    <label for="intro">{{ trans('cruds.project.fields.intro') }}</label>
    <textarea class="form-control {{ $errors->has('intro') ? 'is-invalid' : '' }}" name="intro" id="intro">{{ old('intro', @$project->intro) }}</textarea>
    @if($errors->has('intro'))
        <span class="text-danger">{{ $errors->first('intro') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.intro_helper') }}</span>
</div>
<div class="form-group">
    <label for="body_content">{{ trans('cruds.project.fields.body_content') }}</label>
    {{-- <textarea class="form-control ckeditor {{ $errors->has('body_content') ? 'is-invalid' : '' }}" name="body_content" id="body_content">{!! old('body_content', @$project->body_content) !!}</textarea> --}}
    <textarea rows="20" autocomplete="off" name="body_content" class="articleeditor-content {{ $errors->has('body_content') ? 'is-invalid' : '' }}" id="body_content">{!! old('body_content', @$project->body_content) !!}</textarea>
    @if($errors->has('body_content'))
        <span class="text-danger">{{ $errors->first('body_content') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.body_content_helper') }}</span>
</div>
<div class="form-group">
    <label for="category_id">{{ trans('cruds.project.fields.category') }}</label>
    <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
        @foreach($categories as $id => $entry)
            <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : @$project->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
        @endforeach
    </select>
    @if($errors->has('category'))
        <span class="text-danger">{{ $errors->first('category') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.category_helper') }}</span>
</div>

<div class="form-group">
    <label for="slug">{{ trans('cruds.project.fields.slug') }}</label>
    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', @$project->slug) }}">
    @if($errors->has('slug'))
        <span class="text-danger">{{ $errors->first('slug') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.slug_helper') }}</span>
</div>
<div class="form-group">
    <label for="client_id">{{ trans('cruds.project.fields.client') }}</label>
    <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id">
        @foreach($clients as $id => $entry)
            <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : @$project->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
        @endforeach
    </select>
    @if($errors->has('client'))
        <span class="text-danger">{{ $errors->first('client') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.client_helper') }}</span>
</div>
<div class="form-group">
    <label for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', @$project->start_date) }}">
    @if($errors->has('start_date'))
        <span class="text-danger">{{ $errors->first('start_date') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.start_date_helper') }}</span>
</div>
<div class="form-group">
    <label>{{ trans('cruds.project.fields.project_type') }}</label>
    <select class="form-control {{ $errors->has('project_type') ? 'is-invalid' : '' }}" name="project_type" id="project_type">
        <option value disabled {{ old('project_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach(App\Models\Project::PROJECT_TYPE_SELECT as $key => $label)
            <option value="{{ $key }}" {{ old('project_type', @$project->project_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($errors->has('project_type'))
        <span class="text-danger">{{ $errors->first('project_type') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.project_type_helper') }}</span>
</div>
<div class="form-group">
    <label for="website">{{ trans('cruds.project.fields.website') }}</label>
    <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', @$project->website) }}">
    @if($errors->has('website'))
        <span class="text-danger">{{ $errors->first('website') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.website_helper') }}</span>
</div>
<div class="form-group">
    <label for="challenges">{{ trans('cruds.project.fields.challenges') }}</label>
    {{-- <textarea class="form-control ckeditor {{ $errors->has('challenges') ? 'is-invalid' : '' }}" name="challenges" id="challenges">{!! old('challenges', @$project->challenges) !!}</textarea> --}}
    <textarea rows="20" autocomplete="off" name="challenges" class="articleeditor-content {{ $errors->has('challenges') ? 'is-invalid' : '' }}" id="challenges">{!! old('challenges', @$project->challenges) !!}</textarea>
    @if($errors->has('challenges'))
        <span class="text-danger">{{ $errors->first('challenges') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.challenges_helper') }}</span>
</div>
<div class="form-group">
    <label for="solutions">{{ trans('cruds.project.fields.solutions') }}</label>
    {{-- <textarea class="form-control ckeditor {{ $errors->has('solutions') ? 'is-invalid' : '' }}" name="solutions" id="solutions">{!! old('solutions', @$project->solutions) !!}</textarea> --}}
    <textarea rows="20" autocomplete="off" name="solutions" class="articleeditor-content {{ $errors->has('solutions') ? 'is-invalid' : '' }}" id="solutions">{!! old('solutions', @$project->solutions) !!}</textarea>
    @if($errors->has('solutions'))
        <span class="text-danger">{{ $errors->first('solutions') }}</span>
    @endif
    <span class="help-block">{{ trans('cruds.project.fields.solutions_helper') }}</span>
</div>