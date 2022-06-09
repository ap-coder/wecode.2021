@extends('layouts.admin')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Media Library</h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Media Library</li>
        </ol>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3 data-tables-filter">
        <form method="GET" action="" class="form-filter">
            <input type="search" name="s" class="form-control form-control-sm" value="{{request()->get('s')}}" placeholder="Search">
            <button type="submit" class="btn btn-sm btn-primary button-form-filter">Search</button>
        </form>
    </div>
    <div class="col-md-6"></div>
</div>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>{!! session()->get('success') !!}</div>
@endif

<div class="card">
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('admin.media.media_actions') }}">
            {{ csrf_field() }}
            <input type="hidden" name="query" value="action">
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="actionselect">
                        <select name="action" class="custom-select form-select custom-select-sm form-control form-control-sm width-120">
                            <option value="-1">Bulk Actions</option>
                            <option value="delete">Delete</option>
                        </select>
                        <input type="submit" class="btn btn-sm btn-primary" value="Apply" onclick="return confirm('Are you sure of the procedure?');">
                    </div>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4 btn-addnew">
                    <a href="{{ route('admin.media.media_upload') }}" class="btn btn-sm btn-primary">Upload</a>
                </div>
            </div>
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th class="text-center th-checkbox" style="width: 50px;">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall" />
                                <label class="custom-control-label" for="selectall"></label>
                            </div>
                        </th>
                        <th>Title</th>
                        <th class="hidden-phone text-center">Extension</th>
                        <th class="hidden-phone text-center">Author</th>
                        <th class="hidden-phone text-center width-200">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attachments as $attachment)
                    <tr>
                        <td class="td-checkbox">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="mark[]" value="{{ $attachment->at_id }}" id="select-{{ $attachment->at_id }}" />                                        
                                <label class="custom-control-label" for="select-{{ $attachment->at_id }}"></label>
                            </div>
                        </td>
                        <td>
                            <img src="{{get_media_mimes_thumbnail($attachment->at_files, $attachment->at_mimes)}}" class="image-table" alt="">          
                            <strong><a href="{{ route('admin.media.index_editmedia',$attachment->at_id) }}">{{ $attachment->at_title }}</a></strong>
                            <div class="row-actions">
                                <a href="{{ route('admin.media.index_editmedia',$attachment->at_id) }}">Edit</a> | 
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#confirm-delete" data-href="{{ url('admin/media/deletemedia/'.$attachment->at_id.'/'.csrf_token() ) }}" data-body="are you sure! Want to delete # {{ $attachment->at_title }}?" class="red">Delete</a>
                            </div>
                        </td>
                        <td class="hidden-phone text-center">{{$attachment->at_mimes}}</td>
                        <td class="hidden-phone text-center">{{ get_username($attachment->at_uid) }}</td>
                        <td class="hidden-phone text-center" dir="ltr">{{$attachment->at_modified}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        {{$attachments->links('layouts.pagination')}}
    </div>
</div>
@endsection

