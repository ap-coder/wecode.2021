            

            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.page.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', @$page->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.title_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="title">{{ trans('cruds.page.fields.sub_title') }}</label>
                <input class="form-control {{ $errors->has('sub_title') ? 'is-invalid' : '' }}" type="text" name="sub_title" id="sub_title" value="{{ old('sub_title', @$page->sub_title) }}">
                @if($errors->has('sub_title'))
                    <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.sub_title_helper') }}</span>
            </div>



            <hr class="mb-3">

            @if (isset($page))
            <div class="form-group">
                <label for="excerpt">{{ trans('cruds.page.fields.page_section') }}</label>
                @can('pagesection_create')
                    <div class="float-right">
                        <a class="btn btn-success addPageSection" href="javascript:void(0);" data-toggle="modal" data-target="#addPageSectionModal">
                            {{ trans('global.add') }} {{ trans('cruds.pagesection.title_singular') }}
                        </a> 
                        <a class="btn btn-success addExistingPageSection" href="javascript:void(0);" data-toggle="modal" data-target="#addExistingPageSectionModal">
                            {{ trans('global.add') }} Existing Sections
                        </a>
                    </div>

                @endcan
            </div>

            <div class="col-md-12">

                @includeIf('admin.pages.partials.page-section', ['pageSections' => $page->pagesPagesections])

                <span class="help-block">SECTIONS ARE DRAG AND DROP</span> <br>
                <span class="help-block"><small>Use this class in section tag to make full width and make section ignore boxed style.  &nbsp; .full-width-section </small></span> <br>
            </div>
            @else
            <h1>Sections Can Only Be Added on Edit</h1>
            @endif

            <hr>



             <div class="form-group">
                <label for="excerpt">{{ trans('cruds.page.fields.excerpt') }}</label>
                <textarea class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" name="excerpt" id="excerpt">{{ old('excerpt', @$page->excerpt) }}</textarea>
                @if($errors->has('excerpt'))
                    <span class="text-danger">{{ $errors->first('excerpt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.excerpt_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="slug">{{ trans('cruds.page.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', @$page->slug) }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.slug_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="path">{{ trans('cruds.page.fields.path') }}</label>
                <input class="form-control {{ $errors->has('path') ? 'is-invalid' : '' }}" type="text" name="path" id="path" value="{{ old('path', @$page->path) }}">
                @if($errors->has('path'))
                    <span class="text-danger">{{ $errors->first('path') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.page.fields.path_helper') }}</span>
            </div>