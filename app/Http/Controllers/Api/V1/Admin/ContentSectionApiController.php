<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContentSectionRequest;
use App\Http\Requests\UpdateContentSectionRequest;
use App\Http\Resources\Admin\ContentSectionResource;
use App\Models\ContentSection;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSectionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('content_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContentSectionResource(ContentSection::with(['pages', 'posts', 'threads'])->get());
    }

    public function store(StoreContentSectionRequest $request)
    {
        $contentSection = ContentSection::create($request->all());
        $contentSection->pages()->sync($request->input('pages', []));
        $contentSection->posts()->sync($request->input('posts', []));
        $contentSection->threads()->sync($request->input('threads', []));

        return (new ContentSectionResource($contentSection))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ContentSection $contentSection)
    {
        abort_if(Gate::denies('content_section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContentSectionResource($contentSection->load(['pages', 'posts', 'threads']));
    }

    public function update(UpdateContentSectionRequest $request, ContentSection $contentSection)
    {
        $contentSection->update($request->all());
        $contentSection->pages()->sync($request->input('pages', []));
        $contentSection->posts()->sync($request->input('posts', []));
        $contentSection->threads()->sync($request->input('threads', []));

        return (new ContentSectionResource($contentSection))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ContentSection $contentSection)
    {
        abort_if(Gate::denies('content_section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentSection->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
