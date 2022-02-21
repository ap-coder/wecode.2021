<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Reply;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::published()->get();
        return view('site.discussions.index', compact('threads'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ThreadTopic='',$slug)
    {
        $thread = Thread::where('slug', $slug)->first();
        return view('site.discussions.show', compact('thread'));
    }

    public function storeReply(Request $request)
    {

        $reply = Reply::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $reply->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        return back();
    }

}
