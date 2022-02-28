<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Service::query()->select(sprintf('%s.*', (new Service())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'service_show';
                $editGate = 'service_edit';
                $deleteGate = 'service_delete';
                $crudRoutePart = 'services';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('content_images', function ($row) {
                if (!$row->content_images) {
                    return '';
                }
                $links = [];
                foreach ($row->content_images as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'content_images', 'published']);

            return $table->make(true);
        }

        return view('admin.services.index');
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        if ($request->input('featured_image', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        foreach ($request->input('content_images', []) as $file) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('content_images');
        }

        if ($request->input('banner', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $service->id]);
        }

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());

        if ($request->input('featured_image', false)) {
            if (!$service->featured_image || $request->input('featured_image') !== $service->featured_image->file_name) {
                if ($service->featured_image) {
                    $service->featured_image->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($service->featured_image) {
            $service->featured_image->delete();
        }

        if (count($service->content_images) > 0) {
            foreach ($service->content_images as $media) {
                if (!in_array($media->file_name, $request->input('content_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $service->content_images->pluck('file_name')->toArray();
        foreach ($request->input('content_images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $service->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('content_images');
            }
        }

        if ($request->input('banner', false)) {
            if (!$service->banner || $request->input('banner') !== $service->banner->file_name) {
                if ($service->banner) {
                    $service->banner->delete();
                }
                $service->addMedia(storage_path('tmp/uploads/' . basename($request->input('banner'))))->toMediaCollection('banner');
            }
        } elseif ($service->banner) {
            $service->banner->delete();
        }

        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequest $request)
    {
        Service::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('service_create') && Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Service();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
