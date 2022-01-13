<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPageRequest;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use App\Models\Pagesection;
use App\Models\ContentSection;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Page::query()->select(sprintf('%s.*', (new Page())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'page_show';
                $editGate = 'page_edit';
                $deleteGate = 'page_delete';
                $crudRoutePart = 'pages';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('meta_title', function ($row) {
                return $row->meta_title ? $row->meta_title : '';
            });
            $table->editColumn('meta_description', function ($row) {
                return $row->meta_description ? $row->meta_description : '';
            });
            $table->editColumn('facebook_title', function ($row) {
                return $row->facebook_title ? $row->facebook_title : '';
            });
            $table->editColumn('facebook_description', function ($row) {
                return $row->facebook_description ? $row->facebook_description : '';
            });
            $table->editColumn('twitter_title', function ($row) {
                return $row->twitter_title ? $row->twitter_title : '';
            });
            $table->editColumn('twitter_description', function ($row) {
                return $row->twitter_description ? $row->twitter_description : '';
            });

            $table->rawColumns(['actions', 'placeholder','published']);

            return $table->make(true);
        }

        return view('admin.pages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photos = [];

        foreach (File::allFiles(public_path('site/img/landing-pages')) as $file) {

            $photos[] = array(
                "filename" => $file->getFilename(),
                "filesize" => $file->getSize(), // returns size in bytes
                "fileext" => $file->getExtension()
            );
        }

        $attachments = [];

        foreach (File::allFiles(public_path('site/attachments/landing-pages')) as $attachment) {

            $attachments[] = array(
                "filename" => $attachment->getFilename(),
                "filesize" => $attachment->getSize(), // returns size in bytes
                "fileext" => $attachment->getExtension()
            );
        }

        return view('admin.pages.create', compact('photos','attachments'));
    }

    public function store(StorePageRequest $request)
    {
        $page = Page::create($request->all());

        if ($request->input('featured_image', false)) {
            $page->addMedia(storage_path('tmp/uploads/' . $request->input('featured_image')))->toMediaCollection('featured_image', 'public');
        }

        foreach ($request->input('photos', []) as $file) {
            File::ensureDirectoryExists('site/img/landing-pages');
            File::move(storage_path('tmp/uploads/' . basename($file)), public_path('site/img/landing-pages/'.basename($file)));
            File::delete(storage_path('tmp/uploads/' . basename($file)));
        }

        foreach ($request->input('attachments', []) as $file) {
            File::ensureDirectoryExists('site/attachments/landing-pages');
            File::move(storage_path('tmp/uploads/' . basename($file)), public_path('site/attachments/landing-pages/'.basename($file)));
            File::delete(storage_path('tmp/uploads/' . basename($file)));
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $page->id]);
        }

        return redirect()->route('admin.pages.edit', $page->id);
    }

    public function edit(Page $page)
    {
        abort_if(Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page_sections=Pagesection::published()->get()->pluck('section_nickname','id')->prepend(trans('global.pleaseSelect'), '');

        $photos = [];

        foreach (File::allFiles(public_path('site/img/landing-pages')) as $file) {

            $photos[] = array(
                "filename" => $file->getFilename(),
                "filesize" => $file->getSize(), // returns size in bytes
                "fileext" => $file->getExtension()
            );
        }

        $attachments = [];

        foreach (File::allFiles(public_path('site/attachments/landing-pages')) as $attachment) {

            $attachments[] = array(
                "filename" => $attachment->getFilename(),
                "filesize" => $attachment->getSize(), // returns size in bytes
                "fileext" => $attachment->getExtension()
            );
        }

        return view('admin.pages.edit', compact('page','page_sections','photos','attachments'));
    }

    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->all());

        if ($request->input('featured_image', false)) {
            if (!$page->featured_image || $request->input('featured_image') !== $page->featured_image->file_name) {
                if ($page->featured_image) {
                    $page->featured_image->delete();
                }

                $page->addMedia(storage_path('tmp/uploads/' . $request->input('featured_image')))->toMediaCollection('featured_image', 'public');
            }
        } elseif ($page->featured_image) {
            $page->featured_image->delete();
        }

        foreach ($request->input('photos', []) as $file) {
            File::ensureDirectoryExists('site/img/landing-pages');
            File::move(storage_path('tmp/uploads/' . basename($file)), public_path('site/img/landing-pages/'.basename($file)));
            File::delete(storage_path('tmp/uploads/' . basename($file)));
        }

        foreach ($request->input('attachments', []) as $file) {
            File::ensureDirectoryExists('site/attachments/landing-pages');
            File::move(storage_path('tmp/uploads/' . basename($file)), public_path('site/attachments/landing-pages/'.basename($file)));
            File::delete(storage_path('tmp/uploads/' . basename($file)));
        }
        
        if ($request->preview) {
            echo json_encode($page->path.'/'.$page->slug);
        } else {
            return redirect()->route('admin.pages.index');
        }

    }

    public function show(Page $page)
    {
        abort_if(Gate::denies('page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page->load('pagesVideoContents', 'pagesPagesections', 'pagesContentSections');

        return view('admin.pages.show', compact('page'));
    }

    public function destroy(Page $page)
    {
        abort_if(Gate::denies('page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page->delete();

        return back();
    }

    public function massDestroy(MassDestroyPageRequest $request)
    {
        Page::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function GetPageContentSectionModalForm(Request $request)
    {
        $contentSection=ContentSection::find($request->id);
        $html= view('admin.pages.partials.content-section-modal', compact('contentSection'))->render();

        echo $html;
    }

    public function AddPageContentSection(Request $request)
    {
        
        if($request->id){
            $contentSection=ContentSection::find($request->id);
            $contentSection->update($request->all());
        }else{
            $contentSection = ContentSection::create($request->all());
        }

        $contentSection->assign_contentPages()->sync($request->input('contentPages', []));

        $ContentPage = Page::where('id',$request->contentPages)->first();

        $contentSections=$ContentPage->pagesContentSections;

        $html= view('admin.pages.partials.content-section-loop', compact('contentSections'))->render();

        echo $html;
    }

    public function ChangePageContentSectionOrder(Request $request)
    {
        $ids=$request->params;
        foreach ($ids as $key => $id) {
            ContentSection::where('id',$id['value'])->update([
                'order' => $key+1,
            ]);
        }
        echo 1;
    }

    public function GetPageSectionModalForm(Request $request)
    {
        $pageSection=PageSection::find($request->id);
        $html= view('admin.pages.partials.page-section-modal', compact('pageSection'))->render();

        echo $html;
    }

    public function AddPageSection(Request $request)
    {
        
        if($request->id){
            $pageSection=Pagesection::find($request->id);
            $pageSection->update($request->all());
        }else{
            $pageSection = Pagesection::create($request->all());
        }

        $pageSection->assign_pages()->sync($request->input('contentPages', []));

        $ContentPage = Page::where('id',$request->contentPages)->first();

        $pageSections=$ContentPage->pagesPagesections;

        $html= view('admin.pages.partials.page-section-loop', compact('pageSections'))->render();

        echo $html;
    }

    public function ChangePageSectionOrder(Request $request)
    {
        $ids=$request->params;
        foreach ($ids as $key => $id) {
            Pagesection::where('id',$id['value'])->update([
                'order' => $key+1,
            ]);
        }
        echo 1;
    }

    public function AddExistingPageSection(Request $request)
    {
        $updatePage = Page::where('id',$request->pages)->first();

        $updatePage->pagesPagesections()->toggle($request->input('page_sections', []));        

        $ContentPage = Page::where('id',$request->pages)->first();

        $pageSections=$ContentPage->pagesPagesections;

        $html= view('admin.pages.partials.page-section-loop', compact('pageSections'))->render();

        echo $html;
    }

    public function clearAllExistingPageSection(Request $request)
    {
        $updatePage = Page::where('id',$request->pages)->first();
        $updatePage->pagesPagesections()->detach();
        $page = Page::where('id',$request->pages)->first();

        $pageSections=$page->pagesPagesections;

        $html= view('admin.pages.partials.page-section-loop', compact('pageSections'))->render();

        echo $html;
    }
}
