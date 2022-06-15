<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = User::with(['roles'])->select(sprintf('%s.*', (new User())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'user_show';
                $editGate = 'user_edit';
                $deleteGate = 'user_delete';
                $crudRoutePart = 'users';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('approved', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->approved ? 'checked' : null) . '>';
            });
            $table->editColumn('roles', function ($row) {
                $labels = [];
                foreach ($row->roles as $role) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $role->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('company_name', function ($row) {
                return $row->company_name ? $row->company_name : '';
            });
            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('avatar', function ($row) {
                if ($photo = $row->avatar) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        get_attachment_url($row->avatar,'full'),
        get_attachment_url($row->avatar)
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'approved', 'roles', 'avatar']);

            return $table->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        if ($request->input('avatar', false)) {

            $user->attachment()->create([
                'collection_name' => 'avatar',
                'attachment_id' => $request->avatar,
            ]);
            
        }
        if ($request->input('logo', false)) {

            $user->attachment()->create([
                'collection_name' => 'logo',
                'attachment_id' => $request->logo,
            ]);
            
        }

        if ($request->postmeta['additional_images']) {

            foreach ($request->postmeta['additional_images'] as $file) {
                $user->attachment()->create([
                    'collection_name' => 'additional_images',
                    'attachment_id' => $file,
                ]);
            }
            
        }

        // if ($request->input('avatar', false)) {
        //     $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
        // }

        // if ($request->input('logo', false)) {
        //     $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        // }

        // foreach ($request->input('additional_images', []) as $file) {
        //     $user->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('additional_images');
        // }

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $user->id]);
        // }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        if ($request->input('avatar', false)) {

            $user->attachment()->updateOrCreate(
                [
                    'collection_name' => 'avatar'
                ],
                [
                'collection_name' => 'avatar',
                'attachment_id' => $request->avatar,
                ]
            );
            
        }
        if ($request->input('logo', false)) {

            $user->attachment()->updateOrCreate(
                [
                    'collection_name' => 'logo'
                ],
                [
                'collection_name' => 'logo',
                'attachment_id' => $request->logo,
                ]
            );
            
        }

        if ($request->postmeta['additional_images']) {

            $attachmentIds = array_filter($request->postmeta['additional_images'], function($v){ 
                return !is_null($v) && $v !== ''; 
               });

            $user->attachment()->where('collection_name','additional_images')->whereNotIn('attachment_id',$attachmentIds)->delete();

            foreach ($request->postmeta['additional_images'] as $file) {
                
                if ($file) {
                    $user->attachment()->updateOrCreate(
                        [
                            'collection_name' => 'additional_images',
                            'attachment_id' => $file,
                        ],
                        [
                        'collection_name' => 'additional_images',
                        'attachment_id' => $file,
                        ]
                    );
                }
                
            }
            
        }
        // if ($request->input('avatar', false)) {
        //     if (!$user->avatar || $request->input('avatar') !== $user->avatar->file_name) {
        //         if ($user->avatar) {
        //             $user->avatar->delete();
        //         }
        //         $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
        //     }
        // } elseif ($user->avatar) {
        //     $user->avatar->delete();
        // }

        // if ($request->input('logo', false)) {
        //     if (!$user->logo || $request->input('logo') !== $user->logo->file_name) {
        //         if ($user->logo) {
        //             $user->logo->delete();
        //         }
        //         $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        //     }
        // } elseif ($user->logo) {
        //     $user->logo->delete();
        // }

        // if (count($user->additional_images) > 0) {
        //     foreach ($user->additional_images as $media) {
        //         if (!in_array($media->file_name, $request->input('additional_images', []))) {
        //             $media->delete();
        //         }
        //     }
        // }
        // $media = $user->additional_images->pluck('file_name')->toArray();
        // foreach ($request->input('additional_images', []) as $file) {
        //     if (count($media) === 0 || !in_array($file, $media)) {
        //         $user->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('additional_images');
        //     }
        // }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'clientProjects');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('user_create') && Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new User();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
