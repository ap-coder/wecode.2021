<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Staff;
use App\Models\ContentSection;
use App\Models\AttachmentData;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Post::with(['category'])->select(sprintf('%s.*', (new Post())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'post_show';
                $editGate = 'post_edit';
                $deleteGate = 'post_delete';
                $crudRoutePart = 'posts';

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
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'published']);

            return $table->make(true);
        }

        return view('admin.posts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $authors = Staff::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.posts.create', compact('authors','categories'));
    }

    public function store(StorePostRequest $request)
    {
        
        $post = Post::create($request->all());

        if ($request->input('featured_image', false)) {

            $post->attachment()->create([
                'collection_name' => 'featured_image',
                'attachment_id' => $request->featured_image,
            ]);
            
        }

        if ($request->postmeta) {

            foreach ($request->postmeta['attachments'] as $file) {
                $post->attachment()->create([
                    'collection_name' => 'attachments',
                    'attachment_id' => $file,
                ]);
            }
            
        }

        // if ($request->input('featured_image', false)) {
        //     $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        // }

        // foreach ($request->input('attachments', []) as $file) {
        //     $post->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        // }

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $post->id]);
        // }

        if ($request->input('body_text', false)) 
        {
            $reading_content = strip_tags($post->body_text);
                //PHP Round fractions up so the sample text post minimum read time is 1 minute
                $totalReadTm = ceil(str_word_count($reading_content)/220);

                if ($totalReadTm == 1){
                    $totalReadTm = $totalReadTm;
                }else{
                    $totalReadTm = $totalReadTm;
                }
                $post->update(['read_time' => $totalReadTm]);
        }

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $authors = Staff::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $post->load('category');

        return view('admin.posts.edit', compact('authors','categories', 'post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());

        if ($request->input('featured_image', false)) {

            $post->attachment()->updateOrCreate(
                [
                    'collection_name' => 'featured_image'
                ],
                [
                'collection_name' => 'featured_image',
                'attachment_id' => $request->featured_image,
                ]
            );
            
        }

        if ($request->postmeta) {

            $attachmentIds = array_filter($request->postmeta['attachments'], function($v){ 
                return !is_null($v) && $v !== ''; 
               });

            $post->attachment()->where('collection_name','attachments')->whereNotIn('attachment_id',$attachmentIds)->delete();

            foreach ($request->postmeta['attachments'] as $file) {
                
                if ($file) {
                    $post->attachment()->updateOrCreate(
                        [
                            'collection_name' => 'attachments',
                            'attachment_id' => $file,
                        ],
                        [
                        'collection_name' => 'attachments',
                        'attachment_id' => $file,
                        ]
                    );
                }
                
            }
            
        }

        // if ($request->input('featured_image', false)) {
        //     if (!$post->featured_image || $request->input('featured_image') !== $post->featured_image->file_name) {
        //         if ($post->featured_image) {
        //             $post->featured_image->delete();
        //         }
        //         $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        //     }
        // } elseif ($post->featured_image) {
        //     $post->featured_image->delete();
        // }

        // if (count($post->attachments) > 0) {
        //     foreach ($post->attachments as $media) {
        //         if (!in_array($media->file_name, $request->input('attachments', []))) {
        //             $media->delete();
        //         }
        //     }
        // }
        // $media = $post->attachments->pluck('file_name')->toArray();
        // foreach ($request->input('attachments', []) as $file) {
        //     if (count($media) === 0 || !in_array($file, $media)) {
        //         $post->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        //     }
        // }

        if ($request->input('body_text', false)) 
        {
            $reading_content = strip_tags($post->body_text);
                //PHP Round fractions up so the sample text post minimum read time is 1 minute
                $totalReadTm = ceil(str_word_count($reading_content)/220);
                if ($totalReadTm == 1){
                    $totalReadTm = $totalReadTm;
                }else{
                    $totalReadTm = $totalReadTm;
                }
                $post->update(['read_time' => $totalReadTm]);
        }


        if ($request->preview) {
            echo json_encode($post->slug);
        } else {
            return redirect()->route('admin.posts.index');
        }
    }

    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->load('category', 'postsContentSections');

        return view('admin.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostRequest $request)
    {
        Post::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('post_create') && Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Post();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function GetPostContentSectionModalForm(Request $request)
    {
        $contentSection=ContentSection::find($request->id);
        $html= view('admin.posts.partials.content-section-modal', compact('contentSection'))->render();

        echo $html;
    }

    public function AddPostContentSection(Request $request)
    {
        if($request->id){
            $contentSection=ContentSection::find($request->id);
            $contentSection->update($request->all());
        }else{
            $contentSection = ContentSection::create($request->all());
        }

        $contentSection->assign_posts()->sync($request->input('posts', []));

        $posts = Post::where('id',$request->posts)->first();

        $contentSections=$posts->postsContentSections;

        $html= view('admin.posts.partials.content-section-loop', compact('contentSections'))->render();

        echo $html;
    }

    public function ChangePostContentSectionOrder(Request $request)
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
