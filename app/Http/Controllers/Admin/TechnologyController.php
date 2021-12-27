<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTechnologyRequest;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Project;
use App\Models\Technology;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TechnologyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('technology_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $technologies = Technology::with(['projects'])->get();

        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        abort_if(Gate::denies('technology_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('name', 'id');

        return view('admin.technologies.create', compact('projects'));
    }

    public function store(StoreTechnologyRequest $request)
    {
        $technology = Technology::create($request->all());
        $technology->projects()->sync($request->input('projects', []));

        return redirect()->route('admin.technologies.index');
    }

    public function edit(Technology $technology)
    {
        abort_if(Gate::denies('technology_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('name', 'id');

        $technology->load('projects');

        return view('admin.technologies.edit', compact('projects', 'technology'));
    }

    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $technology->update($request->all());
        $technology->projects()->sync($request->input('projects', []));

        return redirect()->route('admin.technologies.index');
    }

    public function show(Technology $technology)
    {
        abort_if(Gate::denies('technology_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $technology->load('projects');

        return view('admin.technologies.show', compact('technology'));
    }

    public function destroy(Technology $technology)
    {
        abort_if(Gate::denies('technology_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $technology->delete();

        return back();
    }

    public function massDestroy(MassDestroyTechnologyRequest $request)
    {
        Technology::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
