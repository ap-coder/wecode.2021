<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVideoContentRequest;
use App\Http\Requests\StoreVideoContentRequest;
use App\Http\Requests\UpdateVideoContentRequest;
use App\Models\Page;
use App\Models\Thread;
use App\Models\VideoContent;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VideoContentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('video_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoContents = VideoContent::with(['thread', 'pages', 'media'])->get();

        return view('frontend.videoContents.index', compact('videoContents'));
    }

    public function create()
    {
        abort_if(Gate::denies('video_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $threads = Thread::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pages = Page::pluck('title', 'id');

        return view('frontend.videoContents.create', compact('pages', 'threads'));
    }

    public function store(StoreVideoContentRequest $request)
    {
        $videoContent = VideoContent::create($request->all());
        $videoContent->pages()->sync($request->input('pages', []));
        if ($request->input('placeholder', false)) {
            $videoContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('placeholder'))))->toMediaCollection('placeholder');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $videoContent->id]);
        }

        return redirect()->route('frontend.video-contents.index');
    }

    public function edit(VideoContent $videoContent)
    {
        abort_if(Gate::denies('video_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $threads = Thread::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pages = Page::pluck('title', 'id');

        $videoContent->load('thread', 'pages');

        return view('frontend.videoContents.edit', compact('pages', 'threads', 'videoContent'));
    }

    public function update(UpdateVideoContentRequest $request, VideoContent $videoContent)
    {
        $videoContent->update($request->all());
        $videoContent->pages()->sync($request->input('pages', []));
        if ($request->input('placeholder', false)) {
            if (!$videoContent->placeholder || $request->input('placeholder') !== $videoContent->placeholder->file_name) {
                if ($videoContent->placeholder) {
                    $videoContent->placeholder->delete();
                }
                $videoContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('placeholder'))))->toMediaCollection('placeholder');
            }
        } elseif ($videoContent->placeholder) {
            $videoContent->placeholder->delete();
        }

        return redirect()->route('frontend.video-contents.index');
    }

    public function show(VideoContent $videoContent)
    {
        abort_if(Gate::denies('video_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoContent->load('thread', 'pages');

        return view('frontend.videoContents.show', compact('videoContent'));
    }

    public function destroy(VideoContent $videoContent)
    {
        abort_if(Gate::denies('video_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyVideoContentRequest $request)
    {
        VideoContent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('video_content_create') && Gate::denies('video_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VideoContent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
