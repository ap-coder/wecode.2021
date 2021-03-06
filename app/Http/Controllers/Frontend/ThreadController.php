<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyThreadRequest;
use App\Http\Requests\StoreThreadRequest;
use App\Http\Requests\UpdateThreadRequest;
use App\Models\Thread;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ThreadController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('thread_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $threads = Thread::with(['media'])->get();

        return view('frontend.threads.index', compact('threads'));
    }

    public function create()
    {
        abort_if(Gate::denies('thread_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.threads.create');
    }

    public function store(StoreThreadRequest $request)
    {
        $thread = Thread::create($request->all());

        if ($request->input('photo', false)) {
            $thread->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        foreach ($request->input('additional_photos', []) as $file) {
            $thread->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('additional_photos');
        }

        foreach ($request->input('attachments', []) as $file) {
            $thread->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $thread->id]);
        }

        return redirect()->route('frontend.threads.index');
    }

    public function edit(Thread $thread)
    {
        abort_if(Gate::denies('thread_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.threads.edit', compact('thread'));
    }

    public function update(UpdateThreadRequest $request, Thread $thread)
    {
        $thread->update($request->all());

        if ($request->input('photo', false)) {
            if (!$thread->photo || $request->input('photo') !== $thread->photo->file_name) {
                if ($thread->photo) {
                    $thread->photo->delete();
                }
                $thread->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($thread->photo) {
            $thread->photo->delete();
        }

        if (count($thread->additional_photos) > 0) {
            foreach ($thread->additional_photos as $media) {
                if (!in_array($media->file_name, $request->input('additional_photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $thread->additional_photos->pluck('file_name')->toArray();
        foreach ($request->input('additional_photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $thread->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('additional_photos');
            }
        }

        if (count($thread->attachments) > 0) {
            foreach ($thread->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $thread->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $thread->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('frontend.threads.index');
    }

    public function show(Thread $thread)
    {
        abort_if(Gate::denies('thread_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.threads.show', compact('thread'));
    }

    public function destroy(Thread $thread)
    {
        abort_if(Gate::denies('thread_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thread->delete();

        return back();
    }

    public function massDestroy(MassDestroyThreadRequest $request)
    {
        Thread::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('thread_create') && Gate::denies('thread_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Thread();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
