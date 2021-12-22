<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReplyRequest;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('reply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $replies = Reply::with(['author', 'thread', 'media'])->get();

        return view('frontend.replies.index', compact('replies'));
    }

    public function create()
    {
        abort_if(Gate::denies('reply_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $threads = Thread::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.replies.create', compact('authors', 'threads'));
    }

    public function store(StoreReplyRequest $request)
    {
        $reply = Reply::create($request->all());

        if ($request->input('attachements', false)) {
            $reply->addMedia(storage_path('tmp/uploads/' . basename($request->input('attachements'))))->toMediaCollection('attachements');
        }

        if ($request->input('main_photo', false)) {
            $reply->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_photo'))))->toMediaCollection('main_photo');
        }

        foreach ($request->input('additional_photos', []) as $file) {
            $reply->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('additional_photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $reply->id]);
        }

        return redirect()->route('frontend.replies.index');
    }

    public function edit(Reply $reply)
    {
        abort_if(Gate::denies('reply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $threads = Thread::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reply->load('author', 'thread');

        return view('frontend.replies.edit', compact('authors', 'reply', 'threads'));
    }

    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        $reply->update($request->all());

        if ($request->input('attachements', false)) {
            if (!$reply->attachements || $request->input('attachements') !== $reply->attachements->file_name) {
                if ($reply->attachements) {
                    $reply->attachements->delete();
                }
                $reply->addMedia(storage_path('tmp/uploads/' . basename($request->input('attachements'))))->toMediaCollection('attachements');
            }
        } elseif ($reply->attachements) {
            $reply->attachements->delete();
        }

        if ($request->input('main_photo', false)) {
            if (!$reply->main_photo || $request->input('main_photo') !== $reply->main_photo->file_name) {
                if ($reply->main_photo) {
                    $reply->main_photo->delete();
                }
                $reply->addMedia(storage_path('tmp/uploads/' . basename($request->input('main_photo'))))->toMediaCollection('main_photo');
            }
        } elseif ($reply->main_photo) {
            $reply->main_photo->delete();
        }

        if (count($reply->additional_photos) > 0) {
            foreach ($reply->additional_photos as $media) {
                if (!in_array($media->file_name, $request->input('additional_photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $reply->additional_photos->pluck('file_name')->toArray();
        foreach ($request->input('additional_photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $reply->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('additional_photos');
            }
        }

        return redirect()->route('frontend.replies.index');
    }

    public function show(Reply $reply)
    {
        abort_if(Gate::denies('reply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reply->load('author', 'thread');

        return view('frontend.replies.show', compact('reply'));
    }

    public function destroy(Reply $reply)
    {
        abort_if(Gate::denies('reply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reply->delete();

        return back();
    }

    public function massDestroy(MassDestroyReplyRequest $request)
    {
        Reply::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('reply_create') && Gate::denies('reply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Reply();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
