@extends('layouts.admin')
@section('content')
<div class="page-title-box d-flex align-items-center justify-content-between">
    <h4 class="mb-0 font-size-18">Media Library</h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.media.index_media') }}">Media Library</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
</div>
<form method="POST" action="{{ route('admin.media.media_update') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="at_id" value="{{$single->at_id}}" />
    <div class="post-fixed-toolbar media-mime">
        <img class="image-media-mime" src="{{get_media_mimes_thumbnail($single->at_files, $single->at_mimes)}}" />
        <ul>
            <li class="right-toolbar">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
            </li>
        </ul>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>{!! session()->get('success') !!}</div>
    @endif
    <div class="form-group">
        <input type="text" name="at_title" placeholder="Enter Title Here" value="{{$single->at_title}}" class="form-control input-post-title" />
    </div>
    <div class="tacf-box-container">
        <div class="tacf-box-tabs nav-tabs-cookie" data-cookie="media_library" data-cookie-tab="tab-details">
            <a href="#" class="active" data-tab=".tab-details"><i class="bx bx-pencil"></i> Details</a>
        </div>
        <div class="tacf-tabs-content">
            <div class="tacf-tab-content tab-details active">
                <div class="row">
                    <div class="col-md-6 border-right">
                        @if($filetype == 'image')
                        <img src="{{url($single->at_file)}}" alt="" />
                        @elseif($filetype == 'audio')
                        <div class="cmp-music-player-audio">
                            @include('dashboard.medialibrary.player_audio')
                        </div>
                        @elseif($filetype == 'video' and $single->at_mimes == 'mp4')
                        <video width="420" height="320" controls>
                            <source src="{{url($single->at_file)}}" type="{{$single->at_type}}">
                        </video>
                        @else
                        <img src="{{get_media_mimes_thumbnail($single->at_files, $single->at_mimes)}}" width="128" alt="" />
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Url</label>
                            <div class="input-group">
                                <input id="url" type="text" value="{{url($single->at_file)}}" class="form-control url-clipboard">
                                <span class="input-group-text btn-clipboard" data-clipboard-target=".url-clipboard"><i class="bx bx-copy"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="12" autocomplete="off" name="at_desc" placeholder="Description">{{ $single->at_desc }}</textarea>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Uploaded on:</strong> {{$single->at_modified}}</li>
                            <li class="list-group-item"><strong>File type:</strong> {{$single->at_mimes}}</li>
                            <li class="list-group-item"><strong>File size:</strong> {{format_size($single->at_size)}}</li>
                            @if($single->at_dimensions)<li class="list-group-item"><strong>Dimensions:</strong> {{$single->at_dimensions}}</li>@endif
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>
@endsection
@section('styles')
<link href="{{ asset('libs/tacf/tacf.min.css') }}" rel="stylesheet" type="text/css">
@if($filetype == 'audio')
<link href="{{ asset('libs/jplayer/jplayer.css') }}" rel="stylesheet" type="text/css" />
@endif
@endsection
@section('scripts')
<script src="{{ asset('libs/tacf/tacf.min.js') }}"></script>
<script src="{{ asset('libs/clipboard/clipboard.min.js') }}"></script>
<script>new ClipboardJS('.btn-clipboard');</script>
@if($filetype == 'audio')
<script src="{{ asset('libs/jplayer/jquery.jplayer.min.js') }}"></script>
<script src="{{ asset('libs/jplayer/jplayer.js') }}"></script>
<script>$(function() {playSong('{{url($single->at_file)}}', '{{$single->at_mimes}}');});</script>
@endif
@endsection