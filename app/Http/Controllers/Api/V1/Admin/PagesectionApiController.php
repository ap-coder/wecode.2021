<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePagesectionRequest;
use App\Http\Requests\UpdatePagesectionRequest;
use App\Http\Resources\Admin\PagesectionResource;
use App\Models\Pagesection;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PagesectionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pagesection_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PagesectionResource(Pagesection::with(['pages'])->get());
    }

    public function store(StorePagesectionRequest $request)
    {
        $pagesection = Pagesection::create($request->all());
        $pagesection->pages()->sync($request->input('pages', []));

        return (new PagesectionResource($pagesection))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pagesection $pagesection)
    {
        abort_if(Gate::denies('pagesection_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PagesectionResource($pagesection->load(['pages']));
    }

    public function update(UpdatePagesectionRequest $request, Pagesection $pagesection)
    {
        $pagesection->update($request->all());
        $pagesection->pages()->sync($request->input('pages', []));

        return (new PagesectionResource($pagesection))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pagesection $pagesection)
    {
        abort_if(Gate::denies('pagesection_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pagesection->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
