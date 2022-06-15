<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStaffRequest;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Staff;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('staff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Staff::with(['user'])->select(sprintf('%s.*', (new Staff())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'staff_show';
                $editGate = 'staff_edit';
                $deleteGate = 'staff_delete';
                $crudRoutePart = 'staff';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('job_title', function ($row) {
                return $row->job_title ? $row->job_title : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('staff_email', function ($row) {
                return $row->staff_email ? $row->staff_email : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published']);

            return $table->make(true);
        }

        return view('admin.staff.index');
    }

    public function create()
    {
        abort_if(Gate::denies('staff_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.staff.create', compact('users'));
    }

    public function store(StoreStaffRequest $request)
    {
        $staff = Staff::create($request->all());

        if ($request->input('picture', false)) {

            $staff->attachment()->create([
                'collection_name' => 'picture',
                'attachment_id' => $request->picture,
            ]);
            
        }

        // if ($request->input('picture', false)) {
        //     $staff->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
        // }

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $staff->id]);
        // }

        return redirect()->route('admin.staff.index');
    }

    public function edit(Staff $staff)
    {
        abort_if(Gate::denies('staff_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $staff->load('user');

        return view('admin.staff.edit', compact('staff', 'users'));
    }

    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        $staff->update($request->all());

        if ($request->input('picture', false)) {

            $staff->attachment()->updateOrCreate(
                [
                    'collection_name' => 'picture'
                ],
                [
                'collection_name' => 'picture',
                'attachment_id' => $request->picture,
                ]
            );
            
        }

        // if ($request->input('picture', false)) {
        //     if (!$staff->picture || $request->input('picture') !== $staff->picture->file_name) {
        //         if ($staff->picture) {
        //             $staff->picture->delete();
        //         }
        //         $staff->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
        //     }
        // } elseif ($staff->picture) {
        //     $staff->picture->delete();
        // }

        return redirect()->route('admin.staff.index');
    }

    public function show(Staff $staff)
    {
        abort_if(Gate::denies('staff_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff->load('user');

        return view('admin.staff.show', compact('staff'));
    }

    public function destroy(Staff $staff)
    {
        abort_if(Gate::denies('staff_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff->delete();

        return back();
    }

    public function massDestroy(MassDestroyStaffRequest $request)
    {
        Staff::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('staff_create') && Gate::denies('staff_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Staff();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
