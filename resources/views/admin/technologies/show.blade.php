@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.technology.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.technologies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.technology.fields.id') }}
                        </th>
                        <td>
                            {{ $technology->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.technology.fields.name') }}
                        </th>
                        <td>
                            {{ $technology->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.technology.fields.projects') }}
                        </th>
                        <td>
                            @foreach($technology->projects as $key => $projects)
                                <span class="label label-info">{{ $projects->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.technologies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection