<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTopicRequest;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TopicController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('topic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topics = Topic::with(['media'])->get();

        return view('frontend.topics.index', compact('topics'));
    }

    public function create()
    {
        abort_if(Gate::denies('topic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.topics.create');
    }

    public function store(StoreTopicRequest $request)
    {
        $topic = Topic::create($request->all());

        if ($request->input('photo', false)) {
            $topic->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $topic->id]);
        }

        return redirect()->route('frontend.topics.index');
    }

    public function edit(Topic $topic)
    {
        abort_if(Gate::denies('topic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.topics.edit', compact('topic'));
    }

    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $topic->update($request->all());

        if ($request->input('photo', false)) {
            if (!$topic->photo || $request->input('photo') !== $topic->photo->file_name) {
                if ($topic->photo) {
                    $topic->photo->delete();
                }
                $topic->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($topic->photo) {
            $topic->photo->delete();
        }

        return redirect()->route('frontend.topics.index');
    }

    public function show(Topic $topic)
    {
        abort_if(Gate::denies('topic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.topics.show', compact('topic'));
    }

    public function destroy(Topic $topic)
    {
        abort_if(Gate::denies('topic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topic->delete();

        return back();
    }

    public function massDestroy(MassDestroyTopicRequest $request)
    {
        Topic::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('topic_create') && Gate::denies('topic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Topic();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
