@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pagesection.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pagesections.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="section">{{ trans('cruds.pagesection.fields.section') }}</label>
                <textarea class="form-control {{ $errors->has('section') ? 'is-invalid' : '' }}" name="section" id="section" required>{{ old('section') }}</textarea>
                @if($errors->has('section'))
                    <span class="text-danger">{{ $errors->first('section') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pagesection.fields.section_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="section_nickname">{{ trans('cruds.pagesection.fields.section_nickname') }}</label>
                <input class="form-control {{ $errors->has('section_nickname') ? 'is-invalid' : '' }}" type="text" name="section_nickname" id="section_nickname" value="{{ old('section_nickname', '') }}">
                @if($errors->has('section_nickname'))
                    <span class="text-danger">{{ $errors->first('section_nickname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pagesection.fields.section_nickname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order">{{ trans('cruds.pagesection.fields.order') }}</label>
                <input class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" type="number" name="order" id="order" value="{{ old('order', '0') }}" step="1">
                @if($errors->has('order'))
                    <span class="text-danger">{{ $errors->first('order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pagesection.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pages">{{ trans('cruds.pagesection.fields.pages') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('pages') ? 'is-invalid' : '' }}" name="pages[]" id="pages" multiple>
                    @foreach($pages as $id => $page)
                        <option value="{{ $id }}" {{ in_array($id, old('pages', [])) ? 'selected' : '' }}>{{ $page }}</option>
                    @endforeach
                </select>
                @if($errors->has('pages'))
                    <span class="text-danger">{{ $errors->first('pages') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pagesection.fields.pages_helper') }}</span>
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