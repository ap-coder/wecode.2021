@extends('layouts.admin')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Media Library</h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.media.index_media') }}">Media Library</a></li>
            <li class="breadcrumb-item active">Media Library</li>
        </ol>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="media-upload-form-wrap" id="async-upload-wrap">
            <form enctype="multipart/form-data" method="post" action="{{ route('admin.media.mediaajax') }}" id="media-upload-form">
                <div class="upload-console-drop" id="drop-zone">
                    <h3>Drop files here</h3>
                    <span>OR</span>
                    <input type="file" name="files[]" id="standard-upload-files" multiple="multiple" />
                    <input type="hidden" name="action" value="async_upload" />
                    <input type="hidden" name="type" value="normal" id="type-upload-files" />
                    <button type="button" class="btn" id="plupload-browse-button" />Select Files</button>
                    <div class="maximum_upload_file_size">Maximum upload file size: {{ format_size(file_upload_max_size()) }}</div>
                    <div class="bar hidden" id="bar">
                        <div class="bar-fill" id="bar-fill">
                            <div class="bar-fill-text" id="bar-fill-text"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="media-items"><div class="media-attachments"></div></div>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('libs/css/drag-drop.css') }}" />
@endsection
@section('scripts')
<script type="text/javascript">

    var pageload = 1;
    var media_upload_url = '{{ route("admin.media.medialibrary") }}';
    
    var ajaxRequests = [];
    var admin_media_upload_url = '{{ route("admin.media.mediaaction") }}';
    var admin_ajax_url = '{{ route("admin.media.mediaajax") }}';

</script>
<script type="text/javascript" src="{{ asset('libs/js/drag-drop.js') }}"></script>
@endsection