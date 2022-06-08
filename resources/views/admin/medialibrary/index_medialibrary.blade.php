<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <title>Media Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/drag-drop.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/media-upload.min.css') }}" />
</head>
<body class="ltr" id="creative-media-upload">
<div class="creative-media-upload-header">
    <h1>Insert Media</h1>
    <button type="button" class="creative-media-upload-close" onclick="try{top.tb_remove();}catch(e){}; return false;"></button>
    <ul class="creative-media-upload-sidemenu">
        <li><a href="#" data-type="upload" class="upload">Upload Files</a></li>
        <li><a href="#" data-type="library" class="library current">Media Library</a></li>
    </ul>
</div>
<div class="media-toolbar-search">
    <div class="row">
        <div class="col-md-5">
            <input type="search" placeholder="Search" class="form-control filter-input-search width200">
            <select class="form-control filter-select-date width150">
                <option value="all">All Dates</option>
                @foreach ($attach_date as $date)
                <option value="{{$date->date_val}}">{{$date->date_txt}}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-primary btn-media-filter">Filter</button>
        </div>
    </div>
</div>
<div class="creative-media-upload-browser">
    <div class="creative-media-upload-content">
        <div class="content-tab content-library">
            <div id="media-items" class="media-items-library" data-loading="0" data-thelast="0">
                <ul class="media-attachments media-attachments-thickbox">
                    @foreach ($attachments as $item)
                    <li class="" role="checkbox" data-id="{{$item->at_id}}" title="{{$item->at_title}}" aria-checked="true" id="attachment-item-{{$item->at_id}}">
                        <div class="check"><div class="media-icon"></div></div>
                        <div class="attachment-preview">
                            <div class="thumbnail-item"><img src="{{get_media_mimes_thumbnail($item->at_files, $item->at_mimes)}}" /></div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div id="media-upload-content-toolbar">
                <div class="row">
                    <div class="col-md-5">
                        <button type="button" data-id="0" class="button button-media-select" disabled="disabled">@if($type == 'image') Use this image @else Use this File @endif</button>
                    </div>
                </div>
            </div>
        </div>    
        <div class="content-tab content-upload hidden">
            <div class="media-upload-form-wrap" id="async-upload-wrap">
                <form enctype="multipart/form-data" method="post" action="{{ route('admin.media.mediaajax') }}" id="media-upload-form">
                    <div class="upload-console-drop" id="drop-zone">
                        <h3>Drop files here</h3>
                        <span>OR</span>
                        <input type="file" name="files[]" id="standard-upload-files" multiple="multiple" />
                        <input type="hidden" name="action" value="async_upload" />
                        <input type="hidden" name="type" value="thickbox" id="type-upload-files" />
                        <button type="button" class="btn" id="plupload-browse-button">Select Files</button>                        
                        <div class="maximum_upload_file_size">Maximum upload file size: {{ format_size(file_upload_max_size()) }}</div>
                        <div class="bar hidden" id="bar">
                            <div class="bar-fill" id="bar-fill">
                                <div class="bar-fill-text" id="bar-fill-text"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <ul id="media-items" class="media-attachments"></ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    var pageload = 1;
    var media_upload_url = '{{ route("admin.media.medialibrary") }}',
    tb_pathToImage = "{{ asset('libs/cupload/js/thickbox/loadingAnimation.gif') }}",
    tb_closeImage  = "{{ asset('libs/cupload/js/thickbox/tb-close.png') }}";
    
    var ajaxRequests = [];
    var admin_media_upload_url = '{{ route("admin.media.mediaaction") }}';
    var admin_ajax_url = '{{ route("admin.media.mediaajax") }}';
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/cupload/js/thickbox/thickbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/media-upload.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/drag-drop.js') }}"></script>
<script>
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
$(function() {$("table th input:checkbox").on("click" , function(){var that = this;$(this).closest("table").find("tr > td:first-child input:checkbox").each(function(){this.checked = that.checked;$(this).closest("tr").toggleClass("selected");});});})</script>
</body>
</html>
