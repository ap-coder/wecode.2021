@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.technology.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.technologies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.technology.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.technology.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="projects">{{ trans('cruds.technology.fields.projects') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('projects') ? 'is-invalid' : '' }}" name="projects[]" id="projects" multiple>
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ in_array($id, old('projects', [])) ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('projects'))
                    <span class="text-danger">{{ $errors->first('projects') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.technology.fields.projects_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection