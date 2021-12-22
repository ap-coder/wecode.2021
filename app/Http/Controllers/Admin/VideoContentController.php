<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class VideoContentController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('video_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VideoContent::with(['thread', 'pages'])->select(sprintf('%s.*', (new VideoContent())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'video_content_show';
                $editGate = 'video_content_edit';
                $deleteGate = 'video_content_delete';
                $crudRoutePart = 'video-contents';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('video_type', function ($row) {
                return $row->video_type ? VideoContent::VIDEO_TYPE_RADIO[$row->video_type] : '';
            });
            $table->editColumn('order', function ($row) {
                return $row->order ? $row->order : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published']);

            return $table->make(true);
        }

        return view('admin.videoContents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('video_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $threads = Thread::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pages = Page::pluck('title', 'id');

        return view('admin.videoContents.create', compact('pages', 'threads'));
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

        return redirect()->route('admin.video-contents.index');
    }

    public function edit(VideoContent $videoContent)
    {
        abort_if(Gate::denies('video_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $threads = Thread::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pages = Page::pluck('title', 'id');

        $videoContent->load('thread', 'pages');

        return view('admin.videoContents.edit', compact('pages', 'threads', 'videoContent'));
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

        return redirect()->route('admin.video-contents.index');
    }

    public function show(VideoContent $videoContent)
    {
        abort_if(Gate::denies('video_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoContent->load('thread', 'pages');

        return view('admin.videoContents.show', compact('videoContent'));
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
