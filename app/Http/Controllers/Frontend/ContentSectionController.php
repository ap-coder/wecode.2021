<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContentSectionRequest;
use App\Http\Requests\StoreContentSectionRequest;
use App\Http\Requests\UpdateContentSectionRequest;
use App\Models\ContentSection;
use App\Models\Page;
use App\Models\Post;
use App\Models\Thread;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('content_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentSections = ContentSection::with(['pages', 'posts', 'threads'])->get();

        return view('frontend.contentSections.index', compact('contentSections'));
    }

    public function create()
    {
        abort_if(Gate::denies('content_section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id');

        $posts = Post::pluck('title', 'id');

        $threads = Thread::pluck('title', 'id');

        return view('frontend.contentSections.create', compact('pages', 'posts', 'threads'));
    }

    public function store(StoreContentSectionRequest $request)
    {
        $contentSection = ContentSection::create($request->all());
        $contentSection->pages()->sync($request->input('pages', []));
        $contentSection->posts()->sync($request->input('posts', []));
        $contentSection->threads()->sync($request->input('threads', []));

        return redirect()->route('frontend.content-sections.index');
    }

    public function edit(ContentSection $contentSection)
    {
        abort_if(Gate::denies('content_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id');

        $posts = Post::pluck('title', 'id');

        $threads = Thread::pluck('title', 'id');

        $contentSection->load('pages', 'posts', 'threads');

        return view('frontend.contentSections.edit', compact('contentSection', 'pages', 'posts', 'threads'));
    }

    public function update(UpdateContentSectionRequest $request, ContentSection $contentSection)
    {
        $contentSection->update($request->all());
        $contentSection->pages()->sync($request->input('pages', []));
        $contentSection->posts()->sync($request->input('posts', []));
        $contentSection->threads()->sync($request->input('threads', []));

        return redirect()->route('frontend.content-sections.index');
    }

    public function show(ContentSection $contentSection)
    {
        abort_if(Gate::denies('content_section_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentSection->load('pages', 'posts', 'threads');

        return view('frontend.contentSections.show', compact('contentSection'));
    }

    public function destroy(ContentSection $contentSection)
    {
        abort_if(Gate::denies('content_section_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentSection->delete();

        return back();
    }

    public function massDestroy(MassDestroyContentSectionRequest $request)
    {
        ContentSection::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
