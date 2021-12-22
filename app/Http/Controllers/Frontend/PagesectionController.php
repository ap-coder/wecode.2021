<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPagesectionRequest;
use App\Http\Requests\StorePagesectionRequest;
use App\Http\Requests\UpdatePagesectionRequest;
use App\Models\Page;
use App\Models\Pagesection;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PagesectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pagesection_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pagesections = Pagesection::with(['pages'])->get();

        return view('frontend.pagesections.index', compact('pagesections'));
    }

    public function create()
    {
        abort_if(Gate::denies('pagesection_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id');

        return view('frontend.pagesections.create', compact('pages'));
    }

    public function store(StorePagesectionRequest $request)
    {
        $pagesection = Pagesection::create($request->all());
        $pagesection->pages()->sync($request->input('pages', []));

        return redirect()->route('frontend.pagesections.index');
    }

    public function edit(Pagesection $pagesection)
    {
        abort_if(Gate::denies('pagesection_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id');

        $pagesection->load('pages');

        return view('frontend.pagesections.edit', compact('pages', 'pagesection'));
    }

    public function update(UpdatePagesectionRequest $request, Pagesection $pagesection)
    {
        $pagesection->update($request->all());
        $pagesection->pages()->sync($request->input('pages', []));

        return redirect()->route('frontend.pagesections.index');
    }

    public function show(Pagesection $pagesection)
    {
        abort_if(Gate::denies('pagesection_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pagesection->load('pages');

        return view('frontend.pagesections.show', compact('pagesection'));
    }

    public function destroy(Pagesection $pagesection)
    {
        abort_if(Gate::denies('pagesection_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pagesection->delete();

        return back();
    }

    public function massDestroy(MassDestroyPagesectionRequest $request)
    {
        Pagesection::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
