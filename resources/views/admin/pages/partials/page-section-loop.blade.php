@foreach($pageSections as $key => $pageSection)
<tr data-entry-id="{{ $pageSection->id }}">
    <td>
        <input type="hidden" class="PageSectionOrders" name="PageSectionOrders[]" value="{{ $pageSection->id }}"> 
    </td>
    <th>
        <input type="checkbox" disabled {{ ($pageSection->published ? 'checked' : null) }}>
    </th>
    <td class="text-uppercase">
        {{ $pageSection->section_nickname ?? '' }}
    </td>
    
    <td>
        
        @can('pagesection_edit')
            <a class="btn btn-xs btn-info editPageSection" myid="{{ $pageSection->id }}" href="javascript:void(0);" data-toggle="modal" data-target="#editPageSectionModal{{ $pageSection->id }}">
                <i class="fas fa-edit"></i>
            </a>
        @endcan

        @can('pagesection_delete')
            <a class="btn btn-xs btn-danger DeletePageSectionBtn" myid="{{ $pageSection->id }}" href="javascript:void(0);">
                <i class='fas fa-trash-alt'></i>
            </a>
            @endcan

    </td>

</tr>


<div class="modal" id="editPageSectionModal{{ $pageSection->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="editPageSectionForm{{ $pageSection->id }}">
            @csrf
          <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title"> Edit  {{ trans('cruds.pagesection.title_singular') }}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body" style="min-height: calc(100vh - 200px);">
        
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    {{-- <input type="hidden" name="published" value="0"> --}}
                    <input class="form-check-input" type="checkbox" name="published" value="1" id="published{{ $pageSection->id }}" {{ @$pageSection->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published{{ $pageSection->id }}">{{ trans('cruds.pagesection.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pagesection.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nickname">{{ trans('cruds.pagesection.fields.section_nickname') }}</label>
                <input class="form-control {{ $errors->has('section_nickname') ? 'is-invalid' : '' }}" type="text" name="section_nickname" id="nickname{{ $pageSection->id }}" value="{{ old('nickname', @$pageSection->section_nickname) }}">
                @if($errors->has('section_nickname'))
                    <span class="text-danger">{{ $errors->first('section_nickname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pagesection.fields.section_nickname_helper') }}</span>
            </div>
           
            <div class="form-group">
                <label for="PageSectionTxt">{{ trans('cruds.pagesection.fields.section') }}</label>
                <textarea class="prism-live language-html {{ $errors->has('section') ? 'is-invalid' : '' }} PageSectionTxt" name="section" id="PageSectionTxt{{ $pageSection->id }}">{{ old('section', @$pageSection->section) }}</textarea>
                @if($errors->has('section'))
                    <span class="text-danger">{{ $errors->first('section') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pagesection.fields.section_helper') }}</span>
            </div>
                
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-info" id="savePageSection" pid="{{ @$pageSection->id }}">Save</button>
          </div>
          </form>
      </div>
    </div>
  </div>

@endforeach