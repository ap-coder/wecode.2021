<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVideoContentRequest;
use App\Http\Requests\UpdateVideoContentRequest;
use App\Http\Resources\Admin\VideoContentResource;
use App\Models\VideoContent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoContentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('video_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VideoContentResource(VideoContent::with(['thread', 'pages'])->get());
    }

    public function store(StoreVideoContentRequest $request)
    {
        $videoContent = VideoContent::create($request->all());
        $videoContent->pages()->sync($request->input('pages', []));
        if ($request->input('placeholder', false)) {
            $videoContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('placeholder'))))->toMediaCollection('placeholder');
        }

        return (new VideoContentResource($videoContent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VideoContent $videoContent)
    {
        abort_if(Gate::denies('video_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VideoContentResource($videoContent->load(['thread', 'pages']));
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

        return (new VideoContentResource($videoContent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VideoContent $videoContent)
    {
        abort_if(Gate::denies('video_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoContent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
