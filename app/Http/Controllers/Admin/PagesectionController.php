<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPagesectionRequest;
use App\Http\Requests\StorePagesectionRequest;
use App\Http\Requests\UpdatePagesectionRequest;
use App\Models\Page;
use App\Models\Pagesection;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PagesectionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pagesection_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pagesection::with(['pages'])->select(sprintf('%s.*', (new Pagesection())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'pagesection_show';
                $editGate = 'pagesection_edit';
                $deleteGate = 'pagesection_delete';
                $crudRoutePart = 'pagesections';

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
            $table->editColumn('section', function ($row) {
                return $row->section ? $row->section : '';
            });
            $table->editColumn('section_nickname', function ($row) {
                return $row->section_nickname ? $row->section_nickname : '';
            });
            $table->editColumn('order', function ($row) {
                return $row->order ? $row->order : '';
            });

            $table->rawColumns(['actions', 'placeholder','published']);

            return $table->make(true);
        }

        return view('admin.pagesections.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pagesection_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id');

        return view('admin.pagesections.create', compact('pages'));
    }

    public function store(StorePagesectionRequest $request)
    {
        $pagesection = Pagesection::create($request->all());
        $pagesection->pages()->sync($request->input('pages', []));

        return redirect()->route('admin.pagesections.index');
    }

    public function edit(Pagesection $pagesection)
    {
        abort_if(Gate::denies('pagesection_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id');

        $pagesection->load('pages');

        return view('admin.pagesections.edit', compact('pages', 'pagesection'));
    }

    public function update(UpdatePagesectionRequest $request, Pagesection $pagesection)
    {
        $pagesection->update($request->all());
        $pagesection->pages()->sync($request->input('pages', []));

        return redirect()->route('admin.pagesections.index');
    }

    public function show(Pagesection $pagesection)
    {
        abort_if(Gate::denies('pagesection_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pagesection->load('pages');

        return view('admin.pagesections.show', compact('pagesection'));
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
