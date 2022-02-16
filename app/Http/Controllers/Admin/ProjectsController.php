<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use App\Models\ContentSection;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Project::with(['category', 'client'])->select(sprintf('%s.*', (new Project())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'project_show';
                $editGate = 'project_edit';
                $deleteGate = 'project_delete';
                $crudRoutePart = 'projects';

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
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('header_image', function ($row) {
                if ($photo = $row->header_image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('meta_title', function ($row) {
                return $row->meta_title ? $row->meta_title : '';
            });
            $table->editColumn('meta_description', function ($row) {
                return $row->meta_description ? $row->meta_description : '';
            });
            $table->editColumn('fb_title', function ($row) {
                return $row->fb_title ? $row->fb_title : '';
            });
            $table->editColumn('tw_description', function ($row) {
                return $row->tw_description ? $row->tw_description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'published', 'header_image']);

            return $table->make(true);
        }

        return view('admin.projects.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.projects.create', compact('categories', 'clients'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        if ($request->input('header_image', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
        }

        if ($request->input('featured_image', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        foreach ($request->input('additional_images', []) as $file) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('additional_images');
        }

        if ($request->input('challenge_image', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('challenge_image'))))->toMediaCollection('challenge_image');
        }

        if ($request->input('solution_image', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('solution_image'))))->toMediaCollection('solution_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $project->id]);
        }

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        abort_if(Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $project->load('category', 'client');

        return view('admin.projects.edit', compact('categories', 'clients', 'project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        if ($request->input('header_image', false)) {
            if (!$project->header_image || $request->input('header_image') !== $project->header_image->file_name) {
                if ($project->header_image) {
                    $project->header_image->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
            }
        } elseif ($project->header_image) {
            $project->header_image->delete();
        }

        if ($request->input('featured_image', false)) {
            if (!$project->featured_image || $request->input('featured_image') !== $project->featured_image->file_name) {
                if ($project->featured_image) {
                    $project->featured_image->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($project->featured_image) {
            $project->featured_image->delete();
        }

        if (count($project->additional_images) > 0) {
            foreach ($project->additional_images as $media) {
                if (!in_array($media->file_name, $request->input('additional_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $project->additional_images->pluck('file_name')->toArray();
        foreach ($request->input('additional_images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $project->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('additional_images');
            }
        }

        if ($request->input('challenge_image', false)) {
            if (!$project->challenge_image || $request->input('challenge_image') !== $project->challenge_image->file_name) {
                if ($project->challenge_image) {
                    $project->challenge_image->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('challenge_image'))))->toMediaCollection('challenge_image');
            }
        } elseif ($project->challenge_image) {
            $project->challenge_image->delete();
        }

        if ($request->input('solution_image', false)) {
            if (!$project->solution_image || $request->input('solution_image') !== $project->solution_image->file_name) {
                if ($project->solution_image) {
                    $project->solution_image->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('solution_image'))))->toMediaCollection('solution_image');
            }
        } elseif ($project->solution_image) {
            $project->solution_image->delete();
        }

        if ($request->preview) {
            echo json_encode($project->slug);
        } else {
            return redirect()->route('admin.projects.index');
        }

    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->load('category', 'client', 'projectsTechnologies');

        return view('admin.projects.show', compact('project'));
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_create') && Gate::denies('project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Project();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function GetProjectContentSectionModalForm(Request $request)
    {
        $contentSection=ContentSection::find($request->id);
        $html= view('admin.projects.partials.content-section-modal', compact('contentSection'))->render();

        echo $html;
    }

    public function AddProjectContentSection(Request $request)
    {
        if($request->id){
            $contentSection=ContentSection::find($request->id);
            $contentSection->update($request->all());
        }else{
            $contentSection = ContentSection::create($request->all());
        }

        $contentSection->assign_projects()->sync($request->input('projects', []));

        $projects = Project::where('id',$request->projects)->first();

        $contentSections=$projects->projectsContentSections;

        $html= view('admin.projects.partials.content-section-loop', compact('contentSections'))->render();

        echo $html;
    }

    public function ChangeProjectContentSectionOrder(Request $request)
    {
        $ids=$request->params;
        foreach ($ids as $key => $id) {
            ContentSection::where('id',$id['value'])->update([
                'order' => $key+1,
            ]);
        }
        echo 1;
    }
}
