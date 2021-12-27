@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.technology.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.technologies.update", [$technology->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ trans('cruds.technology.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $technology->name) }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.technology.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="projects">{{ trans('cruds.technology.fields.projects') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="projects[]" id="projects" multiple>
                                @foreach($projects as $id => $project)
                                    <option value="{{ $id }}" {{ (in_array($id, old('projects', [])) || $technology->projects->contains($id)) ? 'selected' : '' }}>{{ $project }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('projects'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('projects') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection