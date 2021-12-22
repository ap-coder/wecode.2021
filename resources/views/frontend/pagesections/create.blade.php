@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.pagesection.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.pagesections.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="section">{{ trans('cruds.pagesection.fields.section') }}</label>
                            <textarea class="form-control" name="section" id="section" required>{{ old('section') }}</textarea>
                            @if($errors->has('section'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('section') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pagesection.fields.section_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="section_nickname">{{ trans('cruds.pagesection.fields.section_nickname') }}</label>
                            <input class="form-control" type="text" name="section_nickname" id="section_nickname" value="{{ old('section_nickname', '') }}">
                            @if($errors->has('section_nickname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('section_nickname') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pagesection.fields.section_nickname_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="order">{{ trans('cruds.pagesection.fields.order') }}</label>
                            <input class="form-control" type="number" name="order" id="order" value="{{ old('order', '0') }}" step="1">
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pagesection.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pages">{{ trans('cruds.pagesection.fields.pages') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="pages[]" id="pages" multiple>
                                @foreach($pages as $id => $page)
                                    <option value="{{ $id }}" {{ in_array($id, old('pages', [])) ? 'selected' : '' }}>{{ $page }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pages'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pages') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection