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
            <a class="btn btn-xs btn-info editPageSection" myid="{{ $pageSection->id }}" href="javascript:void(0);">
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
@endforeach